package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.content.Context;
import android.content.IntentSender;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores.ListaPagamentoAdaptador;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
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

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        SingletonGestorPagamentos.getInstance(getContext());

    }



    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        setHasOptionsMenu(true);

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);
        lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);

        // // <----- ListView ----->
        if (isLigadoInternet()){
            //Vai buscar os pagamentos ao SIngleton


            Log.i( "-->","teste" );

            listaatualizada= SingletonGestorPagamentos.getInstance(getContext()).getPagamentos();
            lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));

            onDestroy();

        }
        else{
            Toast.makeText(getContext(), "Erro de ligação! Não está ligado à internet", Toast.LENGTH_SHORT).show();
        }

        return rootView;
    }


    @Override
    public void onDestroyView() {
        super.onDestroyView();
    }

    private boolean isLigadoInternet(){
        ConnectivityManager cm = (ConnectivityManager) getContext().getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        boolean isLigado = activeNetwork != null && activeNetwork.isConnected();
        return isLigado;
    }

   public void Atualizar(){

       listaatualizada= SingletonGestorPagamentos.getInstance(getContext()).getPagamentos();
       lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaatualizada));
   }

    /*public void onClickJSonRequest(View view) {
        if (isLigadoInternet()){
            String URL = "http://localhost/GestorAlunos/API/web/perfil";

            Toast.makeText(getContext(), "Ligado a internet", Toast.LENGTH_SHORT).show();
            JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                    Request.Method.GET,
                    URL,
                    null,
                    new Response.Listener<JSONObject>() {
                        @Override
                        public void onResponse(JSONObject response) {
                            textViewResultado.setText(response.toString());
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            textViewResultado.setText("Erro ao fazer o pedido Json");
                        }
                    }
            );
            queue.add(jsonObjectRequest);
        }
        else{
            Toast.makeText(getContext(), "Erro de ligação! Não está ligado à internet", Toast.LENGTH_SHORT).show();
        }
    }

    public void onClickJSonArrayRequest(View view){
        if (isLigadoInternet()){
            String URL = "http://localhost/GestorAlunos/API/web/perfil";

            JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(
                    Request.Method.GET,
                    URL,
                    null,
                    new Response.Listener<JSONArray>() {
                        @Override
                        public void onResponse(JSONArray response) {
                            Toast.makeText(getContext(), "Array com " + response.length() + " elementos", Toast.LENGTH_SHORT).show();
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(getContext(), "Erro ao fazer o pedido JSonArray!!", Toast.LENGTH_SHORT).show();
                        }
                    }
            );
            queue.add(jsonArrayRequest);
        }
        else{
            Toast.makeText(getContext(), "Erro de ligação! Não está ligado à internet", Toast.LENGTH_SHORT).show();
        }
    }*/

}
