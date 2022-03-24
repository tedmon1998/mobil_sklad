package com.example.mymobilsklad.admin;

import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
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

public class AllProduct_Name extends ListActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    // Создаем JSON парсер
    JSONParser jParser = new JSONParser();

    ArrayList<HashMap<String, String>> productsList;

    // url получения списка всех продуктов
    private static String url_all_products_name = HOST.host+"PHP/admin/AllProduct_name.php";



    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_PRODUCTS = "products";
    private static final String TAG_PID = "pid";
    private static final String TAG_NAME = "name";
    private static final String TAG_USER = "user";
    private static final String TAG_VES = "ves";
    Button obshee;
    Button prodano;
    TextView session_text;
    Button name;
    Button pers;
    Button ves;


    // тут будет хранится список продуктов
    JSONArray products = null;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
            setContentView(R.layout.all_product);
        ///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            AllProduct_Name_Povorot();
        }
        Toast.makeText(AllProduct_Name.this, "Порядок: по продукту", Toast.LENGTH_SHORT).show();

        // Hashmap for ListView
        productsList = new ArrayList<HashMap<String, String>>();

        // Загружаем продукты в фоновом потоке
        new LoadAllProducts().execute();

////////////////////////////////////////////////////////////////////

        obshee = (Button) findViewById(R.id.obshee);
        obshee.setOnClickListener(this);
        prodano = (Button) findViewById(R.id.prodano);
        prodano.setOnClickListener(this);

        name = (Button) findViewById(R.id.name);
        name.setOnClickListener(this);
        pers = (Button) findViewById(R.id.pers);
        pers.setOnClickListener(this);
        ves = (Button) findViewById(R.id.ves);
        ves.setOnClickListener(this);
        /////////////////////////////////////////////
        name.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View v) {
                AllProduct();
                return true;
            }
        });
        ves.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View v) {
                AllProduct();
                return true;
            }
        });
        pers.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View v) {
                AllProduct();
                return true;
            }
        });

    }
    @Override
    public void onBackPressed() {
        MainActivitylogText();
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.obshee:
                Obshee();
                break;


            case R.id.prodano:
                AllProdano();
                break;

            case R.id.pers:
                AllProduct_Pers();
                break;

            case R.id.ves:
                AllProduct_Ves();
                break;

            default:
                break;
        }

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////

    class LoadAllProducts extends AsyncTask<String, String, String> {


        /**
         * Перед началом фонового потока Show Progress Dialog
         * */
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(AllProduct_Name.this);
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
            JSONObject json = jParser.makeHttpRequest(url_all_products_name, "GET", params);

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
                        String user = c.getString(TAG_USER);
                        String ves = c.getString(TAG_VES);


                        // Создаем новый HashMap
                        HashMap<String, String> map = new HashMap<String, String>();

                        // добавляем каждый елемент в HashMap ключ => значение
                        map.put(TAG_PID, id);
                        map.put(TAG_NAME, name);
                        map.put(TAG_USER, user);
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
                    ListAdapter adapter = new SimpleAdapter(
                            AllProduct_Name.this, productsList,
                            R.layout.list_allproduct2, new String[] { TAG_PID,
                            TAG_NAME, TAG_USER, TAG_VES},
                            new int[] { R.id.pid, R.id.name, R.id.user, R.id.ves});
                    setListAdapter(adapter);
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

    }
    private void AllProdano() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProdano.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);


    }
    private void Obshee() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Obshee.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);


    }
    private void AllProduct_Name_Povorot() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct_Name_Povorot.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
    }

    private void AllProduct() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////

    private void AllProduct_Pers() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct_Pers.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
    }

    private void AllProduct_Ves() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct_Ves.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
}