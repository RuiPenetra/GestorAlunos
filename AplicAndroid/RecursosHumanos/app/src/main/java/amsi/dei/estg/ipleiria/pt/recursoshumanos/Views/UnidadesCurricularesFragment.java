package amsi.dei.estg.ipleiria.pt.recursoshumanos.Views;


import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class UnidadesCurricularesFragment extends Fragment {


    private View mViewGroup;
    private Button mButton;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View rootView= inflater.inflate(R.layout.fragment_unidades_curriculares, container, false);
        mViewGroup = rootView.findViewById(R.id.viewsContainer);

        mButton = rootView.findViewById(R.id.button);
        mButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View button) {

                if (mViewGroup.getVisibility() == View.VISIBLE) {
                    mViewGroup.setVisibility(View.GONE);
                    mButton.setText("Show");
                } else {
                    mViewGroup.setVisibility(View.VISIBLE);
                    mButton.setText("Hide");
                }
            }
        });

        return rootView;
    }

}
