package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteStatement;
import android.util.Log;

import java.io.Serializable;
import java.util.ArrayList;

public class Pagamento implements Serializable {

    // Atributos
    private String id;
    private String valor;
    private String dataLimite;
    private String status;
    private String id_aluno;


    public Pagamento(String id, String valor, String dataLimite, String status, String id_aluno){

        this.id = id;
        this.valor = valor;
        this.dataLimite = dataLimite;
        this.status = status;
        this.id_aluno = id_aluno;

    }

    // GETS
    public String getId(){ return id;}

    public String getValor()
    {
        return valor;
    }

    public String getDataLimite() {
        return dataLimite;
    }

    public String getStatus(){
        return status;
    }

    public String getId_aluno() {
        return id_aluno;
    }

    //SETs
    public void setId(String id) {
        this.id = id;
    }

    public void setValor(String valor){
        this.valor = valor;
    }

    public void setDataLimite(String dataLimite) {
        this.dataLimite = dataLimite;
    }

    public void setStatus(String status){
        this.status = status;
    }

    public void setId_aluno(String id_aluno) {
        this.id_aluno = id_aluno;
    }

}
