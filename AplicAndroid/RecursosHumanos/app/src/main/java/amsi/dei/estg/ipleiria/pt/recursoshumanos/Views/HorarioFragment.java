package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.annotation.SuppressLint;
import android.content.Context;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.CustomOnItemSelectedListener;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

import static amsi.dei.estg.ipleiria.pt.recursoshumanos.R.layout.custom_spinner;

/**
 * A simple {@link Fragment} subclass.
 */
public class HorarioFragment extends Fragment {

    Spinner spinnerDropDown;
    String[] cities = {
            "Mumbai",
            "Delhi",
            "Bangalore",
            "Hyderabad",
            "Ahmedabad",
            "Chennai",
            "Kolkata",
            "Pune",
            "Jabalpur"
    };

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_horario, container, false);

        final Context context = rootView.getContext(); // Assign your rootView to context


        String[] data = {"Java", "Python", "C++", "C#", "Angular", "Go"};

        ArrayAdapter adapter = new ArrayAdapter<String>(getContext(), android.R.layout.simple_spinner_item, getResources().getStringArray(R.array.dias_da_semana));
        adapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item);

        Spinner spinner = rootView.findViewById(R.id.spinner);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(getContext(),parent.getItemAtPosition(position).toString(),Toast.LENGTH_LONG).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        return rootView;
    }

}
