package amsi.dei.estg.ipleiria.pt.recursoshumanos;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.ContactsActivity;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.InformacoesActivity;
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
        Intent abrir= new Intent(this, LoginActivity.class);
        startActivity(abrir);

    }

    /*private void alertDialog() {
        AlertDialog.Builder dialog=new AlertDialog.Builder(this,R.style.MyDialogTheme);
        dialog.setMessage("Please Select any option");
        dialog.setTitle("Dialog Box");

        dialog.setIcon(R.drawable.icon_error);

        dialog.setPositiveButton("YES",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog,
                                        int which) {
                        Toast.makeText(getApplicationContext(),"Yes is clicked",Toast.LENGTH_LONG).show();
                    }
                });
*//*        dialog.setNegativeButton("cancel",new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                Toast.makeText(getApplicationContext(),"cancel is clicked",Toast.LENGTH_LONG).show();
            }
        });*//*
        AlertDialog alertDialog=dialog.create();
        alertDialog.show();
    }*/

    public void onClickInformacao(View view){
        Intent abrir = new Intent(this, InformacoesActivity.class);
        startActivity(abrir);

        //alertDialog();
    }

    public void onClickContactos(View view){
        Intent abrir = new Intent(this, ContactsActivity.class);
        startActivity(abrir);
    }
}
