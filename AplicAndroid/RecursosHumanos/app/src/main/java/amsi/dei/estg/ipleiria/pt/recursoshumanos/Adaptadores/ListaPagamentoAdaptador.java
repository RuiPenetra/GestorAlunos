package amsi.dei.estg.ipleiria.pt.recursoshumanos.Adaptadores;

import android.annotation.SuppressLint;
import android.content.Context;
import android.graphics.drawable.Drawable;
import android.os.Build;
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

import androidx.annotation.RequiresApi;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;
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

    @RequiresApi(api = Build.VERSION_CODES.O)
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


        @RequiresApi(api = Build.VERSION_CODES.O)
        public void update(final Pagamento pagamento) {


            cb_status.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {

                    if(cb_status.isChecked()){

                        pagamento.setStatus(1);
                        SingletonGestorPagamentos.getInstance(context).atualizarPagamentoBD(pagamento);

                        imgV_status.setImageResource(R.drawable.img_pago);

                       // validarData(pagamento.getDataLimite());

                    } else{

                        pagamento.setStatus(0);
                        SingletonGestorPagamentos.getInstance(context).atualizarPagamentoBD(pagamento);

                        //validarData(pagamento.getDataLimite());
                        if(validarData(pagamento.getDataLimite())){

                            imgV_status.setImageResource(R.drawable.img_divida);
                        }else{
                            imgV_status.setImageResource(R.drawable.img_por_pagar);
                        }

                    }

                }
            });


            dataLimite.setText(pagamento.getDataLimite());
            valor.setText(String.valueOf(pagamento.getValor()));

            if (pagamento.getStatus()!=0 ) {

                cb_status.setChecked(true);
                imgV_status.setImageResource(R.drawable.img_pago);

            } else {

                if(validarData(pagamento.getDataLimite())){

                    imgV_status.setImageResource(R.drawable.img_divida);
                }else{
                    imgV_status.setImageResource(R.drawable.img_por_pagar);
                }

            }

        }

        @RequiresApi(api = Build.VERSION_CODES.O)
        public boolean validarData(String data_escolhida){

            LocalDate agora = LocalDate.now();
            DateTimeFormatter formatterData = DateTimeFormatter.ofPattern("yyyy-MM-dd");
            String dataFormatada = formatterData.format(agora);

            LocalDate data_atual= LocalDate.parse(dataFormatada,formatterData);

            LocalDate data_recebida = LocalDate.parse(data_escolhida,formatterData);



            //# SE FOR MAIOR ,A "data_atual" É DEPOIS DA "dataFormt"
            if (data_atual.compareTo(data_recebida) > 0) {

                //Por divida
                return true;

                //# SE FOR MENOR ,A "Data" É ANTES DA "dataFormt"
            } else{

                //atual
                return false;

            }

        }
    }

}
