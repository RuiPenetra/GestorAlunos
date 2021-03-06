package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;
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

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class SingletonGestorUnidadesCurriculares implements Serializable {

    private ArrayList<UnidadesCurriculares> unidadesCurriculares;
    private static SingletonGestorUnidadesCurriculares INSTANCE = null;
    private  RequestQueue mQueue;
    private Context mContext;
    private static String TOKEN;
    private SharedPreferences mPreferences;

    public static synchronized SingletonGestorUnidadesCurriculares getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorUnidadesCurriculares(context.getApplicationContext());
        }
        return INSTANCE;
    }

    private SingletonGestorUnidadesCurriculares(Context context){

        mContext=context;
        unidadesCurriculares= new ArrayList<>();


    }

    public ArrayList<UnidadesCurriculares> getUnidadesCurriculares(){

        return unidadesCurriculares;
    }

    public ArrayList<UnidadesCurriculares> getAtualizar(){

        return unidadesCurriculares;
    }

    public UnidadesCurriculares getUnidadeCurricular(int idUnidadeCurricular){

        for (UnidadesCurriculares uc: unidadesCurriculares){
            if(uc.getId()== idUnidadeCurricular){
                return uc;
            }
        }

        return null;
    }

    public ArrayList<UnidadesCurriculares> getUnidadesCurricularesSpinner(String semestre){

        ArrayList<UnidadesCurriculares> resultado= new ArrayList<>();

        for (UnidadesCurriculares u: unidadesCurriculares){
            if(u.getSemestre().equals(semestre)){

                resultado.add(u);

            }
        }

        if(resultado != null){

            return resultado;
        }else {

            return null;
        }
    }

    public void carregarDadosAPI()
    {
        mQueue = Volley.newRequestQueue(mContext);

        String Dominio ="https://weunify.pt/API/web/v1";
        String Action ="/disciplina";
        TOKEN = "m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";

        String URL = Dominio + Action + "?access-token=" + TOKEN;

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            unidadesCurriculares = new ArrayList<>(response.length());

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id = posts.getInt("id");
                                String nome = posts.getString("nome");
                                String abreviatura = posts.getString("abreviatura");
                                String semestre = posts.getString("semestre");
                                int id_professor = posts.getInt("id_professor");
                                int id_curso = posts.getInt("curso_id");

                                UnidadesCurriculares ucs = new UnidadesCurriculares(id,nome,abreviatura,semestre,id_professor,id_curso);

                                unidadesCurriculares.add(ucs);

                                Log.i("-->","" + posts.getString("nome"));

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
