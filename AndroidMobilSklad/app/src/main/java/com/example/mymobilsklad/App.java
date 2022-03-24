package com.example.mymobilsklad;

import android.app.Application;
import android.content.Context;
import android.support.annotation.NonNull;
import android.support.multidex.MultiDex;
import android.util.Log;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.remoteconfig.FirebaseRemoteConfig;

import java.util.HashMap;
import java.util.Map;

public class App extends Application {
    @Override
    protected void attachBaseContext(Context base) {
        super.attachBaseContext(base);
        MultiDex.install(this);
    }

    private static final String TAG = App.class.getSimpleName();

    @Override
    public void onCreate() {
        super.onCreate();

        final FirebaseRemoteConfig firebaseRemoteConfig = FirebaseRemoteConfig.getInstance();

        // set in-app defaults
        Map<String, Object> remoteConfigDefaults = new HashMap();
        remoteConfigDefaults.put(ForceUpdateChecker.KEY_UPDATE_REQUIRED, false);
        remoteConfigDefaults.put(ForceUpdateChecker.KEY_CURRENT_VERSION, "2.0");
        remoteConfigDefaults.put(ForceUpdateChecker.KEY_UPDATE_URL,
                " https://github.com/mobilsklad/teg/raw/master/app-debug.apk ");

        firebaseRemoteConfig.setDefaults(remoteConfigDefaults);
        firebaseRemoteConfig.fetch(5) // fetch every minutes
                .addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {
                        if (task.isSuccessful()) {
                            Log.d(TAG, "удаленный конфиг.");
                            //noinspection deprecation
                            firebaseRemoteConfig.activateFetched();
                        }
                    }
                });
    }
}