package com.example.mymobilsklad.admin;

import android.content.Context;
import android.os.AsyncTask;
import android.text.Html;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;
import java.util.concurrent.ExecutionException;

public class kol extends AsyncTask<String, Void, String> {

    private Context context;
    private TextView name;
    private int id = 1;

    public kol(Context context, TextView name, int day) {
        this.context = context;
        this.name = name;
        this.id = day;
    }

    protected void onPreExecute() {
    }

    @Override
    protected String doInBackground(String... arg0) {
        try {
            String link = HOST.host+"PHP/admin/kol.php";
            String data = URLEncoder.encode("id", "UTF-8") + "-" +id;
            URL url = new URL(link);
            URLConnection conn = url.openConnection();
            conn.setDoOutput(true);

            OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());

            wr.write(data);
            wr.flush();

            BufferedReader reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));

            StringBuilder sb = new StringBuilder();
            String line = null;

            while ((line = reader.readLine()) != null) {
                sb.append(line);
                break;
            }

            return sb.toString();
        } catch (Exception e) {
            return new String("Exception: " + e.getMessage());
        }
    }
    @Override
    protected void onPostExecute(String result){

        this.name.setText(Html.fromHtml(result));
    }
}

