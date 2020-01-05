package amsi.dei.estg.ipleiria.pt.recursoshumanos;

import android.app.AlertDialog;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.view.View;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;

public class LigacaoInternet {

    private Context mcontext;
    private Boolean estado;
    private static LigacaoInternet INSTANCE = null;


    public static synchronized LigacaoInternet getInstance(Context context) {

        if (INSTANCE == null) {

            INSTANCE = new LigacaoInternet(context.getApplicationContext());
        }
        return INSTANCE;

    }

    private LigacaoInternet(Context context){

        mcontext= context;

        verificarInternet(mcontext);

    }

    private boolean verificarInternet(Context context){
        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        boolean isLigado = activeNetwork != null && activeNetwork.isConnected();

        return isLigado;
    }

    public Boolean Result(){

        return estado;
    }

}
