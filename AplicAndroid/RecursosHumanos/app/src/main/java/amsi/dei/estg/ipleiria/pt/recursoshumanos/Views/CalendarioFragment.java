package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Context;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.Objects;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class CalendarioFragment extends Fragment {

    private Dialog MyDialog;
    private FloatingActionButton fab;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_calendario, container, false);

        fab=rootView.findViewById(R.id.fab);

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
                View mView = getLayoutInflater().inflate(R.layout.dialog_add_event,null);

                mBuilder.setView(mView);
                AlertDialog dialog = mBuilder.create();
                dialog.show();
            }

        });

        return rootView;
    }

    public void MyCustomAlertDialog(){

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
                View mView = getLayoutInflater().inflate(R.layout.dialog_add_event,null);

                mBuilder.setView(mView);
                AlertDialog dialog = mBuilder.create();
                dialog.show();
            }

        });

    }

}
