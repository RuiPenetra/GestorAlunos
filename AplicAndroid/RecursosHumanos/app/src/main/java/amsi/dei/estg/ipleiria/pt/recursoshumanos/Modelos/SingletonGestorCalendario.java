package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.os.Build;
import android.util.Log;

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

public class SingletonGestorCalendario implements Serializable {
    private Context mContext;
    private RequestQueue mQueue;
    private Calendario calendario;
    private static SingletonGestorCalendario INSTANCE = null;


    public static synchronized SingletonGestorCalendario getInstance(Context context){
        if(INSTANCE == null){
            INSTANCE = new SingletonGestorCalendario(context.getApplicationContext());
        }

        return INSTANCE;
    }

    public Calendario retornaTeste(){
        return calendario;
    }

    private SingletonGestorCalendario(Context context){

        mContext = context;

    }

    public void carregarDadosAPI(){

        Log.i("-->","Entrar");

        mQueue = Volley.newRequestQueue(mContext);

        String Dominio ="https://weunify.pt/API/web/v1/";
        String Action ="/alunoteste";
        String AcessToken = "m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";

        String URL = Dominio + Action + "?access-token=" + AcessToken;

        JsonObjectRequest jsonObjectRequest= new JsonObjectRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONObject>() {

                    @RequiresApi(api = Build.VERSION_CODES.O)
                    @Override
                    public void onResponse(JSONObject response) {

                            Log.i("-->","" + response);
       /*                     JSONObject posts = response.getJSONObject(1);

                            int id = posts.getInt("id");
                            Log.i("-->","" + id);
                            String data = posts.getString("data");
                            String sala = posts.getString("sala");
                            String duracao = posts.getString("duracao");
                            Integer percentagem = posts.getInt("percentagem");
                            Integer id_disciplina = posts.getInt("id_disciplina");*/


                         /*   calendario = new Calendario(id, data, sala, duracao, percentagem, id_disciplina);*/


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
    }

}
