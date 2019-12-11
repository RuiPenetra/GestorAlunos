package amsi.dei.estg.ipleiria.pt.recursoshumanos;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.ipleiria.pt.accordionview.AccordionView;


public class ContactsActivity extends AppCompatActivity {

/*    AccordionView btn_esecs = findViewById(R.id.btn_esecs);
    AccordionView btn_estg=findViewById(R.id.btn_estg);
    AccordionView btn_esslei=findViewById(R.id.btn_esslei);
    AccordionView btn_esad=findViewById(R.id.btn_esad);*/
    private ImageView btn_retornar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_contacts);

        btn_retornar=findViewById(R.id.btn_retornar_inicio);

    }

    public void onClickRetornarInicio(View view) {
        Intent goBack= new Intent(this, StartAppActivity.class);
        startActivity(goBack);
        finish();
    }

}
