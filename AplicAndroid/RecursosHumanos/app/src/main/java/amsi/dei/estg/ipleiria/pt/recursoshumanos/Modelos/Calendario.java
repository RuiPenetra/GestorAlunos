package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class Calendario implements Serializable {

    private int id;
    private String data;
    private String sala;
    private String duracao;
    private int percentagem;
    private int id_disciplina;

    public Calendario(int id, String data, String sala, String duracao, int percentagem, int id_disciplina){

        this.id = id;
        this.data = data;
        this.sala = sala;
        this.duracao = duracao;
        this.percentagem = percentagem;
        this.id_disciplina = id_disciplina;
    }

    public int getId() {
        return id;
    }

    public String getData() {
        return data;
    }

    public String getSala() {
        return sala;
    }

    public String getDuracao() {
        return duracao;
    }

    public int getPercentagem() {
        return percentagem;
    }

    public int getId_disciplina() {
        return id_disciplina;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setData(String data) {
        this.data = data;
    }

    public void setSala(String sala) {
        this.sala = sala;
    }

    public void setDuracao(String duracao) {
        this.duracao = duracao;
    }

    public void setPercentagem(int percentagem) {
        this.percentagem = percentagem;
    }

    public void setId_disciplina(int id_disciplina) {
        this.id_disciplina = id_disciplina;
    }
}
