package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class DadosAutenticacaoActivity extends AppCompatActivity {

    ImageView btn_novaPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dados_autenticacao);


        btn_novaPassword= findViewById(R.id.igV_editar_password);

    }

    public void OnClickNovaPassword(View view){

        Intent next= new Intent(this, NovaPasswordActivity.class);
        startActivity(next);
    }
}
