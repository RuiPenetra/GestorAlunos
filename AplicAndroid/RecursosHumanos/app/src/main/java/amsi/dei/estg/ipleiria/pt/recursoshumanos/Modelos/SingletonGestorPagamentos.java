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
    private GestorAlunosHelper db;

    public static synchronized SingletonGestorPagamentos getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorPagamentos(context);
        }
        return INSTANCE;
    }

    private SingletonGestorPagamentos(Context context){

        mContext = context;

        db = new GestorAlunosHelper(context);

    }

    public ArrayList<Pagamento> mostrarTodosPagamentosBD(){

         return db.mostrarTodosPagamentosBD();

    }

    public void adicionarPagamentoBD(Pagamento pagamento){

        Pagamento auxPagamento = db.adicionarPagamentoBD(pagamento);

        if(auxPagamento != null){
            pagamentos.add(auxPagamento);
        }
    }

    public void removerPagamentosBD(){

        db.removerTodosPagamentosBD();
    }

    public void carregarDadosAPI(){

        mQueue = Volley.newRequestQueue(mContext);

        String URL = "https://weunify.pt/API/web/v1/pagamento?access-token=m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";
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

                                int id= posts.getInt("id");
                                //Log.i("-->","" + id);
                                float valor= Float.valueOf(posts.getString("valor"));
                                String dataLimite =posts.getString("data_lim");
                                int status =posts.getInt("status");
                                int id_aluno = posts.getInt("id_aluno");

                                Pagamento pagamento = new Pagamento(id,valor,dataLimite,status,id_aluno);

                                adicionarPagamentoBD(pagamento);

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
