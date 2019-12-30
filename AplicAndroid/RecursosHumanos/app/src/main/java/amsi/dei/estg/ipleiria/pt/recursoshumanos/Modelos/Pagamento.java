package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;
import java.util.Date;

public class Pagamento implements Serializable {

    // Atributos
    private int id;
    private String valor;
    private String status;
    private static int autoIncrementID = 1;



    // Construtor
    public Pagamento(Integer id, String valor, String status){

        this.id = id;
        this.valor = valor;
        this.status = status;

    }

    // Getters and Setters (não tem setId())
    public int getId(){ return id;}

    public String getValor()
    {
        return valor;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setValor(String valor){
        this.valor = valor;
    }

/*    public String getDataLimit() {

        //String data = dataLimit.toString();

        return dataLimit;
    }*/

/*    public void setDataLimit(String dataLimit) {
        this.dataLimit = dataLimit;
    }*/

    public String getStatus(){
        return status;
    }

    public void setStatus(String status){
        this.status = status;
    }
}
