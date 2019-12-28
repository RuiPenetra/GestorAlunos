package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class SingletonGestorPagamentos implements Serializable {

    private ArrayList<Pagamento> pagamentos;
    private static SingletonGestorPagamentos INSTANCE = null;
    private  RequestQueue mQueue;
    public static synchronized SingletonGestorPagamentos getInstance(){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorPagamentos();
        }
        return INSTANCE;
    }

    private SingletonGestorPagamentos(){

        pagamentos = new ArrayList<>();

        jsonParse();
    }

    public ArrayList<Pagamento> getPagamentos(){

        return pagamentos;
    }

    public Pagamento getPagamento(int idPagamento){

        for (Pagamento p: pagamentos){
            if(p.getId()== idPagamento){
                return p;
            }
        }

        return null;
    }

    private void jsonParse() {

        String URL = "https://jsonplaceholder.typicode.com/posts";

        final JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        try{
                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id = posts.getInt("id");
                                String title = posts.getString("title");
                                String body = posts.getString("body");

                                pagamentos.add(new Pagamento(id, title, true));
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                    }
                }
        );
        //mQueue.add(jsonArrayRequest);
    }
}
