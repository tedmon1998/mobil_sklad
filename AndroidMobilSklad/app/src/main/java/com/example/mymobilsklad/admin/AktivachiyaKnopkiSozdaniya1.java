package com.example.mymobilsklad.admin;


import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class AktivachiyaKnopkiSozdaniya1 implements TextWatcher {

    View v;
    EditText[] sozdList1;

    public AktivachiyaKnopkiSozdaniya1(EditText[] sozdList, Button v) {
        this.v = v;
        this.sozdList1 = sozdList;
    }

    @Override
    public void beforeTextChanged(CharSequence s, int start, int count, int after) {}

    @Override
    public void onTextChanged(CharSequence s, int start, int before, int count) {}

    @Override
    public void afterTextChanged(Editable s) {
        for (EditText textSozd1 : sozdList1) {
            if (textSozd1.getText().toString().trim().length() == 13) {

                v.setEnabled(true);
                break;
            }
            else v.setEnabled(false);
        }
    }
}