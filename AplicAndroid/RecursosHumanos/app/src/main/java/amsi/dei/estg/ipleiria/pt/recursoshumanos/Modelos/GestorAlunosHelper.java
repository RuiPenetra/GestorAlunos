package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.Toast;

import java.util.ArrayList;

public class GestorAlunosHelper extends SQLiteOpenHelper {

    private static int BD_VERSAO =1;
    private static String BD_NOME = "gestoralunos.db";

    private static final String TABLE_PAGAMENTOS ="Pagamentos";
    private static final String TABLE_HORARIOS ="Horarios";

    private static final String ID_PAGAMENTO="id";
    private static final String VALOR = "valor";
    private static final String DATA_LIMITE ="data";
    private static final String ESTADO = "estado";
    private static final String ID_ALUNO = "id_aluno";

/*    private static final String ID_HORARIO="id";
    private static final String UNIDADE_CURRICULAR = "unidade_curricular";
    private static final String HORA_INICIO = "hora_inicio";
    private static final String HORA_FIM ="hora_fim";
    private static final String SALA = "sala";
    private static final String DIA_SEMANA = "dia_semana";
    private static final String ID_TURNO = "id_turno";
    private static final String ID_PROFESSOR = "id_professor";
    private static final String HORARIO_ID="horario_id";*/

    private final SQLiteDatabase database;

    //# verifica se a base de dados existe, se existir
    public GestorAlunosHelper(Context context){

        super(context, BD_NOME, null, BD_VERSAO);


        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {


/*        db.execSQL(
                "CREATE TABLE " + TABLE_HORARIOS + "(\n" +
                        ID_HORARIO + "INTEGER NOT NULL PRIMARY KEY,\n" +
                        UNIDADE_CURRICULAR + "TEXT NOT NULL,\n" +
                        HORA_INICIO + "TEXT NOT NULL,\n" +
                        HORA_FIM + "TEXT NOT NULL,\n" +
                        SALA + "TEXT  NOT NULL,\n" +
                        DIA_SEMANA + "TEXT  NOT NULL,\n" +
                        ID_TURNO + "TEXT  NOT NULL,\n" +
                        ID_PROFESSOR + "TEXT  NOT NULL\n" +
                        ")"
        );*/

        db.execSQL(
                "CREATE TABLE " + TABLE_PAGAMENTOS + "(\n" +
                        ID_PAGAMENTO + "INTEGER PRIMARY KEY,\n" +
                        VALOR + "TEXT NOT NULL,\n" +
                        DATA_LIMITE + "TEXT NOT NULL,\n" +
                        ESTADO + "TEXT NOT NULL,\n" +
                        ID_ALUNO + "INTEGER  NOT NULL\n" +
                        ")"
        );

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        db.execSQL("DROP TABLE IF EXISTS " + TABLE_PAGAMENTOS);
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_HORARIOS);
        this.onCreate(db);
    }


    // <----------------------------------------- MÉTODOS CRUD TABELA PAGAMENTOS----------------------------------------------->


    // # Para Adicionar na Base de Dados local
    public Pagamento adicionarPagamentoBD(Pagamento pagamento){

        ContentValues values = new ContentValues();
        values.put(ID_PAGAMENTO, pagamento.getId());
        values.put(VALOR, pagamento.getValor());
        values.put(DATA_LIMITE, pagamento.getDataLimite());
        values.put(ESTADO, pagamento.getStatus());
        values.put(ID_ALUNO, pagamento.getId_aluno());

        long id = this.database.insert(TABLE_PAGAMENTOS, null, values);

        // Se o pagamento foi inserido
        if(id > -1){
            Log.i("-->","Pagamento Inserido");
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

        return pagamentos;
    }

    // # Para Remover todos os elementos da Base de Dados local
    public void removerTodosPagamentosBD(){

        this.database.delete(TABLE_PAGAMENTOS, null, null);
        Log.i("-->","Pagamentos Apagados");

    }

    // # Para Remover todos os elementos da Base de Dados local
    public boolean atualizarPagamentoBD(Pagamento pagamento){

        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(ID_PAGAMENTO, pagamento.getId());
        contentValues.put(VALOR, pagamento.getValor());
        contentValues.put(DATA_LIMITE, pagamento.getDataLimite());
        contentValues.put(ESTADO, pagamento.getStatus());
        contentValues.put(ID_ALUNO, pagamento.getId_aluno());

        db.update(TABLE_PAGAMENTOS, contentValues, "id = ?", new String[] {String.valueOf(pagamento.getId())});

        return true;

    }


    // <----------------------------------------- MÉTODOS CRUD TABELA HORARIOS----------------------------------------------->

/*    // # Para Adicionar na Base de Dados local
    public Horario adicionarHorarioBD(Horario horario){

        ContentValues values = new ContentValues();
        values.put(ID_HORARIO, 1);
        values.put(UNIDADE_CURRICULAR, "22");
        values.put(HORA_INICIO, "22");
        values.put(HORA_FIM, "22");
        values.put(SALA, "22");
        values.put(DIA_SEMANA, 23);
        values.put(ID_TURNO, 2);
        values.put(ID_PROFESSOR, 2);
        values.put(HORARIO_ID,2);

        long id = this.database.insert(TABLE_HORARIOS, null, values);

        // Se o pagamento foi inserido
        if(id > -1){
            Log.i("-->","Horario Inserido");
            return horario;

        }else{
            Log.i("-->","Não inserio");
            return null;
        }

    }

    // # Para Devolver todos os horarios da Base de Dados local
    public ArrayList<Horario> mostrarTodosHorariosBD(){

        ArrayList<Horario> horarios = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_HORARIOS, new String[]{
                        ID_HORARIO,UNIDADE_CURRICULAR,HORA_INICIO,HORA_FIM,SALA,DIA_SEMANA,ID_TURNO,ID_PROFESSOR,HORARIO_ID},
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
                        cursor.getInt(cursor.getColumnIndex(ID_PROFESSOR)),
                        cursor.getInt(cursor.getColumnIndex(HORARIO_ID))
                );

                horarios.add(auxHorario);

            }while (cursor.moveToNext());
        }else{

            System.out.println("--> ERROOOOOOOO");
        }

        if(horarios != null){

            return horarios;
        }else{
            Log.e("-->","BD ARRAY É VAZIO");

            return null;
        }

    }

    // # Para Remover todos os elementos da Base de Dados local
    public void removerTodosHorariosBD(){

        this.database.delete(TABLE_HORARIOS, null, null);
        Log.i("-->","Apagados");

    }*/

}
