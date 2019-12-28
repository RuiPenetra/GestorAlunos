package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;
import java.util.ArrayList;

public class SingletonGestorHorarios implements Serializable {

    private ArrayList<Horario> horarios;
    private static SingletonGestorHorarios INSTANCE = null;

    public static synchronized SingletonGestorHorarios getInstance(){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorHorarios();
        }
        return INSTANCE;
    }

    private SingletonGestorHorarios(){

        horarios= new ArrayList<>();

        gerarFakeData();
    }

    public ArrayList<Horario> getHorarios(){

        return horarios;
    }

    public Horario getHorario(int idHorario){

        for (Horario h: horarios){
            if(h.getId()== idHorario){
                return h;
            }
        }

        return null;
    }

    private void gerarFakeData() {

        horarios.add(new Horario(1,"8:00","9:00", "Integração na Profissão","A.S.0.1"));
        horarios.add(new Horario(2,"8:00","9:00", "Plataformas de Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(3,"8:00","9:00", "Acesso Móvel a Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(4,"8:00","9:00", "Projeto em Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(5,"8:00","9:00", "Serviços e Interoperabilidade de Sistemas TeSP PSI(Lra + TV)","A.S.0.1"));
        horarios.add(new Horario(6,"8:00","9:00", "Integração na Profissão","A.S.0.1"));
        horarios.add(new Horario(7,"8:00","9:00", "Plataformas de Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(8,"8:00","9:00", "Acesso Móvel a Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(9,"8:00","9:00", "Projeto em Sistemas de Informação","A.S.0.1"));
        horarios.add(new Horario(10,"8:00","9:00", "Serviços e Interoperabilidade de Sistemas TeSP PSI(Lra + TV)","A.S.0.1"));


    }
}
