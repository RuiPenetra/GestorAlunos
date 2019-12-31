package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;

import java.sql.Array;
import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorHorarios;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class HorarioFragment extends Fragment {

    Spinner spinnerDropDown;
    private ArrayList<Horario> listaHorarios;
    private ListView lvListaHorario;
    private ListaHorarioAdaptador adaptador;
    private Horario r;
    private ArrayList<Horario> listaEscolhida;
    private ArrayAdapter adapter;
    private Integer ValorRecebido;

    public HorarioFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        setHasOptionsMenu(true);


        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_horario, container, false);

        // // <----- ListView ----->


        lvListaHorario = rootView.findViewById(R.id.lvHorarios);


        adapter = new ArrayAdapter<String>(getContext(), android.R.layout.simple_spinner_item, getResources().getStringArray(R.array.dias_da_semana));
        adapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item);

        Spinner spinner = rootView.findViewById(R.id.spinner);
        spinner.setAdapter(adapter);

        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                String selectedItemText= (String) adapter.getItem(position);

                if(selectedItemText != "Nenhum")
                {
                    listaEscolhida = SingletonGestorHorarios.getInstance(getContext()).getHorarioSpinner(selectedItemText);
                    lvListaHorario.setAdapter(new ListaHorarioAdaptador(getContext(), listaEscolhida));
                    lvListaHorario.deferNotifyDataSetChanged();

                }

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        return rootView;

    }

    // create an action bar button
    public void onCreateOptionsMenu(@NonNull Menu menu, @NonNull MenuInflater inflater) {

        // Para carregar o menu usa-se o Inflater
        inflater.inflate(R.menu.menu_notificacoes, menu);
        // Vai buscar aquele item
        MenuItem itemNotificacao = menu.findItem(R.id.itemNotificacao);

        super.onCreateOptionsMenu(menu, inflater);
    }

    // handle button activities
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if (id == R.id.itemNotificacao) {
            // do something here
        }
        return super.onOptionsItemSelected(item);
    }

    public void MyCustomAlertDialog(){

        AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
        View mView = getLayoutInflater().inflate(R.layout.dialog_add_event,null);

        mBuilder.setView(mView);
        AlertDialog dialog = mBuilder.create();
        dialog.show();
    }

}
