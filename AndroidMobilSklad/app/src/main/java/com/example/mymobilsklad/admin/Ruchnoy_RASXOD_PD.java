package com.example.mymobilsklad.admin;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.text.Editable;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.EditText;
import android.widget.TextView;

import com.example.mymobilsklad.R;
import com.example.mymobilsklad.parser.JSONParser;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import static java.net.URLEncoder.encode;

public class Ruchnoy_RASXOD_PD extends Activity {


    EditText vess;
    String ves;
    String pid;
    boolean isResizeble = false;
    TextView session_text;
    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();

    // url для получения одного продукта
    private static final String url_product_detials = HOST.host+"PHP/admin/ruchnoy_get_product_details.php";

    // url для обновления продукта
    private static final String url_update_product = HOST.host+"PHP/admin/create_ruchnoy_rasxod.php";


    // JSON параметры
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_PRODUCTS = "products";
    private static final String TAG_PID = "pid";
    private static final String TAG_VES = "ves";


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.ruchnoy_create);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.ruchnoy_create_povorot);
        }

        vess = (EditText) findViewById(R.id.vess);

///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////


        final Handler handlere = new Handler();
        handlere.post(new Runnable() {
            @Override
            public void run() {
                handlere.post(new Runnable() {
                    @Override
                    public void run() {
                        if(!isResizeble) {
                            // Ваша ф-ция которая что то делает, отработает 1 раз и все
                            vess = (EditText) findViewById(R.id.vess);
                            vess.setText("");
                            isResizeble = true;
                        }


                    }
                });// set time here to refresh textView
            }
        });


        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                handler.post(new Runnable() {
                    @Override
                    public void run() {
                        vess = (EditText) findViewById(R.id.vess);


                        //Получение введенного текста.
                        Editable enteredText = vess.getText();
                        ves = enteredText + ".";

                        if(vess.length() == 2) {
                            vess.setText(ves);
                            EditText et = (EditText)findViewById(R.id.vess);
                            et.setSelection(et.getText().length());
                        }


                        if (vess.length() == 5) {
                            new SaveProductDetails().execute();
                            vess.setText("");
                        }

                        handler.postDelayed(this, 500); // set time here to refresh textView
                    }
                });
                handler.postDelayed(this, 500); // set time here to refresh textView
            }
        });

        // показываем форму про детальную информацию о продукте
        Intent i = getIntent();

        // получаем id продукта (pid) с формы
        pid = i.getStringExtra(TAG_PID);

        // Получение полной информации о продукте в фоновом потоке
        new GetProductDetails().execute();

    }



    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.edit_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();


        switch (id) {
            case R.id.item1_1:
                Intent intent1 = new Intent(this, Sozd_Product.class);
                startActivity(intent1);
                break;
            case R.id.item2_1:
                Intent intent2 = new Intent(this, NewPD.class);
                startActivity(intent2);
                break;

            case R.id.item3_1:
                Intent intent3 = new Intent(this, RasxodPD.class);
                startActivity(intent3);
                break;
        }


        return super.onOptionsItemSelected(item);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////



    /**
     * Фоновая асинхронная задача для получения полной информации о продукте
     **/
    class GetProductDetails extends AsyncTask<String, String, String> {

        /**
         * Перед началом показать в фоновом потоке прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(Ruchnoy_RASXOD_PD.this);
            pDialog.setMessage("Loading product details. Please wait...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Получение детальной информации о продукте в фоновом режиме
         **/
        protected String doInBackground(String [] args) {

            // проверяем статус success тега
            int success;
            try {
                // Список параметров
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("pid", pid));

                // получаем продукт по HTTP запросу
                JSONObject json = jsonParser.makeHttpRequest(url_product_detials, "GET", params);

                Log.d("Single Product Details", json.toString());

                success = json.getInt(TAG_SUCCESS);
                if (success == 1) {
                    // Успешно получинна детальная информация о продукте
                    JSONArray productObj = json.getJSONArray(TAG_PRODUCTS);

                    // получаем первый обьект с JSON Array
                    JSONObject products = productObj.getJSONObject(0);

                    // продукт с pid найден
                    // Edit Text
                    vess = (EditText) findViewById(R.id.vess);

                    // покаываем данные о продукте в EditText

                    vess.setText(products.getString(TAG_VES));
                }// продукт с pid не найден

            } catch (JSONException e) {
                e.printStackTrace();


            };

            return null;
        }

        /**
         * После завершения фоновой задачи закрываем диалог прогресс
         **/
        protected void onPostExecute(String file_url) {
            // закрываем диалог прогресс
            pDialog.dismiss();
        }
    }

    /**
     * В фоновом режиме выполняем асинхроную задачу на сохранение продукта
     **/
    class SaveProductDetails extends AsyncTask<String, String, String> {

        /**
         * Перед началом показываем в фоновом потоке прогрксс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(Ruchnoy_RASXOD_PD.this);
            pDialog.setMessage("Saving product ...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Сохраняем продукт
         **/
        protected String doInBackground(String[] args) {

            String ves = vess.getText().toString();

            // формируем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            //noinspection deprecation
            params.add(new BasicNameValuePair(TAG_PID, encode(pid)));
            //noinspection deprecation
            params.add(new BasicNameValuePair(TAG_VES, encode(ves)));
            // отправляем измененные данные через http запрос
            JSONObject json = jsonParser.makeHttpRequest(url_update_product, "POST", params);

            Log.d("Create Response", json.toString());

            // проверяем json success тег
            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {
                    // продукт удачно обнавлён
                    RasxodPD();
                }  // продукт не обновлен

            } catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }

        /**
         * После окончания закрываем прогресс диалог
         **/
        protected void onPostExecute(String file_url) {
            // закрываем прогресс диалог
            pDialog.dismiss();
        }
    }

        /**
         * После оконачния скрываем прогресс диалог
         **/
        protected void onPostExecute(String file_url) {
            pDialog.dismiss();

        }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";
    private void RasxodPD() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, RasxodPD.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }


    ///////////////////////////////////////////////////////////////////////////////////////////////
}

