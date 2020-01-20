package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.app.Dialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Build;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.MenuDrawerActivity;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.User;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.StartAppActivity;


public class LoginActivity extends AppCompatActivity {

    private SharedPreferences mPreferences;
    private SharedPreferences.Editor mEditor;

    private Button btn_login;
    private EditText edt_username;
    private EditText edt_password;
    boolean estado;
    Dialog myDialog;
    Context context;
    RequestQueue mQueue;
    User user;
    String token;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_login);

        btn_login = findViewById(R.id.btn_IrLogin);

        edt_username = findViewById(R.id.edt_username);

        edt_password = findViewById(R.id.edt_password);

        myDialog = new Dialog(this);

        mPreferences = PreferenceManager.getDefaultSharedPreferences(this);

        mEditor = mPreferences.edit();

        CarregarDados_SHARE_PREFERENCE();

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                    if(isNetworkAvaliable()){

                        boolean existe= VerificarSharedPreferences();

                        if(existe) {

                            Intent abrir = new Intent(getApplicationContext(), MenuDrawerActivity.class);

                            // ABRE A ATIVIDADE MENU DRAWER
                            startActivity(abrir);

                            // FECHA ESTA ATIVIDADE
                            finish();

                        }else {

                            String username = edt_username.getText().toString();
                            String password = edt_password.getText().toString();

                            if (username.equals("") || password.equals("")) {

                                edt_username.setError(getString(R.string.username_invalido));
                                edt_password.setError(getString(R.string.password_invalida));

                            }else {

                                if(isNetworkAvaliable()) {

                                    ValidarUtilizador(username, password);

                                }
                            }
                        }

                    }else {

                        PopUP_Ligacao_internet();

                    }
            }
        });
    }

    /*<!--VALIDAR SE EXISTE ALGUM UTILIZADOR COM OS DADOS INTRODUZIDOS-->*/
    public void ValidarUtilizador(String USERNAME, final String PASSWORD){

        String DOMINIO= "https://weunify.pt/API/web/v1";
        String ACTION = "/user/";

        String URL = DOMINIO + ACTION + "?access-token=m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl" + "&username=" + USERNAME + "&password=" + PASSWORD;

        mQueue = Volley.newRequestQueue(this);

        Log.i("-->", URL);
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONObject>() {

                    @RequiresApi(api = Build.VERSION_CODES.O)
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.i("-->", "" + response);
                        try{
                            for (int i=0; i < response.length(); i++){

                                int id = response.getInt("id");
                                String username = response.getString("username");
                                Log.i("-->", "" + username);
                                String auth_key = response.getString("auth_key");

                                // <---- GUARDAR NA SHARE PREFERENCES O USERNAME ---->
                                mEditor.putString(getString(R.string.SH_USERNAME),username);
                                mEditor.commit();

                                // <---- GUARDAR NA SHARE PREFERENCES O TOKEN ---->
                                mEditor.putString(getString(R.string.SH_TOKEN), auth_key);
                                mEditor.commit();

                                // # Guardar PASSWORD na shared Preferences
                                mEditor.putString(getString(R.string.SH_PASSWORD), PASSWORD);
                                mEditor.commit();

                                user = new User(id, username, auth_key);

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(context, "Não foi possivel encontrar o utilizador", Toast.LENGTH_SHORT).show();


                    }
                }
        );
        mQueue.add(jsonObjectRequest);
    }

    /*<!--VALIDAR SE EXISTE ALGUM UTILIZADOR GUARDADO NA SHARE PREFERENCES-->*/
    private boolean VerificarSharedPreferences(){

        String username = mPreferences.getString(getString(R.string.SH_USERNAME), "");
        String token = mPreferences.getString(getString(R.string.SH_TOKEN), "");

        if(username != null && token != null){

            return true;
        }else {
            return false;
        }

    }

    public void onClickRetornar(View view) {
        Intent goBack = new Intent(this, StartAppActivity.class);
        startActivity(goBack);
    }

    /*<!--ABRIR POPUP Ligacao_internet-->*/
    public void PopUP_Ligacao_internet() {

        ImageButton btnFechar;
        Button btnTentarNovamente;

        myDialog.setContentView(R.layout.popup_ligacao_internet);
        btnFechar = myDialog.findViewById(R.id.imgBtn_fechar);
        btnTentarNovamente = myDialog.findViewById(R.id.btn_tentar);

        btnFechar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                myDialog.dismiss();

            }
        });

        btnTentarNovamente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                myDialog.dismiss();

            }
        });

        myDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        myDialog.show();

    }

    /*<!--VERIFICAR LIGAÇÃO À INTERNET-->*/
    private boolean isNetworkAvaliable() {

        boolean estado;

        ConnectivityManager cm = (ConnectivityManager) getApplicationContext().getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        estado = activeNetwork != null && activeNetwork.isConnected();

        return estado;
    }

    public void CarregarDados_SHARE_PREFERENCE(){

        String username = mPreferences.getString(getString(R.string.SH_USERNAME), "");
        String password = mPreferences.getString(getString(R.string.SH_PASSWORD), "");

        edt_username.setText(username);
        edt_password.setText(password);
    }
}


