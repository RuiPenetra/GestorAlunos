package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.MenuDrawerActivity;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class LoginActivity extends AppCompatActivity {

    private Button btn_login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        btn_login=findViewById(R.id.btn_IrLogin);

    }

    public void onClickLogin(View view){
        Intent next= new Intent(this, MenuDrawerActivity.class);
        startActivity(next);
    }

    public void onClickReturn(View view){
        Intent goBack= new Intent(this, StartAppActivity.class);
        startActivity(goBack);
    }
}
