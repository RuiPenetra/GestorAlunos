package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Build;
import android.preference.PreferenceManager;
import android.util.Log;

import androidx.annotation.RequiresApi;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class SingletonGestorCalendario implements Serializable {
    private Context mcontext;
    private RequestQueue mQueue;
    private Calendario calendario;
    private static SingletonGestorCalendario INSTANCE = null;
    private static String TOKEN;


    public static synchronized SingletonGestorCalendario getInstance(Context context, String date){
        if(INSTANCE == null){
            INSTANCE = new SingletonGestorCalendario(context.getApplicationContext(), date);
        }

        return INSTANCE;
    }

    public Calendario retornaTeste(){
        return calendario;
    }

    private SingletonGestorCalendario(Context context, String date){


        mcontext = context;

        String DOMINIO ="https://weunify.pt/API/web/v1";
        String ACTION = "/alunoteste/";
        TOKEN = "m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";

        String URL = DOMINIO + ACTION + "?data=" + date + "&access-token=" + TOKEN;

        mQueue = Volley.newRequestQueue(mcontext);

        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONObject>() {

                    @RequiresApi(api = Build.VERSION_CODES.O)
                    @Override
                    public void onResponse(JSONObject response) {

                        try{
                            for (int i=0; i < response.length(); i++){

                                int id = response.getInt("id");
                                String data = response.getString("data");
                                String sala = response.getString("sala");
                                String duracao = response.getString("duracao");
                                int percentagem = response.getInt("percentagem");
                                int id_disciplina = response.getInt("id_disciplina");

                                calendario = new Calendario(id, data, sala, duracao, percentagem, id_disciplina);
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
    }

}
