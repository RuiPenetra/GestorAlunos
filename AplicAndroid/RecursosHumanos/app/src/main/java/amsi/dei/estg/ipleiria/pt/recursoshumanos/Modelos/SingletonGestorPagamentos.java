package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
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
 /*   final String NEW_FORMAT = " hh:mm";
    final String OLD_FORMAT = "hh:mm:ss";*/
    private JsonArrayRequest jsonArrayRequest;
    private GestorAlunosHelper db;
    Pagamento p;

    public static synchronized SingletonGestorPagamentos getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorPagamentos(context);
        }
        return INSTANCE;
    }

    private SingletonGestorPagamentos(Context context){

       /* mQueue = Volley.newRequestQueue(context);
        db = new GestorAlunosHelper(context);

        String URL = "https://weunify.pt/API/web/pagamento";

       db.removerAllLivrosBD();

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            pagamentos = new ArrayList<>();
                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);


                                Log.i("-->","ciclo for:");

                                int id= posts.getInt("id");
                                //Log.i("-->","ID:" + pp.getId());
                                float valor= Float.parseFloat(posts.getString("valor"));
                                String dataLimite =posts.getString("data_lim");
                                int status =posts.getInt("status");
                                int id_aluno = posts.getInt("id_aluno");

                                Pagamento pagamento = new Pagamento(id,valor,dataLimite,status,id_aluno);
                                Log.i("-->","api");

                                pagamentos.add(db.adicionarLivroBD(pagamento));

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
*/

       mContext=context;
       pagamentos= new ArrayList<>();

        db = new GestorAlunosHelper(context);

    }

    public ArrayList<Pagamento> getPagamentosBD(){

        Log.i("-->","entrou no LISTAR");

        Log.i("-->","array devolvido é preenchido ");

         return db.mostrarTodosPagamentosBD();

    }

    /*public Pagamento getPagamento(String idPagamento){

        for (Pagamento p: pagamentos){
            if(p.getId()== idPagamento){
                return p;
            }
        }

        return null;
    }*/

    public void adicionarPagamentoBD(Pagamento pagamento){

        Pagamento auxPagamento = db.adicionarPagamentoBD(pagamento);

        if(auxPagamento != null){
            pagamentos.add(auxPagamento);
            System.out.println("--> ADICIONOU ");
        }
    }

    public void removerPagamentosBD(){

        db.removerTodosPagamentosBD();
    }

    public void carregarDadosAPI(){

        mQueue = Volley.newRequestQueue(mContext);

        String URL = "https://weunify.pt/API/web/pagamento";

        //db.removerAllLivrosBD();

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            pagamentos = new ArrayList<>();
                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);


                                Log.i("-->","ciclo for:");

                                int id= posts.getInt("id");
                                //Log.i("-->","ID:" + pp.getId());
                                float valor= Float.valueOf(posts.getString("valor"));
                                String dataLimite =posts.getString("data_lim");
                                int status =posts.getInt("status");
                                int id_aluno = posts.getInt("id_aluno");


                                Pagamento pagamento = new Pagamento(id,valor,dataLimite,status,id_aluno);

                                adicionarPagamentoBD(pagamento);


                                Log.i("-->","api");
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
