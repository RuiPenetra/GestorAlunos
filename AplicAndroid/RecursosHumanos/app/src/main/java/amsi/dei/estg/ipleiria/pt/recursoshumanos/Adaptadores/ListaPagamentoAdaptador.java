package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.annotation.SuppressLint;
import android.content.Context;
import android.graphics.drawable.Drawable;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.R;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.PagamentosFragment;

import static java.lang.System.out;


public class ListaPagamentoAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater inflater;
    private ArrayList<Pagamento> pagamentos;
    final String NEW_FORMAT = " dd/mm/YYYY";
    final String OLD_FORMAT = "hh:mm:ss";

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

    public class ViewHolderLista {

        private CheckBox cb_status;
        private TextView valor;
        private TextView dataLimite;
        private ImageView imgV_status;

        public ViewHolderLista(View convertView) {
            cb_status = convertView.findViewById(R.id.cb_status);
            valor = convertView.findViewById(R.id.tv_item_valor);
            dataLimite = convertView.findViewById(R.id.tv_item_dataLimite);
            imgV_status = convertView.findViewById(R.id.img_item_status);

        }


        public void update(final Pagamento pagamento) {


            cb_status.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    // update your model (or other business logic) based on isChecked

                    if (cb_status.isChecked()) {

                        imgV_status.setImageResource(R.drawable.img_pago);
                    } else {

                       validarData(pagamento.getDataLimite());
                    }

                }
            });

            dataLimite.setText(pagamento.getDataLimite());
            valor.setText(pagamento.getValor().toString());

            if (pagamento.getStatus().equals("1")) {

                //cb_status.setChecked(true);
                imgV_status.setImageResource(R.drawable.img_pago);

            } else {
                Log.i("-->", pagamento.getStatus());
                imgV_status.setImageResource(R.drawable.img_divida);
            }

        }

        public Date formatFormatar(String data) {

            String formatDate;
            SimpleDateFormat sdf = new SimpleDateFormat("dd/mm/yyyy");
            Date d = null;
            try {
                d = sdf.parse(data);
            } catch (ParseException e) {
                e.printStackTrace();
            }

            return d;
        }

        public void validarData(String dataRecb){

            SimpleDateFormat formataData = new SimpleDateFormat("dd-MM-yyyy");
            Date data = Calendar.getInstance().getTime();

            Date dataFormt = formatFormatar(dataRecb);

            //# SE FOR MAIOR ,A "Data" É DEPOIS DA "dataFormt"
          /*  if (data.compareTo(dataFormt) > 0 && estado) {

                cb_status.setChecked(false);

                imgV_status.setImageResource(R.drawable.img_divida);

                //# SE FOR MENOR ,A "Data" É ANTES DA "dataFormt"
            } else*/ if (data.compareTo(dataFormt) < 0) {

                cb_status.setChecked(true);
                imgV_status.setImageResource(R.drawable.img_por_pagar);


            } else {


                imgV_status.setImageResource(R.drawable.img_divida);
            }

        }
    }

}
