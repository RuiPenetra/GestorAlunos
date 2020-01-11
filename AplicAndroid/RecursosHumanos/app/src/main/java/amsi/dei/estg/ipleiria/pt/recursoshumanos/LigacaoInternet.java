package amsi.dei.estg.ipleiria.pt.recursoshumanos;

import android.app.AlertDialog;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.view.View;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;

public class LigacaoInternet {

    private Context context;

    public LigacaoInternet(Context context){

        this.context=context;


    }
    private boolean isNetworkAvaliable() {

        boolean estado;

        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);

        //necessita de permissões de acesso à internet e acesso ao estado da ligação
        NetworkInfo activeNetwork = cm.getActiveNetworkInfo();

        estado = activeNetwork != null && activeNetwork.isConnected();

        return estado;
    }

}
