package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import android.animation.ValueAnimator;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorHorarios;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class HorarioBottomSheetDialog extends BottomSheetDialogFragment {


    private Horario listaHorario;
    private Horario r;
    private ArrayList<Horario> listaHorarios;
    private ListaHorarioAdaptador adaptador;
    private String ValorRecebido;
    private Integer idProfessor;
    private Integer id;
    private String nomeProfessor;
    private TextView tv_hora_inicio;
    private TextView tv_hora_fim;
    private TextView tv_sala;
    private TextView tv_uc;
    private TextView tv_professor;



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,Bundle savedInstanceState) {

        View v = inflater.inflate(R.layout.bottom_sheet_horario_layout, container, false);


        tv_hora_inicio = v.findViewById(R.id.tv_hora_inicio);
        tv_hora_fim = v.findViewById(R.id.tv_hora_fim);
        tv_sala = v.findViewById(R.id.tv_sala);
        tv_uc = v.findViewById(R.id.tv_uc);
        tv_professor = v.findViewById(R.id.tv_professor);


        Bundle dd= getArguments();

        ValorRecebido=dd.getString("id");

        id= Integer.parseInt(ValorRecebido);

        //Toast.makeText(getContext(), "" + id, Toast.LENGTH_SHORT).show();


        /*RECEBE O OBJETO DO RESULTADO DA PESQUISA FEITA NO ARRAY*/
        r= SingletonGestorHorarios.getInstance(getContext()).getHorario(id);


        tv_hora_inicio.setText(r.getHora_inicio());
        tv_hora_fim.setText(r.getHora_fim());
        tv_sala.setText(r.getSala());
        tv_uc.setText(r.getUnidade_curricular());
        tv_professor.setText(buscarNomeProfessor(r.getId_professor()));

        Toast.makeText(getContext(), "" + buscarNomeProfessor(r.getId_professor()), Toast.LENGTH_SHORT).show();

        return v;

    }

    private String buscarNomeProfessor(int idRcebido){

        RequestQueue mQueue = Volley.newRequestQueue(getContext());

//      String URL = "http://localhost/GestorAlunos/API/web/perfil";
        String URL = "https://weunify.pt/API/web/perfil";


        String teste;
        idProfessor=idRcebido;

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                Request.Method.GET,
                URL,
                null,
                new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try{

                            for (int i=0; i < response.length(); i++){
                                JSONObject posts = response.getJSONObject(i);

                                int idRecebido=posts.getInt("id_user");

                                if(idProfessor== idRecebido){

                                    String teste= posts.getString("nome");
                                    Log.i("-->1",""+nomeProfessor);
                                }

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

        return nomeProfessor;
    }


}