package com.example.mymobilsklad;

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

import com.example.mymobilsklad.admin.AllProduct;
import com.example.mymobilsklad.admin.HOST;
import com.example.mymobilsklad.admin.MainActivity;
import com.example.mymobilsklad.parser.JSONParser;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class registr extends Activity implements ForceUpdateChecker.OnUpdateNeededListener {
    ////////////////////////////////////////////////////////////////////////

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    EditText login_vvod;
    EditText pass_vvod;
    Button lg;


    private static String url_login = HOST.host+"avtorizaciya/loginmobil.php";

    private static final String TAG_SUCCESS = "succes";
    final String TAG_SESSION = "succes";
    final String SAVED_TEXT = "saved_text";


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registr);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.registr);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.registr_povorot);
        }

        login_vvod = (EditText) findViewById(R.id.login_vvod);
        login_vvod.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                login_vvod.setText("");
            }
        });


        Toast.makeText(registr.this, "Вы не авторизованы", Toast.LENGTH_SHORT).show();

        ForceUpdateChecker.with(this).onUpdateNeeded(this).check();

        lg = (Button) findViewById(R.id.lg);

        pass_vvod = (EditText) findViewById(R.id.pass_vvod);
        ///////////////////////////////////////////////////////////////////////////////////////////


        loadLogin();

        lg.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                new Login().execute();
            }
        });

    }



    @Override
    public void onUpdateNeeded(final String updateUrl) {
        AlertDialog dialog = new AlertDialog.Builder(this)
                .setTitle("Доступна новая версия")
                .setMessage("Пожалуйста, обновите приложение до новой версии, чтобы продолжить работу.")
                .setPositiveButton("Обновить",
                        new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                redirectStore(updateUrl);
                            }
                        }).setNegativeButton("Нет, спасибо",
                        new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                finish();
                            }
                        }).create();
        dialog.show();
    }

    private void redirectStore(String updateUrl) {
        final Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(updateUrl));
        intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
        startActivity(intent);
    }

    ///////////////////////////////////////////////////////////////////////





    /**
     * Фоновый Async Task создания нового продукта
     **/
    class Login extends AsyncTask<String, String, String> {

        /**
         * Перед согданием в фоновом потоке показываем прогресс диалог
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(registr.this);
            pDialog.setMessage("Авторизация...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * Создание продукта
         **/
        protected String doInBackground(String[] args) {
            String login = login_vvod.getText().toString();
            String password = pass_vvod.getText().toString();


            // Заполняем параметры
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("login", login));
            params.add(new BasicNameValuePair("password", password));

            // получаем JSON объект
            JSONObject json = jsonParser.makeHttpRequest(url_login, "POST", params);

            Log.d("Create Response", json.toString());

            try {
                int success = json.getInt(TAG_SUCCESS);

                if (success == 37) {
                    // продукт удачно создан

                    SharedPreferences sPref = getPreferences(MODE_PRIVATE);
                    SharedPreferences.Editor edd =  sPref.edit();
                    edd.putString(TAG_SESSION, login_vvod.getText().toString());
                    String saveText = sPref.getString(TAG_SESSION, "");
                    Intent intent = new Intent(getApplicationContext(), com.example.mymobilsklad.admin.MainActivity.class);
                    intent.putExtra("name_user", login_vvod.getText().toString());
                    startActivity(intent);
                    finish();

                }

                else if (success == 1){
                    // продукт удачно создан
                    SharedPreferences sPref = getPreferences(MODE_PRIVATE);
                    SharedPreferences.Editor edd =  sPref.edit();
                    edd.putString(TAG_SESSION, login_vvod.getText().toString());
                    String saveText = sPref.getString(TAG_SESSION, "");
                    Intent intent = new Intent(getApplicationContext(), com.example.mymobilsklad.user1.MainActivity.class);
                    intent.putExtra("name_user", login_vvod.getText().toString());
                    startActivity(intent);
                    finish();

                }


                else {
                    // продукт удачно создан

                    Intent i = new Intent(getApplicationContext(),registr.class);
                    startActivity(i);
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

    void saveLogin() {
        SharedPreferences aPref = getPreferences(MODE_PRIVATE);
        SharedPreferences.Editor ed = aPref.edit();
        ed.putString(SAVED_TEXT, login_vvod.getText().toString());
        ed.apply();
    }



    void loadLogin() {
        SharedPreferences aPref = getPreferences(MODE_PRIVATE);
        String savedText = aPref.getString(SAVED_TEXT, "");
        login_vvod.setText(savedText);
    }


    @Override
    protected void onDestroy() {
        super.onDestroy();
        saveLogin();
    }

    @Override
    protected void onPause() {
        super.onPause();
        // Запоминаем данные
        saveLogin();
    }

}