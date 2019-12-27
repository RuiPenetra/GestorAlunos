package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class Horario implements Serializable {

    // Atributos
    private int id;
    private String hora_inicio;
    private String hora_fim;
    private String unidade_curricular;
    private String sala;
    private static int autoIncrementID = 1;



    // Construtor
    public Horario(String hora_inicio, String hora_fim, String unidade_curricular, String sala){

        this.id = autoIncrementID++;
        this.hora_inicio = hora_inicio;
        this.hora_fim = hora_fim;
        this.unidade_curricular = unidade_curricular;
        this.sala = sala;

    }

    // Getters and Setters (não tem setId())
    public int getId(){ return id;}

    public String getHora_inicio() {
        return hora_inicio;
    }

    public String getHora_fim() {
        return hora_fim;
    }

    public String getUnidade_curricular() {
        return unidade_curricular;
    }

    public String getSala() {
        return sala;
    }


    public void setHora_inicio(String hora_inicio) {
        this.hora_inicio = hora_inicio;
    }

    public void setHora_fim(String hora_fim) {
        this.hora_fim = hora_fim;
    }

    public void setUnidade_curricular(String unidade_curricular) {
        this.unidade_curricular = unidade_curricular;
    }

    public void setSala(String sala) {
        this.sala = sala;
    }
}
