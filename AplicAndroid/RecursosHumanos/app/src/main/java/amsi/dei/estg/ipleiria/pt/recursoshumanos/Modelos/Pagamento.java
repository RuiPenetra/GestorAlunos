package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;
import java.util.Date;

public class Pagamento implements Serializable {

    // Atributos
    private int id;
    private String valor;
    private String dataLimite;
    private boolean status;
    private int id_aluno;



    // Construtor
    public Pagamento(Integer id, String valor, String dataLimite, Boolean status, Integer id_aluno){

        this.id = id;
        this.valor = valor;
        this.dataLimite= dataLimite;
        this.status = status;
        this.id_aluno = id_aluno;
    }

    // GETS
    public int getId(){ return id;}

    public String getValor()
    {
        return valor;
    }

    public String getDataLimite() {
        return dataLimite;
    }

    public Boolean getStatus(){
        return status;
    }

    public int getId_aluno() {
        return id_aluno;
    }

    //SETs
    public void setId(int id) {
        this.id = id;
    }

    public void setValor(String valor){
        this.valor = valor;
    }

    public void setDataLimite(String dataLimite) {
        this.dataLimite = dataLimite;
    }

    public void setStatus(boolean status){
        this.status = status;
    }

    public void setId_aluno(int id_aluno) {
        this.id_aluno = id_aluno;
    }
}
