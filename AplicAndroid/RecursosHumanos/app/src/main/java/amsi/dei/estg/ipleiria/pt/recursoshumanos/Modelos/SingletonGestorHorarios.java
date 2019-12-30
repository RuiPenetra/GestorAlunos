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

        horarios.add(new Horario(1,"8:00","9:00", "Integração na Profissão","A.S.1.14","Prof.Helena Duarte"));
        horarios.add(new Horario(2,"10:00","11:00", "Plataformas de Sistemas de Informação","D.S.2.1","Prof.João Santos"));
        horarios.add(new Horario(3,"12:00","13:00", "Acesso Móvel a Sistemas de Informação","A.S.1.1","Prof.Sónia Silva"));
        horarios.add(new Horario(4,"14:00","16:00", "Projeto em Sistemas de Informação","D.S.0.5","Prof.Elia Silva"));
        horarios.add(new Horario(5,"16:00","18:00", "Serviços e Interoperabilidade de Sistemas TeSP PSI(Lra + TV)","A.S.0.1","Prof.Anabela Duarte"));
        horarios.add(new Horario(6,"19:00","20:00", "Integração na Profissão","A.S.0.1","Prof.Maria Anacleta"));
    }
}
