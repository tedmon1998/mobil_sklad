package com.example.mymobilsklad.admin;

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

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.List;

public class Sozd_Product extends AppCompatActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    public static EditText sozd_name;
    public static EditText sozd_kod;
    Button btn_sozd;
    Button sc_sozdaniye;
    TextView session_text;


    private static String url_sozd_product = HOST.host+"PHP/admin/create_sozd.php";

    private static final String TAG_SUCCESS = "success";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.sozdaniye);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.sozdaniye_povorot);
        }
        ///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////
        sozd_name = (EditText) findViewById(R.id.sozd_name);
        sozd_kod = (EditText) findViewById(R.id.sozd_kod);
        sozd_kod.setEnabled(false);

        btn_sozd = (Button) findViewById(R.id.btn_sozd);
        btn_sozd.setEnabled(false);

        sc_sozdaniye = (Button) findViewById(R.id.sc_sozdaniye);


        //////////////////////////////////////////////////////////////////////////
        EditText[] sozdList = {sozd_name};
        AktivachiyaKnopkiSozdaniya textSozd = new AktivachiyaKnopkiSozdaniya(sozdList, sozd_kod);
        for (EditText edit : sozdList) edit.addTextChangedListener(textSozd);
        /////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////
        EditText[] sozdList1 = {sozd_kod};
        AktivachiyaKnopkiSozdaniya1 textSozd1 = new AktivachiyaKnopkiSozdaniya1(sozdList1, btn_sozd);
        for (EditText editText : sozdList1) editText.addTextChangedListener(textSozd1);
        /////////////////////////////////////////////////////////////////////////////

        btn_sozd.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                new SozdatNewProduct().execute();
            }
        });
        sc_sozdaniye.setOnClickListener(this);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.sozdaniye_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();


        switch (id) {
            case R.id.item1_2:
                MainActivity();
                break;
            case R.id.item2_2:
                NewPD();
                break;

            case R.id.item3_2:
                RasxodPD();
                break;
        }


        return super.onOptionsItemSelected(item);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////

    @Override
    public void onClick(View view) {
        switch (view.getId()) {

            case R.id.sc_sozdaniye:
                Intent intent1 = new Intent(this, SozdaniyeSC.class);   //TODO call second activity
                startActivity(intent1);
                break;
            default:
                break;
        }
    }

    public void clear_name(View view) {
        sozd_name.setText("");
    }

    public void clear_kod(View view) {
        sozd_kod.setText("");
    }


    /**
     * Фоновый Async Task создания нового продукта
     **/
    class SozdatNewProduct extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(Sozd_Product.this);
            pDialog.setMessage("Создание продукта...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String kod = sozd_kod.getText().toString();
            String name = sozd_name.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            try {
                params.add(new BasicNameValuePair("name", URLEncoder.encode(name, "UTF-8")));

                params.add(new BasicNameValuePair("kod", URLEncoder.encode(kod, "UTF-8")));
            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_sozd_product, "POST", params);

            Log.d("Create Response", json.toString());

            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {
                    // продукт удачно создан
                    Sozd_Product();

                    // закрываем это окно
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
            Toast.makeText(Sozd_Product.this, "Продукт успешно создан", Toast.LENGTH_SHORT).show();
            pDialog.dismiss();
        }

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    final String TAG_SESSION = "succes";
    private void MainActivity() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, MainActivity.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    private void NewPD() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, NewPD.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    private void RasxodPD() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, RasxodPD.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    private void Sozd_Product() {

        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Sozd_Product.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);
        finish();

    }
    ///////////////////////////////////////////////////////////////////////////////////////////////

}