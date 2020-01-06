package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.content.Context;
import android.content.IntentSender;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaPagamentoAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorHorarios;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class PagamentosFragment extends Fragment {


    private ListView lvPagamentos;
    private ArrayList<Pagamento> listarecebida;
    private ArrayList<Pagamento> listaatualizada;
    private ListView lvListaPagamentos;
    private SearchView searchView;
    private CheckBox confirmar;
    private ImageView imV_status;
    private ListaPagamentoAdaptador adaptador;
    private  RequestQueue mQueue;
    private CheckBox cb_status;

    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        setHasOptionsMenu(true);

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);
        lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);
        cb_status = rootView.findViewById(R.id.cb_status);

        // // <----- ListView ----->
        /*Verificar Conecção a Internet*/

        if(isNetworkAvaliable()){

            setHasOptionsMenu(false);

            listaatualizada= SingletonGestorPagamentos.getInstance(getContext()).getPagamentos();
            lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
            lvListaPagamentos.deferNotifyDataSetChanged();

        }else{

            setHasOptionsMenu(true);
            OpenDialog();

        }

        return rootView;
    }

   public void Atualizar(){

       listaatualizada= SingletonGestorPagamentos.getInstance(getContext()).getPagamentos();
       lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
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

}
