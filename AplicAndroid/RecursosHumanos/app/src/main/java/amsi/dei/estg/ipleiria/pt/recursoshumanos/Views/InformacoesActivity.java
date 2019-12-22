package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.StartAppActivity;

public class InformacoesActivity extends AppCompatActivity {

    private ImageView btn_retornar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_informacoes);

        btn_retornar=findViewById(R.id.btn_retornar_inicio);
    }

    public void onClickRetornarInicio(View view) {
        Intent next= new Intent(this, StartAppActivity.class);
        startActivity(next);
        finish();

    }
}
