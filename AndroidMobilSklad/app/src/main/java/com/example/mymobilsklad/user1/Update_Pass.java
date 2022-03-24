package com.example.mymobilsklad.user1;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mymobilsklad.ForceUpdateChecker;
import com.example.mymobilsklad.R;
import com.example.mymobilsklad.admin.HOST;
import com.example.mymobilsklad.parser.JSONParser;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Update_Pass extends AppCompatActivity {

    EditText update_login;
    EditText update_pass;
    Button btnSave;
    TextView session_text;



    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();


    // url для обновления продукта
    private static final String url_update_pass = HOST.host + "PHP/users/update_pass.php";


    // JSON параметры
    private static final String TAG_SUCCESS = "success";



    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.edit_pass);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.edit_pass_povorot);
        }
        ///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);
        ///////////////////////////////////////////////////////////////////////////////////////////
        btnSave = (Button) findViewById(R.id.btnSave);
        update_login = (EditText) findViewById(R.id.update_login);
        update_pass = (EditText) findViewById(R.id.update_pass);

        btnSave.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                new UpdatePass().execute();
            }
        });


    }


    ///////////////////////////////////////////////////////////////////////




    /**
     * Фоновый Async Task создания нового продукта
     **/
    class UpdatePass extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(Update_Pass.this);
            pDialog.setMessage("Изменяется...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String login = session_text.getText().toString();
            String password = update_pass.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("login", login));
            params.add(new BasicNameValuePair("password", password));

            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_update_pass, "POST", params);

            Log.d("Create Response", json.toString());

            // проверяем json success тег
            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 1) {
                    MainActivity();

                }
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
            delText();
            pDialog.dismiss();
        }
    }
    private void delText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        sPref.edit().clear().commit();
        Toast.makeText(Update_Pass.this, "Пароль изменен", Toast.LENGTH_SHORT).show();
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
    ///////////////////////////////////////////////////////////////////////////////////////////////
}