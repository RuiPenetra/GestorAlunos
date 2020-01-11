package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteStatement;
import android.util.Log;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;

public class Pagamento implements Serializable {

    // Atributos
    private int id;
    private float valor;
    private String dataLimite;
    private int status;
    private int id_aluno;


    public Pagamento(int id, float valor, String dataLimite, int status, int id_aluno){

        this.id = id;
        this.valor = valor;
        this.dataLimite = dataLimite;
        this.status = status;
        this.id_aluno = id_aluno;

    }

    // GETS
    public int getId(){ return id;}

    public float getValor()
    {
        return valor;
    }

    public String getDataLimite() {
        return dataLimite;
    }

    public int getStatus(){
        return status;
    }

    public int getId_aluno() {
        return id_aluno;
    }

    //SETs
    public void setId(int id) {
        this.id = id;
    }

    public void setValor(float valor){
        this.valor = valor;
    }

    public void setDataLimite(String dataLimite) {
        this.dataLimite = dataLimite;
    }

    public void setStatus(int status){
        this.status = status;
    }

    public void setId_aluno(int id_aluno) {
        this.id_aluno = id_aluno;
    }

}
