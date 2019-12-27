package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

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


    private ArrayList<Pagamento> listaPagamentos;
    private ListView lvListaPagamentos;
    private SearchView searchView;
    private CheckBox confirmar;
    private ImageView imV_status;
    private ListaPagamentoAdaptador adaptador;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        setHasOptionsMenu(true);

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);

        // // <----- ListView ----->

        //Vai buscar os pagamentos ao SIngleton
        listaPagamentos= SingletonGestorPagamentos.getInstance().getPagamentos();

        lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);
        lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaPagamentos));




        confirmar = (CheckBox) rootView.findViewById(R.id.cb_status);
        imV_status= (ImageView) rootView.findViewById(R.id.img_item_status);


        return rootView;
    }


}
