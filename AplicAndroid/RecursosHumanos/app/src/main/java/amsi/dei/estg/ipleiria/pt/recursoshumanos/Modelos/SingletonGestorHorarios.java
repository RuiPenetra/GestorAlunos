package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.app.Dialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.Build;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.RequiresApi;

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
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Date;
import java.util.Locale;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.CustomOnItemSelectedListener;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class SingletonGestorHorarios implements Serializable {

    private RequestQueue mQueue;
    private Context mContext;
    private ArrayList<Horario> horarios;
    final String NEW_FORMAT = " hh:mm";
    private String TOKEN;
    final String OLD_FORMAT = "hh:mm:ss";
    private SharedPreferences mPreferences;
    private SharedPreferences.Editor mEditor;

    private static SingletonGestorHorarios INSTANCE = null;


    public static synchronized SingletonGestorHorarios getInstance(Context context){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorHorarios(context.getApplicationContext());
        }
        return INSTANCE;
    }

    private SingletonGestorHorarios(Context context){


        mContext =context;

    }

    //<---Procura um determinado horário pelo id--->
    public Horario getHorario(int idHorario){

        for (Horario h: horarios){
            if(h.getId()== idHorario){
                return h;
            }
        }

        return null;
    }

    //<---Devolve o horário do dia da semana selecionado--->
    public ArrayList<Horario> getHorarioSpinner(String dia_semana){

        ArrayList<Horario> resultado= new ArrayList<>();

        if(horarios != null){

            for (Horario h: horarios){
                if(h.getDia_semana().equals(dia_semana)){

                    resultado.add(h);
                }
            }
            return resultado;

        }else{

            return null;
        }
    }

    //<---Carregar dados da API--->
    public void carregarDadosAPI(){



        mQueue = Volley.newRequestQueue(mContext);

        String Dominio ="https://weunify.pt/API/web/v1";
        String Action ="/aula";
        TOKEN = "m3C2gj0IZRmNMY1kDi8QQf8rr2D9cBgl";


        String URL = Dominio + Action + "?access-token=" + TOKEN;

        Log.i("-->","" + URL);
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @RequiresApi(api = Build.VERSION_CODES.O)
                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            horarios = new ArrayList<>();

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int id=posts.getInt("id");

                                String unidade_curricular = posts.getString("nome");

                                String hora_inicio= formatTime(posts.getString("inicio"));

                                String hora_fim = formatTime(posts.getString("fim"));

                                String sala = posts.getString("sala");
                                String dia_semana = posts.getString("dia");
                                Integer id_turno = posts.getInt("id_turno");
                                Integer id_professor =posts.getInt("id_professor");
                                Integer horario_id =posts.getInt("horario_id");

                                Horario horario = new Horario(id,unidade_curricular, hora_inicio,hora_fim,sala,dia_semana,id_turno,id_professor,horario_id);

                                horarios.add(horario);

                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(mContext, "Não é possivel carregar os dados da API", Toast.LENGTH_SHORT).show();
                    }
                }
        );
        mQueue.add(jsonArrayRequest);
    }

    public String formatTime(String time){

        String formatDate;
        SimpleDateFormat sdf = new SimpleDateFormat(OLD_FORMAT);
        Date d = null;
        try {
            d = sdf.parse(time);
        } catch (ParseException e) {
            e.printStackTrace();
        }
        sdf.applyPattern(NEW_FORMAT);
        formatDate=sdf.format(d);

        return formatDate;

    }
}
