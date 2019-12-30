package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import androidx.fragment.app.FragmentActivity;
import androidx.fragment.app.FragmentManager;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.HorarioBottomSheetDialog;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class ListaHorarioAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Horario> horarios;
    private String valor;
    private Integer id;


    public ListaHorarioAdaptador(Context context, ArrayList<Horario> horarios){

        this.context = context;
        this.horarios = horarios;

    }

    @Override
    public int getCount(){
        //Conta horarios do arrayList
        return horarios.size();
    }

    @Override
    public Object getItem(int position){
        //Obtém a posição do horario

        return horarios.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        if(inflater == null){

            //Dá à variável infalter o poder de carregar layouts
            inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }

        if(convertView == null){


            convertView = inflater.inflate(R.layout.item_lista_horario, null);


        }

/*        Button btn= (Button)  convertView  .findViewById(R.id.btn_item_detalhes);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Toast.makeText(context,  String.valueOf(v.getId()), Toast.LENGTH_SHORT).show();
                AlertDialog.Builder builder = new AlertDialog.Builder(context);

// 2. Chain together various setter methods to set the dialog characteristics
                builder.setMessage(R.string.dialog_message)
                        .setTitle(R.string.dialog_title);

// 3. Get the <code><a href="/reference/android/app/AlertDialog.html">AlertDialog</a></code> from <code><a href="/reference/android/app/AlertDialog.Builder.html#create()">create()</a></code>
                AlertDialog dialog = builder.create();

            }
        });*/


        ViewHolderLista viewHolder = (ViewHolderLista) convertView.getTag();

        if(viewHolder == null){

            viewHolder = new ViewHolderLista(convertView);
            convertView.setTag(viewHolder);
        }

        viewHolder.update(horarios.get(position));

        return convertView;
    }


    public class ViewHolderLista{

        private TextView hora_inicio;
        private TextView hora_fim;
        private TextView unidade_curricular;
        private TextView sala;
        private ImageButton btn;

        public ViewHolderLista(View convertView){
            hora_inicio = convertView.findViewById(R.id.tv_item_hora_inicio);
            hora_fim = convertView.findViewById(R.id.tv_item_hora_fim);
            unidade_curricular = convertView.findViewById(R.id.tv_item_uc);
            btn= convertView.findViewById(R.id.btn_item_detalhes);



/*            btn= convertView.findViewById(R.id.btn_item_detalhes);
            btn.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {

                    Toast.makeText(context,  String.valueOf(v.getId()), Toast.LENGTH_SHORT).show();
                }
            });*/


        }


        public void update(final Horario horario){

            hora_inicio.setText(horario.getHora_inicio());
            hora_fim.setText(horario.getHora_fim());
            unidade_curricular.setText(horario.getUnidade_curricular());

            btn.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {

                    HorarioBottomSheetDialog bt= new HorarioBottomSheetDialog();

                    FragmentManager fm = ((FragmentActivity)context).getSupportFragmentManager();

                    Bundle teste= new Bundle();
                    valor = String.valueOf(horario.getId());

                    teste.putString("id",valor);

                    bt.setArguments(teste);

                    Toast.makeText(context, ""+id, Toast.LENGTH_SHORT).show();
                    bt.show(fm,"");


                }
            });
        }

    }

}

