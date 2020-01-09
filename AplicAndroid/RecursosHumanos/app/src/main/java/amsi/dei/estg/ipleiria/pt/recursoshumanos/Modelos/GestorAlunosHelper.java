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

    private static final String TABLE_NAME ="Pagamentos";
    private static final String COL_1="id";
    private static final String COL_2 = "valor";
    private static final String COL_3 ="data";
    private static final String COL_4 = "estado";
    private static final String COL_5 = "id_aluno";
    private Context mcontext;
    private ArrayList<Pagamento> todospagamentos;


    private final SQLiteDatabase database;

    //# verifica se a base de dados existe, se existir
    public GestorAlunosHelper(Context context){

        super(context, BD_NOME, null, BD_VERSAO);


        this.database = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

       db.execSQL(
               "CREATE TABLE [pagamentos] (\n" +
               "[id] VARCHAR(60)  NOT NULL PRIMARY KEY,\n" +
               "[valor] VARCHAR(60)  NOT NULL,\n" +
               "[data] VARCHAR(60)  NOT NULL,\n" +
               "[estado] VARCHAR(60)  NOT NULL,\n" +
               "[id_aluno] VARCHAR(60)  NOT NULL\n" +
               ")"
            );

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME);
        this.onCreate(db);
    }


    // <----------------------------------------- MÉTODOS CRUD ----------------------------------------------->

    //#adicionar pagamento


    // # Para Devolver todos os livros da Base de Dados local
    public ArrayList<Pagamento> getAllPagamentosBD(){

        Log.e("-->","Função todos pagamentos ");

        ArrayList<Pagamento> pagamentos = new ArrayList<>();

        Cursor cursor = this.database.query(TABLE_NAME, new String[]{
                COL_1,COL_2,COL_3,COL_4,COL_5},
                null, null, null, null, null);

        if (cursor.moveToFirst()){
            do{
                Log.i("-->","TENTA ADICIONAR");
                Pagamento auxPagamento = new Pagamento(cursor.getString(1), cursor.getString(2), cursor.getString(3), cursor.getString(4), cursor.getString(5));
                pagamentos.add(auxPagamento);
                Log.i("-->","ADICIONOU");

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

    // # Para Adicionar na Base de Dados local
    public Pagamento addPagamentoBD(Pagamento pagamento){

        Log.i("-->","entrou adicionar");

        ContentValues values = new ContentValues();
        values.put(COL_1, pagamento.getId());
        values.put(COL_2, pagamento.getValor());
        values.put(COL_3, pagamento.getDataLimite());
        values.put(COL_4, pagamento.getStatus());
        values.put(COL_5, pagamento.getId_aluno());

        long id = this.database.insert(TABLE_NAME, null, values);

        // Se o pagamento foi inserido
        if(id > -1){
            Log.i("-->","Inserido");
            return pagamento;
        }
        return null;
    }

//    // # Para Atualizar na Base de Dados local
//    public boolean guardarLivroBD(Livro livro){
//
//        ContentValues values = new ContentValues();
//        values.put(TITULO_LIVRO, livro.getTitulo());
//        values.put(SERIE_LIVRO, livro.getSerie());
//        values.put(AUTOR_LIVRO, livro.getAutor());
//        values.put(ANO_LIVRO, livro.getAno());
//        values.put(CAPA_LIVRO, livro.getCapa());
//
//        return this.database.update(TABLE_NAME, values, "id = ?", new String[]{"" + livro.getId()}) > 0;
//    }

    // # Para Remover um elemento da Base de Dados local
    public boolean removerLivroBD(int idLivro){

        return (this.database.delete(TABLE_NAME, "id = ?", new String[]{"" + idLivro}) == 1) ;
    }

    // # Para Remover todos os elementos da Base de Dados local
    public void removerAllLivrosBD(){

        this.database.delete(TABLE_NAME, null, null);

    }
}
