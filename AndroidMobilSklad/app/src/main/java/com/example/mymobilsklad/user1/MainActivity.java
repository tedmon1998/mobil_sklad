package com.example.mymobilsklad.user1;

import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mymobilsklad.R;
import com.example.mymobilsklad.registr;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {


    Button b1_2;
    Button b1_1;
    TextView session_text;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.user_activity_main);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.user_activity_main);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.user_activity_main_povorot);
        }

        b1_1 = (Button) findViewById(R.id.b1_1);
        b1_1.setOnClickListener(this);
        b1_2 = (Button) findViewById(R.id.b1_2);
        b1_2.setOnClickListener(this);
///////////////////////////////////////////////////////////////////////////////////////////
        session_text = (TextView) findViewById(R.id.session_text);

        Intent intent = getIntent();

        String fName = intent.getStringExtra("name_user");

        session_text.setText(fName);

    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main_user, menu);
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



            case R.id.update_pass:
                Update_PasslogText();
                break;
        }


        return super.onOptionsItemSelected(item);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public void onClick(View v) {
        switch (v.getId()){

            case R.id.b1_1:
                NewPDlogText();
                        break;

            case R.id.b1_2:
                RasxodPDlogText();
                break;


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

    private void Update_PasslogText() {
        SharedPreferences sPref = getPreferences(MODE_PRIVATE);
        String saveText = sPref.getString(TAG_SESSION, "");
        Intent intent = new Intent(this, Update_Pass.class);
        intent.putExtra("name_user", session_text.getText().toString());
        startActivity(intent);

    }


    ///////////////////////////////////////////////////////////////////////////////////////////////
}
