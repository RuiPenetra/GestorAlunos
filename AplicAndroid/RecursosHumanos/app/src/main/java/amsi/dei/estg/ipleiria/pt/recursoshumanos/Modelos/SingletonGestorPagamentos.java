package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;
import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class SingletonGestorPagamentos implements Serializable {

    private ArrayList<Pagamento> pagamentos;
    private static SingletonGestorPagamentos INSTANCE = null;

    public static synchronized SingletonGestorPagamentos getInstance(){

        if(INSTANCE == null){

            INSTANCE = new SingletonGestorPagamentos();
        }
        return INSTANCE;
    }

    private SingletonGestorPagamentos(){

        pagamentos= new ArrayList<>();

        gerarFakeData();
    }

    public ArrayList<Pagamento> getPagamentos(){

        return pagamentos;
    }

    public Pagamento getPagamento(int idPagamento){

        for (Pagamento p: pagamentos){
            if(p.getId()== idPagamento){
                return p;
            }
        }

        return null;
    }

    private void gerarFakeData() {

        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
        pagamentos.add(new Pagamento(85,"2003-04-03", false));
        pagamentos.add(new Pagamento(85,"2003-04-03", true));
    }
}
