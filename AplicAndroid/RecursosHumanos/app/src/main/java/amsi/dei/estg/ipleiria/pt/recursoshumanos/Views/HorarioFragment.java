package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.provider.Settings;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorHorarios;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class HorarioFragment extends Fragment {

    private Spinner spinnerDropDown;
    private ListView lvListaHorario;
    private ArrayList<Horario> listaEscolhida;
    private ArrayAdapter adapter;
    private TextView tv_dados;
    Dialog myDialog;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View rootView= inflater.inflate(R.layout.fragment_horario, container, false);

        lvListaHorario = rootView.findViewById(R.id.lvHorarios);
        spinnerDropDown = rootView.findViewById(R.id.spinner);
        tv_dados= rootView.findViewById(R.id.tv_dados);

        tv_dados.setVisibility(View.INVISIBLE);
        myDialog = new Dialog(getContext());


        /*Carregar array no spinner*/
        adapter = new ArrayAdapter<String>(getContext(), android.R.layout.simple_spinner_item, getResources().getStringArray(R.array.dias_da_semana));
        adapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item);

        spinnerDropDown.setAdapter(adapter);

        spinnerDropDown.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                if(parent.getItemAtPosition(position).equals("Nenhum")){

                }else{

                    if(isNetworkAvaliable()){

                        setHasOptionsMenu(false);

                        String itemSelecionado = parent.getItemAtPosition(position).toString();

                        Toast.makeText(getContext(), "" + itemSelecionado, Toast.LENGTH_SHORT).show();

                        listaEscolhida = SingletonGestorHorarios.getInstance(getContext()).getHorarioSpinner(itemSelecionado);

                        if(listaEscolhida != null){

                            lvListaHorario.setAdapter(new ListaHorarioAdaptador(getContext(), listaEscolhida));
                            lvListaHorario.deferNotifyDataSetChanged();

                        }else{

                            Log.e("-->","Não existe horários");
                        }

                    }else{

                        setHasOptionsMenu(true);
                        PopUP_Ligacao_internet();

                    }

                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        return rootView;

    }

    /*<!--ABRIR POPUP Ligacao_internet-->*/
    private boolean isNetworkAvaliable() {

        boolean estado;

        ConnectivityManager cm = (ConnectivityManager) getContext().getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        estado = activeNetwork != null && activeNetwork.isConnected();

        return estado;
    }

    // create an action bar button
    public void onCreateOptionsMenu(@NonNull Menu menu, @NonNull MenuInflater inflater) {

        // Para carregar o menu usa-se o Inflater
        inflater.inflate(R.menu.menu_erro, menu);
        // Vai buscar aquele item
        MenuItem itemErro = menu.findItem(R.id.itemErro);

        super.onCreateOptionsMenu(menu, inflater);
    }

    // handle button activities
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if (id == R.id.itemErro) {
        }
        return super.onOptionsItemSelected(item);
    }

    /*<!--ABRIR POPUP Ligacao_internet-->*/
    public void PopUP_Ligacao_internet(){

        ImageButton btnFechar;
        Button btnTentarNovamente;

        myDialog.setContentView(R.layout.popup_ligacao_internet);
        btnFechar = myDialog.findViewById(R.id.imgBtn_fechar);
        btnTentarNovamente = myDialog.findViewById(R.id.btn_tentar);

        btnFechar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                myDialog.dismiss();

            }
        });

        btnTentarNovamente.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                myDialog.dismiss();

            }
        });

        myDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        myDialog.show();

    }

}
