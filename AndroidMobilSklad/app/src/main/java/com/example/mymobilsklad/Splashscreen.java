package com.example.mymobilsklad;

import android.app.Activity;
import android.content.Intent;
import android.content.res.Configuration;
import android.graphics.drawable.AnimationDrawable;
import android.os.Bundle;
import android.os.Handler;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.webkit.WebView;
import android.widget.ImageView;



public class Splashscreen extends Activity {

WebView anim;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
            setContentView(R.layout.spleshscreen);
        }
        if(getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
            setContentView(R.layout.spleshscreen_povorot);
        }



        anim = (WebView) findViewById(R.id.anim);
        anim.loadUrl("http://m.mobilsklad.beget.tech/eclipse.gif");


        new Handler().postDelayed(new Runnable() {
                @Override
                public void run () {
                    Intent i = new Intent(Splashscreen.this, registr.class);
                    startActivity(i);
                    overridePendingTransition(R.anim.diagonaltranslate,R.anim.alpha);
                    finish();
            }
        }, 3*700);
    }


}
