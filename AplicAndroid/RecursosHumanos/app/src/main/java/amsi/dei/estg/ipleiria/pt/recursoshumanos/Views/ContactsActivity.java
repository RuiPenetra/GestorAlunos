package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.StartAppActivity;


public class ContactsActivity extends AppCompatActivity {


    private ImageView btn_retornar;
    private CardView card_servicos;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_contacts);

        btn_retornar=findViewById(R.id.btn_retornar_inicio);

    }

    public void onClickServicos(View view) {
        Intent next= new Intent(this, ContactosServicosActivity.class);
        startActivity(next);
    }

    public void onClickRetornarInicio(View view) {
        Intent goBack= new Intent(this, StartAppActivity.class);
        startActivity(goBack);
        finish();
    }

}
