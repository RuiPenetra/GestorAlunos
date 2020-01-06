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
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Date;

public class SingletonGestorPagamentos implements Serializable {

    private ArrayList<Pagamento> pagamentos;
    private static SingletonGestorPagamentos INSTANCE = null;
    private  RequestQueue mQueue;
    private Context mContext;
    final String NEW_FORMAT = " hh:mm";
    final String OLD_FORMAT = "hh:mm:ss";
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

        String URL = "https://weunify.pt/API/web/pagamento";

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

                                Log.i("-->","entrou");

                                int id = posts.getInt("id");

                                Log.i("-->","" + id);
                                String valor = posts.getString("valor");
                                String dataLimit = posts.getString("data_lim");


                                boolean status;
                                if(posts.getString("status") == "0"){

                                   status = false;

                                }else{

                                    status = true;
                                }
                                int id_aluno = posts.getInt("id_aluno");

                                Pagamento pp = new Pagamento(id,valor,dataLimit,status,id_aluno);

                                pagamentos.add(pp);


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

    private ArrayList<Pagamento> buscardados(){


        return pagamentos;
    }

}
