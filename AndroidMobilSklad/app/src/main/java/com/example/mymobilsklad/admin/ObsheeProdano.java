package com.example.mymobilsklad.admin;

import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ListAdapter;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mymobilsklad.R;
import com.example.mymobilsklad.parser.JSONParser;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class ObsheeProdano extends ListActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    // Создаем JSON парсер
    JSONParser jParser = new JSONParser();

    ArrayList<HashMap<String, String>> productsList;

    // url получения списка всех продуктов
    private static String url_all_products = HOST.host+"PHP/admin/ObsheeProdano.php";




    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_PRODUCTS = "products";
    private static final String TAG_PID = "pid";
    private static final String TAG_NAME = "name";
    private static final String TAG_KOL = "kol";
    private static final String TAG_VES = "ves";
    Button obshee;
    TextView session_text;


    // тут будет хранится список продуктов
    JSONArray products = null;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.obshee2);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.obshee2_povorot);
        }
        // Hashmap for ListView
        productsList = new ArrayList<HashMap<String, String>>();

        // Загружаем продукты в фоновом потоке
        new LoadAllProducts().execute();
        Toast.makeText(ObsheeProdano.this, "Общий cписок проданных продуктво", Toast.LENGTH_SHORT).show();
////////////////////////////////////////////////////////////////////

        obshee = (Button) findViewById(R.id.obshee);
        obshee.setOnClickListener(this);
        /////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////
        // на выбор одного продукта
        // запускается Edit Product Screen

    }
    @Override
    public void onBackPressed() {
        MainActivitylogText();
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.obshee:
                AllProdano();
                break;

            default:
                break;
        }

    }

    /**
     * Фоновый Async Task для загрузки всех продуктов по HTTP запросу
     * */
    class LoadAllProducts extends AsyncTask<String, String, String> {


        /**
         * Перед началом фонового потока Show Progress Dialog
         * */
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(ObsheeProdano.this);
            pDialog.setMessage("Загрузка продуктов. Подождите...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(false);
            pDialog.show();
        }

        /**
         * Получаем все продукт из url
         * */
        protected String doInBackground(String[] args) {
            // Будет хранить параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            // получаем JSON строк с URL
            JSONObject json = jParser.makeHttpRequest(url_all_products, "GET", params);

            Log.d("All Products: ", json.toString());

            try {
                // Получаем SUCCESS тег для проверки статуса ответа сервера
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {
                    // продукт найден
                    // Получаем масив из Продуктов
                    products = json.getJSONArray(TAG_PRODUCTS);

                    // перебор всех продуктов
                    for (int i = 0; i < products.length(); i++) {
                        JSONObject c = products.getJSONObject(i);

                        // Сохраняем каждый json елемент в переменную
                        String id = c.getString(TAG_PID);
                        String name = c.getString(TAG_NAME);
                        String kol = c.getString(TAG_KOL);
                        String ves = c.getString(TAG_VES);


                        // Создаем новый HashMap
                        HashMap<String, String> map = new HashMap<String, String>();

                        // добавляем каждый елемент в HashMap ключ => значение
                        map.put(TAG_PID, id);
                        map.put(TAG_NAME, name);
                        map.put(TAG_KOL, kol);
                        map.put(TAG_VES, ves);


                        // добавляем HashList в ArrayList
                        productsList.add(map);
                    }
                } else {
                    // продукт не найден
                    // Запускаем Add New Product Activity
                    Intent i = new Intent(getApplicationContext(),
                            Sozd_Product.class);
                    // Закрытие всех предыдущие activities
                    i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                    startActivity(i);
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }

        /**
         * После завершения фоновой задачи закрываем прогрес диалог
         * **/
        protected void onPostExecute(String file_url) {
            // закрываем прогресс диалог после получение все продуктов
            pDialog.dismiss();
            // обновляем UI форму в фоновом потоке
            runOnUiThread(new Runnable() {
                public void run() {
                    if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
                    ListAdapter adapter = new SimpleAdapter(
                            ObsheeProdano.this, productsList,

                        R.layout.vivod_list

                            , new String[] { TAG_PID,
                            TAG_NAME, TAG_KOL, TAG_VES},
                            new int[] { R.id.pid, R.id.name, R.id.kol, R.id.ves});
                    setListAdapter(adapter);
                }

                    if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
                        ListAdapter adapter = new SimpleAdapter(
                                ObsheeProdano.this, productsList,

                                R.layout.vivod_list_povorot

                                , new String[] { TAG_PID,
                                TAG_NAME, TAG_KOL, TAG_VES},
                                new int[] { R.id.pid, R.id.name, R.id.kol, R.id.ves});
                        setListAdapter(adapter);
                    }

                }
            });


        }

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";
    private void MainActivitylogText() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, MainActivity.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    private void AllProdano() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProdano.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    ///////////////////////////////////////////////////////////////////////////////////////////////

}