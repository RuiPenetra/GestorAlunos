package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.app.AlertDialog;
import android.app.Dialog;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CalendarView;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class CalendarioFragment extends Fragment {

    private Dialog MyDialog;
    private FloatingActionButton fab;
    private CalendarView calView;



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {


        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_calendario, container, false);


        calView = (CalendarView)rootView.findViewById(R.id.calendario);
        calView.setOnDateChangeListener(new CalendarView.OnDateChangeListener() {
            @Override
            public void onSelectedDayChange(@NonNull CalendarView view, int year, int month, int dayOfMonth) {
                String date = dayOfMonth + "/" + (month+1) + "/" + year;
                Log.d("teste",date);
            }
        });

        /*fab=rootView.findViewById(R.id.fab);

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
                View mView = getLayoutInflater().inflate(R.layout.erro_dialog,null);

                mBuilder.setView(mView);
                AlertDialog dialog = mBuilder.create();
                dialog.show();
            }

        });
*/


/*        customCalendar = (CustomCalendar) rootView.findViewById(R.id.customCalendar);

        String[] arr = {"2016-06-10", "2016-06-11", "2016-06-15", "2016-06-16", "2016-06-25"};
        for (int i = 0; i < 5; i++) {
            int eventCount = 3;
            customCalendar.addAnEvent(arr[i], eventCount, getEventDataList(eventCount));
        }*/


        return rootView;
    }

    public void MyCustomAlertDialog(){

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder mBuilder = new AlertDialog.Builder(getContext());
                View mView = getLayoutInflater().inflate(R.layout.erro_dialog,null);

                mBuilder.setView(mView);
                AlertDialog dialog = mBuilder.create();
                dialog.show();
            }

        });

    }

}
