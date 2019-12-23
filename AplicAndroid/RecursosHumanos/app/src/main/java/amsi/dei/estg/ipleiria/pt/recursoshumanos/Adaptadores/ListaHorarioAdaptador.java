package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Horario;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;


public class ListaHorarioAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Horario> horarios;

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

        public ViewHolderLista(View convertView){
            hora_inicio = convertView.findViewById(R.id.tv_item_hora_inicio);
            hora_fim = convertView.findViewById(R.id.tv_item_hora_fim);
            unidade_curricular = convertView.findViewById(R.id.tv_item_uc);
            sala = convertView.findViewById(R.id.tv_item_sala);

        }


        public void update(Horario horario){

            hora_inicio.setText(horario.getHora_inicio().toString());
            hora_fim.setText(horario.getHora_fim().toString());
            unidade_curricular.setText(horario.getUnidade_curricular().toString());
            sala.setText(horario.getSala().toString());

        }

    }

}
