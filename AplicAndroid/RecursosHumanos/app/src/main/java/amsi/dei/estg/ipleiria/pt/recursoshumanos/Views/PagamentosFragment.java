package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.SearchView;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaPagamentoAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class PagamentosFragment extends Fragment {


    private ArrayList<Pagamento> listaPagamentos;
    private ListView lvListaPagamentos;
    private SearchView searchView;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);

        // // <----- ListView ----->

        //Vai buscar os pagamentos ao SIngleton
        listaPagamentos= SingletonGestorPagamentos.getInstance().getPagamentos();

        lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);
        lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaPagamentos));

/*        lvListaPagamentos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                //Vai ao parent dos pagamentos buscar o item através da posição
                Pagamento tempPagamento = (Pagamento) parent.getItemAtPosition(position);

                Intent intent = new Intent(getContext(), DetalhesLivroActivity.class)
            }
        });*/

        return rootView;
    }

}
