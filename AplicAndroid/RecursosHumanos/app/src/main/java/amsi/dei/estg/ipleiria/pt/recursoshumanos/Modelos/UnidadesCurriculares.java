package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class UnidadesCurriculares implements Serializable {

    // Atributos
    private int id;
    private String nome;
    private String abreviatura;
    private String semestre;
    private int id_curso;
    private int id_professor;


    // Construtor
    public UnidadesCurriculares(Integer id, String nome, String abreviatura, String semestre, Integer id_curso, Integer id_professor){

        this.id = id;
        this.nome = nome;
        this.abreviatura = abreviatura;
        this.semestre = semestre;
        this.id_curso = id_curso;
        this.id_professor=id_professor;

    }

    // Getters and Setters (não tem setId())

    public int getId() {
        return id;
    }

    public String getNome() {
        return nome;
    }

    public String getAbreviatura() {
        return abreviatura;
    }

    public String getSemestre() {
        return semestre;
    }

    public int getId_curso() {
        return id_curso;
    }

    public int getId_professor() {
        return id_professor;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public void setAbreviatura(String abreviatura) {
        this.abreviatura = abreviatura;
    }

    public void setSemestre(String semestre) {
        this.semestre = semestre;
    }

    public void setId_curso(int id_curso) {
        this.id_curso = id_curso;
    }

    public void setId_professor(int id_professor) {
        this.id_professor = id_professor;
    }

}
