package com.example.mymobilsklad.admin;



import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mymobilsklad.R;
import com.example.mymobilsklad.parser.JSONParser;

import static java.net.URLEncoder.encode;

public class EditProductActivity extends AppCompatActivity {

    EditText inputName;
    EditText inputKod;
    Button btnSave;
    Button btnDelete;


    String pid;


    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();

    // url для получения одного продукта
    private static final String url_product_detials = HOST.host+"PHP/admin/get_product_details.php";

    // url для обновления продукта
    private static final String url_update_product = HOST.host+"PHP/admin/update_product.php";

    // url для удаления продукта
    private static final String url_delete_product = HOST.host+"PHP/admin/delete_product.php";

    // JSON параметры
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_PRODUCTS = "products";
    private static final String TAG_PID = "pid";
    private static final String TAG_NAME = "name";
    private static final String TAG_KOD = "kod";


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.edit_product);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.edit_product_povorot);
        }
        btnSave = (Button) findViewById(R.id.btnSave);
        btnDelete = (Button) findViewById(R.id.btnDelete);

        // показываем форму про детальную информацию о продукте
        Intent i = getIntent();

        // получаем id продукта (pid) с формы
        pid = i.getStringExtra(TAG_PID);

        // Получение полной информации о продукте в фоновом потоке
        new GetProductDetails().execute();

        // обрабочик на кнопку сохранение продукта
        btnSave.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View arg0) {
                // запускаем выполнение задачи на обновление продукта
                new SaveProductDetails().execute();
            }
        });

        // обработчик на кнопку удаление продукта
        btnDelete.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View arg0) {
                // удалем продукт в фоновом потоке
                new DeleteProduct().execute();
            }
        });

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
            pDialog = new ProgressDialog(EditProductActivity.this);
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
                            inputName = (EditText) findViewById(R.id.update_login);
                            inputKod = (EditText) findViewById(R.id.update_pass);

                            // покаываем данные о продукте в EditText
                            inputName.setText(products.getString(TAG_NAME));
                            inputKod.setText(products.getString(TAG_KOD));

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
            pDialog = new ProgressDialog(EditProductActivity.this);
            pDialog.setMessage("Saving product ...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Сохраняем продукт
         **/
        protected String doInBackground(String[] args) {

            // получаем обновленные данные с EditTexts
            String name = inputName.getText().toString();
            String kod = inputKod.getText().toString();

            // формируем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            //noinspection deprecation
            params.add(new BasicNameValuePair(TAG_PID, encode(pid)));
            //noinspection deprecation
            params.add(new BasicNameValuePair(TAG_NAME, URLEncoder.encode(name)));
            //noinspection deprecation
            params.add(new BasicNameValuePair(TAG_KOD, URLEncoder.encode(kod)));

            // отправляем измененные данные через http запрос
            JSONObject json = jsonParser.makeHttpRequest(url_update_product, "POST", params);

            Log.d("Create Response", json.toString());

            // проверяем json success тег
            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {
                    // продукт удачно обнавлён
                    Intent i = getIntent();
                    // отправляем результирующий код 100 чтобы сообщить об обновлении продукта
                    setResult(100, i);
                    finish();
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
     * Фоновая асинхронная задача на удаление продукта
     **/
    class DeleteProduct extends AsyncTask<String, String, String> {

        /**
         * На начале показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(EditProductActivity.this);
            pDialog.setMessage("УДАЛЕМ ПРОДУКТ...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Удаление продукта
         **/
        protected String doInBackground(String[] args) {

            int success;
            try {
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("pid", pid));

                // получение продукта используя HTTP запрос
                JSONObject json = jsonParser.makeHttpRequest(url_delete_product, "POST", params);

                Log.d("Delete Product", json.toString());

                success = json.getInt(TAG_SUCCESS);
                if (success == 1) {
                    // Продукт удачно удален
                    Intent i = getIntent();
                    // отправляем результирующий код 100 для уведомления об удалении продукта
                    setResult(100, i);
                    finish();
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }

        /**
         * После оконачния скрываем прогресс диалог
         **/
        protected void onPostExecute(String file_url) {

            pDialog.dismiss();

        }

    }

}
