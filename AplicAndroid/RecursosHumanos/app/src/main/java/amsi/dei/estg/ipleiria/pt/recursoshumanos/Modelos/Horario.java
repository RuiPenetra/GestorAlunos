package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class Horario implements Serializable {

    // Atributos
    private int id;
    private String unidade_curricular;
    private String hora_inicio;
    private String hora_fim;
    private String sala;
    private String dia_semana;
    private Integer id_turno;
    private Integer id_professor;
    private Integer horario_id;




    // Construtor
    public Horario(Integer id,String unidade_curricular, String hora_inicio, String hora_fim, String sala, String dia_semana, Integer id_turno, Integer id_professor, Integer horario_id){

        this.id = id;
        this.unidade_curricular = unidade_curricular;
        this.hora_inicio = hora_inicio;
        this.hora_fim = hora_fim;
        this.sala = sala;
        this.dia_semana=dia_semana;
        this.id_turno=id_turno;
        this.id_professor=id_professor;
        this.horario_id=horario_id;

    }

    // Getters and Setters (não tem setId())


    public int getId() {
        return id;
    }

    public String getUnidade_curricular() {
        return unidade_curricular;
    }

    public String getHora_inicio() {
        return hora_inicio;
    }

    public String getHora_fim() {
        return hora_fim;
    }

    public String getSala() {
        return sala;
    }

    public String getDia_semana() {
        return dia_semana;
    }

    public Integer getId_turno() {
        return id_turno;
    }

    public Integer getId_professor() {
        return id_professor;
    }

    public Integer getHorario_id() {
        return horario_id;
    }


    public void setId(int id) {
        this.id = id;
    }

    public void setUnidade_curricular(String unidade_curricular) {
        this.unidade_curricular = unidade_curricular;
    }

    public void setHora_inicio(String hora_inicio) {
        this.hora_inicio = hora_inicio;
    }

    public void setHora_fim(String hora_fim) {
        this.hora_fim = hora_fim;
    }

    public void setSala(String sala) {
        this.sala = sala;
    }

    public void setDia_semana(String dia_semana) {
        this.dia_semana = dia_semana;
    }

    public void setId_turno(Integer id_turno) {
        this.id_turno = id_turno;
    }

    public void setId_professor(Integer id_professor) {
        this.id_professor = id_professor;
    }

    public void setHorario_id(Integer horario_id) {
        this.horario_id = horario_id;
    }
}
