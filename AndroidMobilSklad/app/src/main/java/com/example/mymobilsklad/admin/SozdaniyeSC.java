package com.example.mymobilsklad.admin;

import android.Manifest;
import android.content.DialogInterface;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.widget.Toast;

import com.example.mymobilsklad.admin.Sozd_Product;
import com.google.zxing.Result;

import me.dm7.barcodescanner.zxing.ZXingScannerView;


public class SozdaniyeSC extends AppCompatActivity implements ZXingScannerView.ResultHandler {
    private static final int PERMISSION_REQUEST_CODE = 200;
    ZXingScannerView scaning;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        scaning = new ZXingScannerView(this);
        setContentView(scaning);
        if (checkPermission()) {

        } else {
            requestPermission();
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    @Override
    public void handleResult(Result result) {

        Sozd_Product.sozd_kod.setText(result.getText());

        onBackPressed();
    }

    @Override
    protected void onPause(){
        super.onPause();

        scaning.stopCamera();
    }

    @Override
    protected void onResume(){
        super.onResume();

        scaning.setResultHandler(this);
        scaning.startCamera();
    }


    /////////////////////////////////////////////////////////////////////////


    private boolean checkPermission() {
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED) {
            // Permission is not granted
            return false;
        }
        return true;
    }

    private void requestPermission() {

        ActivityCompat.requestPermissions(this,
                new String[]{Manifest.permission.CAMERA},
                PERMISSION_REQUEST_CODE);
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case PERMISSION_REQUEST_CODE:
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    Toast.makeText(getApplicationContext(), "Разрешение получено", Toast.LENGTH_SHORT).show();

                    // main logic
                } else {
                    Toast.makeText(getApplicationContext(), "Сканирование запущено", Toast.LENGTH_SHORT).show();
                    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA)
                                != PackageManager.PERMISSION_GRANTED) {
                        }
                    }
                }
                break;
        }
    }

}