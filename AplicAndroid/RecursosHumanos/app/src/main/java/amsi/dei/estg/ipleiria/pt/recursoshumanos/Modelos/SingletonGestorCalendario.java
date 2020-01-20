package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.os.Build;
import android.util.Log;

import androidx.annotation.RequiresApi;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

public class SingletonGestorCalendario implements Serializable {
    private Context mcontext;
    private RequestQueue mQueue;
    private Calendario calendario;
    private static SingletonGestorCalendario INSTANCE = null;


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

        String URL = "https://weunify.pt/API/web/v1/alunoteste/?data="+date+"&access-token=m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";

        Log.i("-->", URL);
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
                                String data = response.getString("data");
                                String sala = response.getString("sala");
                                String duracao = response.getString("duracao");
                                Integer percentagem = response.getInt("percentagem");
                                Integer id_disciplina = response.getInt("id_disciplina");

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
