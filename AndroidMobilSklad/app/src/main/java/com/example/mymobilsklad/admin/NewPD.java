package com.example.mymobilsklad.admin;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.media.Image;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.os.Handler;
import android.os.Looper;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
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

public class NewPD extends AppCompatActivity implements View.OnClickListener {

    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    public static EditText text_new;
    Button button_new;
    Button scan;
    TextView session_text;

    private static String url_create_product = HOST.host+"PHP/admin/create_product.php";

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
     * ?????????????? Async Task ???????????????? ???????????? ????????????????
     **/
    class CreateNewProduct extends AsyncTask<String, String, String> {

        /**
         * ?????????? ?????????????????? ?? ?????????????? ???????????? ???????????????????? ???????????????? ????????????
         **/
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(NewPD.this);
            pDialog.setMessage("???????????????? ????????????????...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        /**
         * ???????????????? ????????????????
         **/
        protected String doInBackground(String[] args) {
            String kod = text_new.getText().toString();
            String userses = session_text.getText().toString();


            // ?????????????????? ??????????????????
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("kod", kod));
            params.add(new BasicNameValuePair("userses", userses));

            // ???????????????? JSON ????????????
            JSONObject json = jsonParser.makeHttpRequest(url_create_product, "POST", params);

            Log.d("Create Response", json.toString());



            return null;
        }
        /**
         * ?????????? ?????????????????? ???????????????? ???????????????? ????????????
         **/
        protected void onPostExecute(String file_url) {
            delText();
            pDialog.dismiss();
        }



    }
    private void delText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        sPref.edit().clear().commit();
        Toast.makeText(NewPD.this, "???????????????? ???????????? ??????????????", Toast.LENGTH_SHORT).show();
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
    private void AllProdanoText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, AllProduct.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }
    ///////////////////////////////////////////////////////////////////////////////////////////////


}
