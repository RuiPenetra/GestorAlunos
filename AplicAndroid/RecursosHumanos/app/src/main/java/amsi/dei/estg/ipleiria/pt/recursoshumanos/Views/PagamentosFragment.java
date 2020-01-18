package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.app.Dialog;
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
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.os.Handler;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaHorarioAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaPagamentoAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.GestorAlunosHelper;
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
    private int valApagado;
    private GestorAlunosHelper db;
    SwipeRefreshLayout swipeRefreshLayout;
    Dialog myDialog;



    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        setHasOptionsMenu(true);

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);

        lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);
        cb_status = rootView.findViewById(R.id.cb_status);
        swipeRefreshLayout = (SwipeRefreshLayout) rootView.findViewById(R.id.swipeRefreshLayout);
        myDialog = new Dialog(getContext());

        // // <----- ListView ----->
        /*Verificar Conecção a Internet*/

        if(isNetworkAvaliable()){

            setHasOptionsMenu(false);

           // db = new GestorAlunosHelper(getContext());
//            listaatualizada = db.getAllPagamentosBD();

            listaatualizada = SingletonGestorPagamentos.getInstance(getContext()).getPagamentosBD();
            Log.e("--->","" + listaatualizada);

            lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
            lvListaPagamentos.deferNotifyDataSetChanged();

        }else{


            setHasOptionsMenu(true);

            PopUP_Ligacao_internet();

            listaatualizada = SingletonGestorPagamentos.getInstance(getContext()).getPagamentosBD();
            lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
            lvListaPagamentos.deferNotifyDataSetChanged();

        }

        //  <----------- Swipe Up Refresh Layout ----------->

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                new Handler().postDelayed(new Runnable() {
                    @Override
                    public void run() {

                        listaatualizada = SingletonGestorPagamentos.getInstance(getContext()).getPagamentosBD();
                        lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
                        lvListaPagamentos.deferNotifyDataSetChanged();
                        swipeRefreshLayout.setRefreshing(false);
                    }
                }, 2500);
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

        btnTentarNovamente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                myDialog.dismiss();
            }
        });

        myDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        myDialog.show();

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
