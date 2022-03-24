package com.example.mymobilsklad.user1;

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
import com.example.mymobilsklad.admin.HOST;
import com.example.mymobilsklad.admin.Sozd_Product;
import com.example.mymobilsklad.parser.JSONParser;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class NewPD extends AppCompatActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    public static EditText text_new;
    public static TextView status;
    Button button_new;
    Button scan;
    TextView session_text;

    private static String url_create_product = HOST.host+"PHP/users/create_product.php";

    private static final String TAG_SUCCESS = "success";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.new_pd);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.new_pd_povorot);
        }
        text_new = (EditText) findViewById(R.id.text_new);
        ///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////

        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                text_new = (EditText) findViewById(R.id.text_new);
                if (text_new.getText().toString().length() == 13) {

                    new CreateNewProduct().execute();

                    try {
                        Thread.sleep(300);
                        text_new.setText("");
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }


                }
                handler.postDelayed(this, 2500);
            }
        });


        button_new = (Button) findViewById(R.id.button_new);
        button_new.setOnClickListener(this);

        scan = (Button) findViewById(R.id.scan);
        scan.setOnClickListener(this);


    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.rasxod_prixod, menu);
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


            case R.id.button_new:
                logText();
                break;

            case R.id.scan:
                Intent intent2 = new Intent(this, Scanner.class);   //TODO call second activity
                startActivity(intent2);
                break;


            default:
                break;
        }
    }



    /**
     * Фоновый Async Task создания нового продукта
     **/
    class CreateNewProduct extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(NewPD.this);
            pDialog.setMessage("Создание продукта...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String kod = text_new.getText().toString();
            String userses = session_text.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("kod", kod));
            params.add(new BasicNameValuePair("userses", userses));

            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_create_product, "POST", params);

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
        Toast.makeText(NewPD.this, "Операция прошла успешно", Toast.LENGTH_SHORT).show();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";
    private void logText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Ruchnoy_Prixod.class);
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
    ///////////////////////////////////////////////////////////////////////////////////////////////

}