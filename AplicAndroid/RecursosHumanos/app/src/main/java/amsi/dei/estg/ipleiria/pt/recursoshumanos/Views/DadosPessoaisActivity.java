package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.EditText;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.DadosPessoais;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorDadosPessoais;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class DadosPessoaisActivity extends AppCompatActivity {

    private EditText edt_nome;
    private EditText edt_email;
    private EditText edt_genero;
    private EditText edt_telemovel;
    private EditText edt_dataNascimento;
    private DadosPessoais dadosPessoais;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dados_pessoais);

        edt_nome = findViewById(R.id.edt_nome);
        edt_email = findViewById(R.id.edt_email);
        edt_genero = findViewById(R.id.edt_genero);
        edt_telemovel = findViewById(R.id.edt_telemovel);
        edt_dataNascimento = findViewById(R.id.edt_data_nascimento);


        dadosPessoais = SingletonGestorDadosPessoais.getInstance(this).mostrarDadosPessoais();

        edt_nome.setText(dadosPessoais.getNome());
        edt_email.setText(dadosPessoais.getEmail());
        edt_genero.setText(dadosPessoais.getGenero());
        edt_telemovel.setText(dadosPessoais.getTelemovel());
        edt_dataNascimento.setText(dadosPessoais.getData_nascimento());

    }
}
