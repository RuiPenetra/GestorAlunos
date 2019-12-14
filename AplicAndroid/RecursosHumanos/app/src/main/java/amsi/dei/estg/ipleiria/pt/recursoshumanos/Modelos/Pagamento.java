package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;
import java.util.Date;

public class Pagamento implements Serializable {

    // Atributos
    private int id;
    private float valor;
    private Date dataLimit;
    private boolean status;
    private static int autoIncrementID = 1;



    // Construtor
    public Pagamento(float valor, Date data, boolean status){

        this.id = autoIncrementID++;
        this.valor = valor;
        this.dataLimit = data;
        this.status = status;

    }

    // Getters and Setters (não tem setId())
    public int getId(){ return id;}

    public float getValor()
    {
        return valor;
    }

    public void setValor(float valor){
        this.valor = valor;
    }

    public Date getDataLimit() {
        return dataLimit;
    }

    public void setDataLimit(Date dataLimit) {
        this.dataLimit = dataLimit;
    }

    public boolean getStatus(){
        return status;
    }

    public void setStatus(boolean status){
        this.status = status;
    }
}
