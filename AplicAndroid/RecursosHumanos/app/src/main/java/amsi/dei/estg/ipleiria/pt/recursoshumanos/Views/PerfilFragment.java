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


   Spinner dias_semana;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_perfil, container, false);

        final Context context = rootView.getContext(); // Assign your rootView to context

        CardView cv_dados_autenticacao = (CardView) rootView.findViewById(R.id.cv_dados_autenticacao);
        cv_dados_autenticacao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //Pass the context and the Activity class you need to open from the Fragment Class, to the Intent
                Intent intent = new Intent(context, DadosAutenticacaoActivity.class);
                startActivity(intent);
            }
        });

        CardView cv_dados_pessoais = (CardView) rootView.findViewById(R.id.cv_dados_pessoais);
        cv_dados_pessoais.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //Pass the context and the Activity class you need to open from the Fragment Class, to the Intent
                Intent intent = new Intent(context, DadosPessoaisActivity.class);
                startActivity(intent);
            }
        });

        CardView cv_dados_academicos= (CardView) rootView.findViewById(R.id.cv_dados_academicos);
        cv_dados_academicos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //Pass the context and the Activity class you need to open from the Fragment Class, to the Intent
                Intent intent = new Intent(context, DadosAcademicosActivity.class);
                startActivity(intent);
            }
        });

        return rootView;
    }


}
