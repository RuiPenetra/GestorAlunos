package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class HorarioBottomSheetDialog extends BottomSheetDialogFragment {


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,Bundle savedInstanceState) {

        View v = inflater.inflate(R.layout.bottom_sheet_layout, container, false);
        return v;

    }


}