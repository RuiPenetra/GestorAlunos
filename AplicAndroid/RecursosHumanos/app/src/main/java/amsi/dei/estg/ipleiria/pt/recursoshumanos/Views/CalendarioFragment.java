package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.Dialog;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CalendarView;
import android.widget.TextView;


import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Calendario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorCalendario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class CalendarioFragment extends Fragment {

    private Dialog MyDialog;
    private FloatingActionButton fab;
    private CalendarView calView;
    private TextView tvdia;
    private TextView sala;
    private TextView duracao;
    private Calendario lista;



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_calendario, container, false);

        calView = (CalendarView)rootView.findViewById(R.id.calendario);
        tvdia = (TextView)rootView.findViewById(R.id.tvdia);
        sala = (TextView)rootView.findViewById(R.id.sala);
        duracao = (TextView)rootView.findViewById(R.id.duracao);

        calView.setOnDateChangeListener(new CalendarView.OnDateChangeListener() {
            @Override
            public void onSelectedDayChange(@NonNull CalendarView view, int year, int month, int dayOfMonth) {
                String date = dayOfMonth + "/" + month + 1 + "/" + year;
                lista = SingletonGestorCalendario.getInstance(getContext(), date).retornaTeste();

                tvdia.setText(lista.getData());
                sala.setText(lista.getSala());
                duracao.setText(lista.getSala());
            }
        });

        return rootView;
    }

}
