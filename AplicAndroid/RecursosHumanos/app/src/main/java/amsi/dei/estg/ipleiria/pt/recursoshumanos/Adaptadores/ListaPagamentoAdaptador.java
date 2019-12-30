package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.annotation.SuppressLint;
import android.content.Context;
import android.graphics.drawable.Drawable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.TextView;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.GregorianCalendar;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.PagamentosFragment;

import static java.lang.System.out;


public class ListaPagamentoAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Pagamento> pagamentos;

    public ListaPagamentoAdaptador(Context context, ArrayList<Pagamento> pagamentos){

        this.context = context;
        this.pagamentos = pagamentos;

    }

    @Override
    public int getCount(){
        //Conta os pagamentos do arrayList
        return pagamentos.size();
    }

    @Override
    public Object getItem(int position){
        //Obtém a posição do pagamento

        return pagamentos.get(position);
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
            convertView = inflater.inflate(R.layout.item_lista_pagamento, null);
        }


        ViewHolderLista viewHolder = (ViewHolderLista) convertView.getTag();

        if(viewHolder == null){

            viewHolder = new ViewHolderLista(convertView);
            convertView.setTag(viewHolder);
        }

        viewHolder.update(pagamentos.get(position));



        return convertView;
    }

    public class ViewHolderLista{

        //private CheckBox status;
        private TextView valor;
        //private TextView dataLimite;
        private TextView status;

        public ViewHolderLista(View convertView){
            //status = convertView.findViewById(R.id.cb_status);
            valor = convertView.findViewById(R.id.tv_item_valor);
            //dataLimite = convertView.findViewById(R.id.tv_item_dataLimite);
            status = convertView.findViewById(R.id.tv_status);

        }


        public void update(Pagamento pagamento){

            //status.isChecked();
            valor.setText(pagamento.getValor().toString());
            status.setText(pagamento.getStatus().toString());


      /*      if(pagamento.getStatus()== false){

                conf_status.setImageResource(R.drawable.img_divida);

            }else{

                conf_status.setImageResource(R.drawable.img_pago);

            }*/

        }

    }

}
