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

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.ArrayList;

public class SingletonGestorCalendario implements Serializable {
    private Context mcontext;
    private RequestQueue mQueue;
    private ArrayList<Calendario> calendarios;
    private static SingletonGestorCalendario INSTANCE = null;


    public static synchronized SingletonGestorCalendario getInstance(Context context){
        if(INSTANCE == null){
            INSTANCE = new SingletonGestorCalendario(context.getApplicationContext());
        }

        return INSTANCE;
    }

    private SingletonGestorCalendario(Context context){
        mcontext = context;

        String URL = "https://weunify.pt/API/web/aula";


        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @RequiresApi(api = Build.VERSION_CODES.O)
                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            calendarios = new ArrayList<>(response.length());

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id = posts.getInt("id");
                                String data = posts.getString("data");
                                String sala = posts.getString("sala");
                                String duracao = posts.getString("duracao");
                                Integer percentagem = posts.getInt("percentagem");
                                Integer id_disciplina = posts.getInt("id_disciplina");


                                Calendario calendario = new Calendario(id, data, sala, duracao, percentagem, id_disciplina);

                                calendarios.add(calendario);

                                //Log.i("-->","" + posts.getInt("id"));

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
        mQueue.add(jsonArrayRequest);
    }

}
