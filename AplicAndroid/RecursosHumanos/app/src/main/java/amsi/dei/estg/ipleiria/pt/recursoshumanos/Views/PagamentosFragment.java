package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;

import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.provider.DocumentsContract;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

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

    private RequestQueue mqueue;
    private ListView lvPagamentos;
    private ArrayList<Pagamento> listaPagamentos;
    private ListView lvListaPagamentos;
    private SearchView searchView;
    private CheckBox confirmar;
    private ImageView imV_status;
    private ListaPagamentoAdaptador adaptador;
    private  RequestQueue mQueue;


    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        setHasOptionsMenu(true);

        // Inflate the layout for this fragment
        View rootView = inflater.inflate(R.layout.fragment_pagamentos, container, false);

        // // <----- ListView ----->
        if (isLigadoInternet()){
            mQueue = Volley.newRequestQueue(getContext());
            //Vai buscar os pagamentos ao SIngleton
            listaPagamentos= SingletonGestorPagamentos.getInstance().getPagamentos();

            lvListaPagamentos = rootView.findViewById(R.id.lvPagamentos);
            lvListaPagamentos.setAdapter(new ListaPagamentoAdaptador(getContext(), listaPagamentos));

            confirmar = (CheckBox) rootView.findViewById(R.id.cb_status);
            imV_status= (ImageView) rootView.findViewById(R.id.img_item_status);
        }
        else{
            Toast.makeText(getContext(), "Erro de ligação! Não está ligado à internet", Toast.LENGTH_SHORT).show();
        }

        return rootView;
    }



    private boolean isLigadoInternet(){
        ConnectivityManager cm = (ConnectivityManager) getContext().getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        boolean isLigado = activeNetwork != null && activeNetwork.isConnected();
        return isLigado;
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
