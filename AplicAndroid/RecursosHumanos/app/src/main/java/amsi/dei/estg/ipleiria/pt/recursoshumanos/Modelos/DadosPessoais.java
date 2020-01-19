package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class DadosPessoais implements Serializable {

    // <!-- Atributos -->
    private int id;
    private String nome;
    private String email;
    private String genero;
    private String telemovel;
    private String data_nascimento;

    // <!-- Construtor -->
    public DadosPessoais(int id, String nome, String email, String genero, String telemovel, String data_nascimento){

        this.id = id;
        this.nome = nome;
        this.email = email;
        this.genero = genero;
        this.telemovel = telemovel;
        this.data_nascimento = data_nascimento;

    }

    // <!-- Gets -->
    public int getId() {
        return id;
    }

    public String getNome() {
        return nome;
    }

    public String getEmail() {
        return email;
    }

    public String getGenero() {
        return genero;
    }

    public String getTelemovel() {
        return telemovel;
    }

    public String getData_nascimento() {
        return data_nascimento;
    }

    // <!-- Sets -->
    public void setId(int id) {
        this.id = id;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public void setTelemovel(String telemovel) {
        this.telemovel = telemovel;
    }

    public void setData_nascimento(String data_nascimento) {
        this.data_nascimento = data_nascimento;
    }
}
