package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.content.Context;
import android.content.Intent;
import android.os.Bundle;

import androidx.cardview.widget.CardView;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Spinner;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class PerfilFragment extends Fragment {


   private CardView cv_dados_autenticacao;
   private CardView cv_dados_pessoais;
   private CardView cv_dados_academicos;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_perfil, container, false);

        cv_dados_autenticacao = rootView.findViewById(R.id.cv_dados_autenticacao);
        cv_dados_academicos= rootView.findViewById(R.id.cv_dados_academicos);
        cv_dados_pessoais = rootView.findViewById(R.id.cv_dados_pessoais);

        cv_dados_autenticacao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(getContext(), DadosAutenticacaoActivity.class);
                startActivity(intent);
            }
        });


        cv_dados_pessoais.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(getContext(), DadosPessoaisActivity.class);
                startActivity(intent);
            }
        });


        cv_dados_academicos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), DadosAcademicosActivity.class);
                startActivity(intent);
            }
        });

        return rootView;
    }


}
