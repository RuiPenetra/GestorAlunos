package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.os.Build;
import android.util.Log;
import android.widget.Toast;

import androidx.annotation.RequiresApi;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.ArrayList;

public class SingletonGestorDadosPessoais implements Serializable {

    private static SingletonGestorDadosPessoais INSTANCE = null;
    private Context mContext;
    private RequestQueue mQueue;
    private DadosPessoais dadosPessoais;

    public static synchronized SingletonGestorDadosPessoais getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorDadosPessoais(context);

        }

        return INSTANCE;
    }

    private SingletonGestorDadosPessoais(Context context){

        mContext = context;

    }

    public DadosPessoais mostrarDadosPessoais(){

        return dadosPessoais;

    }

    public void carregarDadosAPI(){


        RequestQueue mQueue = Volley.newRequestQueue(mContext);

        String Dominio = "https://weunify.pt/API/web/v1";
        String Action = "/perfil";
        String AcessToken = "m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";

        String URL = Dominio + Action + "?access-token=" + AcessToken;

        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(

                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONObject>() {

                    @Override
                    public void onResponse(JSONObject response) {

                        Log.i("-->", "" + response);


                        //dadosPessoais = new DadosPessoais(id,nome,email,genero,telemovel,data_nascimento);

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Log.i("-->","Erro");
                 }
                }
                );
        // Adding JsonObject request to request queue
        mQueue.add(jsonObjectRequest);
    }

}
