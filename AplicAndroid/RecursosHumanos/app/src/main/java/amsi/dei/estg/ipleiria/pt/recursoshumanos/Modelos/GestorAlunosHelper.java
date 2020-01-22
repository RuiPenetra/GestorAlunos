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

    private static final String ID= "id";
    private static final String VALOR = "valor";
    private static final String DATA_LIMITE ="data";
    private static final String ESTADO = "estado";
    private static final String ID_ALUNO = "id_aluno";

    private final SQLiteDatabase database;

    //# verifica se a base de dados existe, se existir
    public GestorAlunosHelper(Context context){

        super(context, BD_NOME, null, BD_VERSAO);


        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        db.execSQL(
                "CREATE TABLE " + TABLE_PAGAMENTOS + "(\n"
                        + ID + " INTEGER  NOT NULL PRIMARY KEY,\n"
                        + VALOR + " TEXT  NOT NULL,\n"
                        + DATA_LIMITE + " TEXT  NOT NULL,\n"
                        + ESTADO + " TEXT  NOT NULL,\n"
                        + ID_ALUNO + " INTEGER  NOT NULL\n" +
                        ")"
        );

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        db.execSQL("DROP TABLE IF EXISTS " + TABLE_PAGAMENTOS);

        this.onCreate(db);
    }


    // <----------------------------------------- MÉTODOS CRUD TABELA PAGAMENTOS----------------------------------------------->


    // # Para Adicionar na Base de Dados local
    public Pagamento adicionarPagamentoBD(Pagamento pagamento){

        Log.i("-->","entrou adicionar");
        Log.i("-->", "Entrou___>" + pagamento.getId());
        ContentValues values = new ContentValues();
        Log.i("-->","#1");
        values.put(ID, pagamento.getId());
        Log.i("-->","#2");
        values.put(VALOR, pagamento.getValor());
        Log.i("-->","#3");
        values.put(DATA_LIMITE, pagamento.getDataLimite());
        Log.i("-->","#4");
        values.put(ESTADO, pagamento.getStatus());
        Log.i("-->","#5");
        values.put(ID_ALUNO, pagamento.getId_aluno());

        long id = this.database.insert("pagamentos", null, values);
        // Se o pagamento foi inserido
        if(id > -1){
            Log.i("-->","Pagamento Inserido");
            return pagamento;
        }

        Log.i("-->","nÃO GUARDOU");
        return null;
    }

    // # Para Devolver todos os pagamentos da Base de Dados local
    public ArrayList<Pagamento> mostrarTodosPagamentosBD(){

        ArrayList<Pagamento> pagamentos = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_PAGAMENTOS, new String[]{
                        ID,VALOR,DATA_LIMITE,ESTADO,ID_ALUNO},
                null, null, null, null, null);

        if (cursor.moveToFirst()){
            do{
                Pagamento auxPagamento = new Pagamento(
                        cursor.getInt(cursor.getColumnIndex(ID)),
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

        if(pagamentos==null){

            Log.i("-->","fddddddddddddddddddddd");


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
        contentValues.put(ID, pagamento.getId());
        contentValues.put(VALOR, pagamento.getValor());
        contentValues.put(DATA_LIMITE, pagamento.getDataLimite());
        contentValues.put(ESTADO, pagamento.getStatus());
        contentValues.put(ID_ALUNO, pagamento.getId_aluno());

        db.update(TABLE_PAGAMENTOS, contentValues, "id = ?", new String[] {String.valueOf(pagamento.getId())});

        return true;

    }

}
