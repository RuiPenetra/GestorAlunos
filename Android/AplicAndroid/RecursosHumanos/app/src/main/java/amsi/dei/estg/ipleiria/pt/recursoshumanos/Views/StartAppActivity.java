package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.LoginActivity;

public class StartAppActivity extends AppCompatActivity {

    private Button btn_login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start_app);
        btn_login=findViewById(R.id.btn_IrLogin);
    }

    public void onClickIGoLogin(View view){
        Intent intent= new Intent(this, LoginActivity.class);
        startActivity(intent);
    }

}
