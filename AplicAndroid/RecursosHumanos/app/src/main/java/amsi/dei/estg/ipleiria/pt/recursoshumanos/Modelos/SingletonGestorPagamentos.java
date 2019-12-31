package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.util.Log;

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

public class SingletonGestorPagamentos implements Serializable {

    private ArrayList<Pagamento> pagamentos;
    private static SingletonGestorPagamentos INSTANCE = null;
    private  RequestQueue mQueue;
    private Context mContext;
    private JsonArrayRequest jsonArrayRequest;
    Pagamento p;

    public static synchronized SingletonGestorPagamentos getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorPagamentos(context.getApplicationContext());
        }
        return INSTANCE;
    }

    private SingletonGestorPagamentos(Context context){

        mContext=context;
        pagamentos= new ArrayList<>();
        mQueue = Volley.newRequestQueue(mContext);

//      String URL = "http://localhost/GestorAlunos/API/web/perfil";
        String URL = "https://jsonplaceholder.typicode.com/posts";


        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            pagamentos = new ArrayList<>(response.length());

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id = posts.getInt("id");
                                String title = posts.getString("title");
                                String body = posts.getString("body");

                                Pagamento pp = new Pagamento(id,title,body);

                                pagamentos.add(pp);

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

    public ArrayList<Pagamento> getPagamentos(){

        return pagamentos;
    }

    public ArrayList<Pagamento> getAtualizar(){

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
        Log.i("->" , "1");

        jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try{
                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

//                                int id = posts.getInt("id");
                               /* String title = posts.getString("title");
                                String body = posts.getString("body");*/

                                Log.i("->" , "2");
                                p.setId(posts.getInt("id"));
                                p.setValor(posts.getString("title"));
                                p.setStatus( posts.getString("body"));
                                //pagamentos.add(new Pagamento(id, title, true));
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
        Log.i("->" , "3");
        //mQueue.add(jsonArrayRequest);
    }

    private ArrayList<Pagamento> buscardados(){


        return pagamentos;
    }



}
