package com.example.mymobilsklad.admin;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.res.Configuration;
import android.os.AsyncTask;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mymobilsklad.R;
import com.example.mymobilsklad.parser.JSONParser;
import com.example.mymobilsklad.registr;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    Button scan;
    Button b1_2;
    Button b1_3;
    TextView session_text;
    public static TextView text_proverka;
    private ProgressDialog pDialog;
    JSONParser jsonParser = new JSONParser();

    private static String url_create_proverka = HOST.host+"PHP/admin/create_proverka.php";

    private static final String TAG_SUCCESS = "success";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT) {
            setContentView(R.layout.activity_main);
        }
        if (getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE) {
            setContentView(R.layout.activity_main_povorot);
        }


        scan = (Button) findViewById(R.id.scan);
        scan.setOnClickListener(this);
        b1_2 = (Button) findViewById(R.id.b1_2);
        b1_2.setOnClickListener(this);
        b1_3 = (Button) findViewById(R.id.b1_3);
        b1_3.setOnClickListener(this);


        scan.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View v) {
                Intent intent2 = new Intent(MainActivity.this, Scanner_Proverka.class);   //TODO call second activity
                startActivity(intent2);
                return true;
            }
        });


        ///////////////////////////////////////////////////////////////////////////////////////////
        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                text_proverka = (TextView) findViewById(R.id.text_proverka);
                if (text_proverka.getText().toString().length() == 13) {

                    new ProverkaNewProduct().execute();

                    try {
                        Thread.sleep(300);
                        text_proverka.setText("");
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }


                }
                handler.postDelayed(this, 2500);
            }
        });

///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();


        switch (id) {


            case R.id.vixod:
                delText();
                Intent intent1 = new Intent(this, registr.class);
                startActivity(intent1);
                break;

            case R.id.item1:
                Sozd_ProductlogText();
                break;
            case R.id.item2:
                VseProductiActivitylogText();
                break;

            case R.id.update_pass:
                Update_PasslogText();
                break;
        }


        return super.onOptionsItemSelected(item);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public void onClick(View v) {
        switch (v.getId()) {


            case R.id.scan:
                NewPDlogText();
                break;
            case R.id.b1_2:
                RasxodPDlogText();
                break;


            case R.id.b1_3:
                AllProductlogText();


            default:
                break;
        }


    }

    private void delText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        sPref.edit().clear().commit();
        Toast.makeText(MainActivity.this, "Вы не авторизованы", Toast.LENGTH_SHORT).show();
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";

    private void NewPDlogText() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, NewPD.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    private void RasxodPDlogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, RasxodPD.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }

    private void AllProductlogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }

    private void Sozd_ProductlogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Sozd_Product.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }

    private void VseProductiActivitylogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, VseProductiActivity.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }

    private void Update_PasslogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Update_Pass.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }




    ///////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Фоновый Async Task создания нового продукта
     **/
    class ProverkaNewProduct extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(MainActivity.this);
            pDialog.setMessage("Проверка...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String kod = text_proverka.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("kod", kod));

            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_create_proverka, "POST", params);

            Log.d("Create Response", json.toString());

            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {

                    // продукт удачно создан
                    runOnUiThread(new Runnable() {

                        @Override
                        public void run() {


                            Toast.makeText(MainActivity.this, "Успешно", Toast.LENGTH_SHORT).show();
                        }
                    });


                }

                else if (success == 2){

                    runOnUiThread(new Runnable() {

                        @Override
                        public void run() {

                            Toast.makeText(MainActivity.this, "Ошибка", Toast.LENGTH_SHORT).show();
                    }
                    });
                }

            } catch (JSONException a) {
                a.printStackTrace();
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