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
import android.provider.SyncStateContract;
import android.util.Base64;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.MenuDrawerActivity;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Calendario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.DadosPessoais;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.User;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.StartAppActivity;

import static android.provider.Telephony.Carriers.PASSWORD;

public class LoginActivity extends AppCompatActivity {

    private SharedPreferences mPreferences;
    private SharedPreferences.Editor mEditor;

    private Button btn_login;
    private EditText edt_email;
    private EditText edt_password;
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

        edt_email = findViewById(R.id.edt_email);

        edt_password = findViewById(R.id.edt_password);

        myDialog = new Dialog(this);

        mPreferences = PreferenceManager.getDefaultSharedPreferences(this);

        mEditor = mPreferences.edit();

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (token != null){
                    // Intent que permite a passagem de parametros (email)
                    Intent abrir = new Intent(getApplicationContext(), MenuDrawerActivity.class);
                    // abrir.putExtra(MainActivity.CHAVE_EMAIL, email);

                    // ABRE A ATIVIDADE MENUDRAWER
                    startActivity(abrir);

                    // FECHA ESTA ATIVIDADE
                    finish();
                }

                if (isNetworkAvaliable()) {

                    String username = edt_email.getText().toString();
                    String passsword = edt_password.getText().toString();
                    String URL = "https://weunify.pt/API/web/v1/alunoteste/?username="+username+"&password="+passsword+"&access-token=m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";
                    mQueue = Volley.newRequestQueue(context);

                    //Log.i("-->", URL);
                    JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                            Request.Method.GET,
                            URL,
                            null,
                            new Response.Listener<JSONObject>() {

                                @RequiresApi(api = Build.VERSION_CODES.O)
                                @Override
                                public void onResponse(JSONObject response) {
                                    //Log.i("-->", response.toString());
                                    try{
                                        for (int i=0; i < response.length(); i++){

                                            int id = response.getInt("id");
                                            String username = response.getString("username");
                                            String auth_key = response.getString("auth_key");

                                            mEditor.putString(auth_key, token);
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
                                    Log.i("-->","erro");
                                }
                            }
                    );
                    mQueue.add(jsonObjectRequest);

                    // Intent que permite a passagem de parametros (email)
                    Intent abrir = new Intent(getApplicationContext(), MenuDrawerActivity.class);
                    // abrir.putExtra(MainActivity.CHAVE_EMAIL, email);

                    // ABRE A ATIVIDADE MENUDRAWER
                    startActivity(abrir);

                    // FECHA ESTA ATIVIDADE
                    finish();

                } else {

                    PopUP_Ligacao_internet();
                }


            }
        });
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

    /*<!--VERIFICAR SE EMAIL É VALIDO-->*/
    public boolean isEmailValido(String email) {
        if (email == null) {
            return false;
        }
        // Só devolve verdade se for um email válido
        return Patterns.EMAIL_ADDRESS.matcher(email).matches();
    }

    /*<!--VERIFICAR SE PASSWORD É VALIDA-->*/
    public boolean isPasswordValida(String password) {
        if (password == null) {
            return false;
        }
        return password.length() > 4;
    }
}


