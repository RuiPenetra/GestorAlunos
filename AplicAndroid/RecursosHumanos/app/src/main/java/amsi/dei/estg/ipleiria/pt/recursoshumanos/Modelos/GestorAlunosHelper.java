package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import java.util.ArrayList;

public class GestorAlunosHelper extends SQLiteOpenHelper {

    private static int BD_VERSAO =1;
    private static String BD_NOME = "gestoralunos.db";

    private static final String TABLE_PAGAMENTOS ="Pagamentos";
    private static final String TABLE_HORARIOS ="horarios";

    private static final String ID_PAGAMENTO="id";
    private static final String VALOR = "valor";
    private static final String DATA_LIMITE ="data";
    private static final String ESTADO = "estado";
    private static final String ID_ALUNO = "id_aluno";


    private static final String ID_HORARIO="id";
    private static final String UNIDADE_CURRICULAR = "unidade_curricular";
    private static final String HORA_INICIO = "hora_inicio";
    private static final String HORA_FIM ="hora_fim";
    private static final String SALA = "sala";
    private static final String DIA_SEMANA = "dia_semana";
    private static final String ID_TURNO = "id_turno";
    private static final String ID_PROFESSOR = "id_professor";



    private final SQLiteDatabase database;

    //# verifica se a base de dados existe, se existir
    public GestorAlunosHelper(Context context){

        super(context, BD_NOME, null, BD_VERSAO);


        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

       db.execSQL(
               "CREATE TABLE " + TABLE_PAGAMENTOS + "(\n" +
               ID_PAGAMENTO + "INTEGER NOT NULL PRIMARY KEY,\n" +
               VALOR + "TEXT NOT NULL,\n" +
               DATA_LIMITE + "TEXT NOT NULL,\n" +
               ESTADO + "TEXT NOT NULL,\n" +
               ID_ALUNO + "INTEGER  NOT NULL\n" +
               ")"
            );


       db.execSQL(
                "CREATE TABLE " + TABLE_HORARIOS + "(\n" +
                 ID_HORARIO + "INTEGER NOT NULL PRIMARY KEY,\n" +
                 UNIDADE_CURRICULAR + "TEXT NOT NULL,\n" +
                 HORA_INICIO + "TEXT NOT NULL,\n" +
                 HORA_FIM + "TEXT NOT NULL,\n" +
                 SALA + "TEXT  NOT NULL\n" +
                 DIA_SEMANA + "TEXT  NOT NULL\n" +
                 ID_TURNO + "TEXT  NOT NULL\n" +
                 ID_PROFESSOR + "TEXT  NOT NULL\n" +
                 ")"
        );

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        db.execSQL("DROP TABLE IF EXISTS " + TABLE_PAGAMENTOS);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_HORARIOS);
        this.onCreate(db);
    }


    // <----------------------------------------- MÉTODOS CRUD ----------------------------------------------->

    //#adicionar pagamento

    // # Para Adicionar na Base de Dados local
    public Pagamento adicionarPagamentoBD(Pagamento pagamento){

        Log.i("-->","entrou adicionar");

        ContentValues values = new ContentValues();
        values.put(ID_PAGAMENTO, pagamento.getId());
        values.put(VALOR, pagamento.getValor());
        values.put(DATA_LIMITE, pagamento.getDataLimite());
        values.put(ESTADO, pagamento.getStatus());
        values.put(ID_ALUNO, pagamento.getId_aluno());

        long id = this.database.insert(TABLE_PAGAMENTOS, null, values);

        // Se o pagamento foi inserido
        if(id > -1){
            Log.i("-->","Inserido");
            return pagamento;
        }
        return null;
    }

    // # Para Devolver todos os pagamentos da Base de Dados local
    public ArrayList<Pagamento> mostrarTodosPagamentosBD(){

        ArrayList<Pagamento> pagamentos = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_PAGAMENTOS, new String[]{
                ID_PAGAMENTO,VALOR,DATA_LIMITE,ESTADO,ID_ALUNO},
                null, null, null, null, null);

        if (cursor.moveToFirst()){
            do{
                Log.i("-->","TENTA ADICIONAR" + cursor.getCount());
                Pagamento auxPagamento = new Pagamento(
                        cursor.getInt(cursor.getColumnIndex(ID_PAGAMENTO)),
                        cursor.getFloat(cursor.getColumnIndex(VALOR)),
                        cursor.getString(cursor.getColumnIndex(DATA_LIMITE)),
                        cursor.getInt(cursor.getColumnIndex(ESTADO)),
                        cursor.getInt(cursor.getColumnIndex(ID_ALUNO))
                );

                pagamentos.add(auxPagamento);

            }while (cursor.moveToNext());
        }else{

            System.out.println("--> ERROOOOOOOO");
        }

        Log.e("-->","SAIO");

        if(pagamentos!=null){

            Log.e("-->","BD ARRAY É VAZIO");
        }
        return pagamentos;
    }

    // # Para Remover todos os elementos da Base de Dados local
    public void removerTodosPagamentosBD(){

        this.database.delete(TABLE_PAGAMENTOS, null, null);

    }


    // # Para Adicionar na Base de Dados local
    public Horario adicionarHorario(Horario horario){

        Log.i("-->","entrou adicionar");

        ContentValues values = new ContentValues();
        values.put(ID_HORARIO, horario.getId());
        values.put(UNIDADE_CURRICULAR, horario.getUnidade_curricular());
        values.put(HORA_INICIO, horario.getHora_inicio());
        values.put(HORA_FIM, horario.getHora_fim());
        values.put(SALA, horario.getSala());
        values.put(DIA_SEMANA, horario.getDia_semana());
        values.put(ID_TURNO, horario.getId_turno());
        values.put(ID_PROFESSOR, horario.getId_professor());

        long id = this.database.insert(TABLE_PAGAMENTOS, null, values);

        // Se o horario foi inserido
        if(id > -1){
            Log.i("-->","Inserido");
            return horario;
        }
        return null;
    }

    // # Para Devolver todos os horarios da Base de Dados local
    public ArrayList<Horario> mostrarTodosHorariosBD(){

        ArrayList<Horario> horarios = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_HORARIOS, new String[]{
                        ID_HORARIO,UNIDADE_CURRICULAR,HORA_INICIO,HORA_FIM,SALA,DIA_SEMANA,ID_TURNO,ID_PROFESSOR},
                null, null, null, null, null);

        if (cursor.moveToFirst()){
            do{
                Log.i("-->","TENTA ADICIONAR" + cursor.getCount());
                Horario auxHorario = new Horario(
                        cursor.getInt(cursor.getColumnIndex(ID_HORARIO)),
                        cursor.getString(cursor.getColumnIndex(UNIDADE_CURRICULAR)),
                        cursor.getString(cursor.getColumnIndex(HORA_INICIO)),
                        cursor.getString(cursor.getColumnIndex(HORA_FIM)),
                        cursor.getString(cursor.getColumnIndex(SALA)),
                        cursor.getString(cursor.getColumnIndex(DIA_SEMANA)),
                        cursor.getInt(cursor.getColumnIndex(ID_TURNO)),
                        cursor.getInt(cursor.getColumnIndex(ID_PROFESSOR))
                );

                horarios.add(auxHorario);

            }while (cursor.moveToNext());
        }else{

            System.out.println("--> ERROOOOOOOO");
        }

        Log.e("-->","SAIO");

        if(horarios!=null){

            Log.e("-->","BD ARRAY É VAZIO");
        }
        return horarios;
    }

    // # Para Remover todos os elementos da Base de Dados local
    public void removerTodosHorariosBD(){

        this.database.delete(TABLE_HORARIOS, null, null);

    }

}
