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
import java.lang.reflect.Array;
import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.CustomOnItemSelectedListener;

public class SingletonGestorHorarios implements Serializable {

    private RequestQueue mQueue;
    private Context mContext;
    private ArrayList<Horario> horarios;
    private static SingletonGestorHorarios INSTANCE = null;

    public static synchronized SingletonGestorHorarios getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorHorarios(context.getApplicationContext());
        }
        return INSTANCE;
    }

    private SingletonGestorHorarios(Context context){

        mContext=context;
        horarios= new ArrayList<>();
        mQueue = Volley.newRequestQueue(mContext);

//      String URL = "http://localhost/GestorAlunos/API/web/perfil";
        String URL = "https://weunify.pt/API/web/aula";


        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            horarios = new ArrayList<>(response.length());

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id=posts.getInt("id");
                                String unidade_curricular = posts.getString("nome");
                                Log.i("-->","" + unidade_curricular);
                                String hora_inicio = posts.getString("inicio");
                                String hora_fim = posts.getString("fim");
                                String sala = posts.getString("sala");
                                String dia_semana = posts.getString("dia");
                                Integer id_turno = posts.getInt("id_turno");
                                Integer id_professor =posts.getInt("id_professor");
                                Integer horario_id =posts.getInt("horario_id");

                                Horario horario = new Horario(id,unidade_curricular, hora_inicio,hora_fim,sala,dia_semana,id_turno,id_professor,horario_id);

                                horarios.add(horario);

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

/*
    public Horario getHorarios(Horario pp){

        return horarios;
    }
*/

    public Horario getHorario(int idHorario){

        for (Horario h: horarios){
            if(h.getId()== idHorario){
                return h;
            }
        }

        return null;
    }

    public ArrayList<Horario> getHorarioSpinner(String dia_semana){

        ArrayList<Horario> resultado= new ArrayList<>();

        for (Horario h: horarios){
            if(h.getDia_semana().equals(dia_semana)){

                resultado.add(h);

            }
        }

        if(resultado != null){

            return resultado;
        }else {

            return null;
        }
    }

/*    private void Data() {

        horarios.add(new Horario(1,"8:00","9:00", "Integração na Profissão","A.S.1.14","Prof.Helena Duarte"));
        horarios.add(new Horario(2,"10:00","11:00", "Plataformas de Sistemas de Informação","D.S.2.1","Prof.João Santos"));
        horarios.add(new Horario(3,"12:00","13:00", "Acesso Móvel a Sistemas de Informação","A.S.1.1","Prof.Sónia Silva"));
        horarios.add(new Horario(4,"14:00","16:00", "Projeto em Sistemas de Informação","D.S.0.5","Prof.Elia Silva"));
        horarios.add(new Horario(5,"16:00","18:00", "Serviços e Interoperabilidade de Sistemas TeSP PSI(Lra + TV)","A.S.0.1","Prof.Anabela Duarte"));
        horarios.add(new Horario(6,"19:00","20:00", "Integração na Profissão","A.S.0.1","Prof.Maria Anacleta"));
    }*/
}
