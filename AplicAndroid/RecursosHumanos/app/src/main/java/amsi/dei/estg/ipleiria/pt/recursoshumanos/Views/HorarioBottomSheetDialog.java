package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import android.animation.ValueAnimator;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

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
    private Integer id;
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
        r= SingletonGestorHorarios.getInstance().getHorario(id);


        tv_hora_inicio.setText(r.getHora_inicio());
        tv_hora_fim.setText(r.getHora_fim());
        tv_sala.setText(r.getSala());
        tv_uc.setText(r.getUnidade_curricular());
        tv_professor.setText(r.getProfessora());

        return v;

    }


}