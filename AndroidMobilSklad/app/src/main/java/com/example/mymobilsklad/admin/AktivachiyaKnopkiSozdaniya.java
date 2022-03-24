package com.example.mymobilsklad.admin;


import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class AktivachiyaKnopkiSozdaniya implements TextWatcher {

    View v;
    EditText[] sozdList;

    public AktivachiyaKnopkiSozdaniya(EditText[] sozdList, EditText v) {
        this.v = v;
        this.sozdList = sozdList;
    }

    @Override
    public void beforeTextChanged(CharSequence s, int start, int count, int after) {}

    @Override
    public void onTextChanged(CharSequence s, int start, int before, int count) {}

    @Override
    public void afterTextChanged(Editable s) {
        for (EditText textSozd : sozdList) {
            if (textSozd.getText().toString().trim().length() <= 1) {

                v.setEnabled(false);
                break;
            }
            if (textSozd.getText().toString().trim().length() ==11) {

                v.setEnabled(false);
                break;
            }
            else v.setEnabled(true);
        }
    }
}