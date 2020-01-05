package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.content.Context;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaUnidadesCurricularesAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorHorarios;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorUnidadesCurriculares;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.UnidadesCurriculares;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class UnidadesCurricularesFragment extends Fragment {


    private ArrayAdapter adapter;
    private ArrayList<UnidadesCurriculares> listaEscolhida;
    private ListView lvListaUnidadesCurriculares;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_unidades_curriculares, container, false);

        lvListaUnidadesCurriculares = rootView.findViewById(R.id.lvUnidadesCurriculares);

        adapter = new ArrayAdapter<String>(getContext(), android.R.layout.simple_spinner_item, getResources().getStringArray(R.array.array_semestres));
        adapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item);

        Spinner spin_semestre = rootView.findViewById(R.id.spinner_semestre);
        spin_semestre.setAdapter(adapter);

        spin_semestre.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                String selectedItemText= (String) adapter.getItem(position);

                if(isNetworkAvaliable()) {

                    if (selectedItemText != "Nenhum") {


                        if (selectedItemText.equals("1ºSemestre")) {

                            selectedItemText = "1";

                            listaEscolhida = SingletonGestorUnidadesCurriculares.getInstance(getContext()).getUnidadesCurricularesSpinner(selectedItemText);
                            lvListaUnidadesCurriculares.setAdapter(new ListaUnidadesCurricularesAdaptador(getContext(), listaEscolhida));
                            lvListaUnidadesCurriculares.deferNotifyDataSetChanged();
                        } else {

                            selectedItemText = "2";

                            listaEscolhida = SingletonGestorUnidadesCurriculares.getInstance(getContext()).getUnidadesCurricularesSpinner(selectedItemText);
                            lvListaUnidadesCurriculares.setAdapter(new ListaUnidadesCurricularesAdaptador(getContext(), listaEscolhida));
                            lvListaUnidadesCurriculares.deferNotifyDataSetChanged();
                        }

                    }
                }else{
                    OpenDialog();
                }

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                
            }
        });

        return rootView;

    }

    private boolean isNetworkAvaliable() {

        boolean estado;

        ConnectivityManager cm = (ConnectivityManager) getContext().getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        estado = activeNetwork != null && activeNetwork.isConnected();

        return estado;
    }


    public void OpenDialog(){

        AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
        View mView = getLayoutInflater().inflate(R.layout.erro_dialog,null);

        mBuilder.setView(mView);
        AlertDialog dialog = mBuilder.create();
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.show();
    }

}
