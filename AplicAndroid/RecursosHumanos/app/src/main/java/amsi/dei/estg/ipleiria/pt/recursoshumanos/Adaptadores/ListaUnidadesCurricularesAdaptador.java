package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageButton;
import android.widget.TextView;


import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.UnidadesCurriculares;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;

public class ListaUnidadesCurricularesAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<UnidadesCurriculares> unidadesCurriculares;
    private String valor;
    private Integer id;


    public ListaUnidadesCurricularesAdaptador(Context context, ArrayList<UnidadesCurriculares> unidades_curriculares){

        this.context = context;
        this.unidadesCurriculares = unidades_curriculares;

    }

    @Override
    public int getCount(){
        //Conta horarios do arrayList
        return unidadesCurriculares.size();
    }

    @Override
    public Object getItem(int position){
        //Obtém a posição do horario

        return unidadesCurriculares.get(position);
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


            convertView = inflater.inflate(R.layout.item_lista_unidade_curricular, null);


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

        viewHolder.update(unidadesCurriculares.get(position));

        return convertView;
    }


    public class ViewHolderLista{

        private TextView unidade_curricular;
        private ImageButton btn;

        public ViewHolderLista(View convertView){
            unidade_curricular = convertView.findViewById(R.id.tv_nome_uc);
            btn= convertView.findViewById(R.id.btn_uc_detalhes);



/*            btn= convertView.findViewById(R.id.btn_item_detalhes);
            btn.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {

                    Toast.makeText(context,  String.valueOf(v.getId()), Toast.LENGTH_SHORT).show();
                }
            });*/


        }


        public void update(final UnidadesCurriculares unidadesCurriculares){


            unidade_curricular.setText(unidadesCurriculares.getNome());

            btn.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {

                   /* HorarioBottomSheetDialog bt= new HorarioBottomSheetDialog();

                    FragmentManager fm = ((FragmentActivity)context).getSupportFragmentManager();

                    Bundle ccccc= new Bundle();

                    valor = String.valueOf(horario.getId());
                    Toast.makeText(context, "" + valor, Toast.LENGTH_SHORT).show();
                    ccccc.putString("id",valor);

                    bt.setArguments(ccccc);

                    Toast.makeText(context, ""+id, Toast.LENGTH_SHORT).show();
                    bt.show(fm,"");*/


                }
            });
        }

    }

}

