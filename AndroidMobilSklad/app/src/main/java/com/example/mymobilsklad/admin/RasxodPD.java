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

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class RasxodPD extends AppCompatActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    public static EditText text_del;
    Button button_ruchnoy;
    Button scansc;
    TextView session_text;

    private static String url_create_rasxod = HOST.host+"PHP/admin/rasxod.php";

    private static final String TAG_SUCCESS = "success";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.rasxod_pd);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.rasxod_pd_povorot);
        }

///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
///////////////////////////////////////////////////////////////////////////////////////////
        text_del = (EditText) findViewById(R.id.text_del);

        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                        text_del = (EditText) findViewById(R.id.text_del);
                        if (text_del.length() == 13) {
                            new RasxodPD.RasxodProduct().execute();

                            try {
                                Thread.sleep(300);
                                text_del.setText("");
                            } catch (InterruptedException e) {
                                e.printStackTrace();
                            }
                        }
                handler.postDelayed(this, 2500);
            }
        });


        button_ruchnoy = (Button) findViewById(R.id.button_ruchnoy);
        button_ruchnoy.setOnClickListener(this);

        scansc = (Button) findViewById(R.id.scansc);
        scansc.setOnClickListener(this);


    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.rasxod_prixod_admin, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();


        switch (id) {


            case R.id.item1:
                MainActivityText();
                break;
            case R.id.item2:
                AllProdanoText();
                break;
        }


        return super.onOptionsItemSelected(item);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public void onBackPressed() {
        MainActivityText();
    }
    @Override
    public void onClick(View view) {
        switch (view.getId()) {

            case R.id.scansc:
                Intent intent = new Intent(this, RasxodSC.class);   //TODO call second activity
                startActivity(intent);
                break;

            case R.id.button_ruchnoy:
                Ruchnoy_RasxodText();
                break;
            default:
                break;
        }
    }


    public void clear_kol_vvod(View view) {text_del.setText("");
    }



    /**
     * Фоновый Async Task создания нового продукта
     **/
    class RasxodProduct extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(RasxodPD.this);
            pDialog.setMessage("Создание продукта...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String kod = text_del.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("kod", kod));

            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_create_rasxod, "POST", params);

            Log.d("Create Response", json.toString());



            return null;
        }

        /**
         * После оконачния скрываем прогресс диалог
         **/
        protected void onPostExecute(String file_url) {
            delText();
            pDialog.dismiss();
        }

    }
    private void delText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        sPref.edit().clear().commit();
        Toast.makeText(RasxodPD.this, "Операция прошла успешно", Toast.LENGTH_SHORT).show();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";
    private void Ruchnoy_RasxodText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Ruchnoy_Rasxod.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }
    private void MainActivityText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, MainActivity.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }
    private void AllProdanoText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }
    ///////////////////////////////////////////////////////////////////////////////////////////////


}