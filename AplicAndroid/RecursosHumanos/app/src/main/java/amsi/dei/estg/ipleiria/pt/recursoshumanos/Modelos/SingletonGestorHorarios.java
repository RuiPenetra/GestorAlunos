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

        horarios.add(new Horario("8:00","9:00", "ucs","A.S.0.1"));
        horarios.add(new Horario("8:00","9:00", "ucs","A.S.0.1"));
        horarios.add(new Horario("8:00","9:00", "ucs","A.S.0.1"));
        horarios.add(new Horario("8:00","9:00", "ucs","A.S.0.1"));
        horarios.add(new Horario("8:00","9:00", "ucs","A.S.0.1"));


    }
}
