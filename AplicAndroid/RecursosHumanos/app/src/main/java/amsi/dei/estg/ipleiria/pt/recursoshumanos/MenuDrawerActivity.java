package amsi.dei.estg.ipleiria.pt.recursoshumanos;

import android.R.layout;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

import com.google.android.material.navigation.NavigationView;

import java.util.ArrayList;

import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.Pagamento;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos.SingletonGestorPagamentos;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.CalendarioFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.ConfiguracoesFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.ForumFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.HorarioFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.PagamentosFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.PerfilFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.TurnosFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.UnidadesCurricularesFragment;
import amsi.dei.estg.ipleiria.pt.recursoshumanos.Views.WelcomeFragment;

import static android.R.layout.simple_spinner_dropdown_item;

public class MenuDrawerActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    private NavigationView navigationView;
    private DrawerLayout drawer;

    //public static final String CHAVE_EMAIL = "EMAIL";
    //private String email = "";
    private FragmentManager fragmentManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_drawer);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        navigationView = findViewById(R.id.nav_view);
        drawer = findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawer,
                toolbar, R.string.navigation_drawer_open,
                R.string.navigation_drawer_close);
        toggle.syncState();
        drawer.addDrawerListener(toggle);
        fragmentManager = getSupportFragmentManager();
        navigationView.setNavigationItemSelectedListener(this);
        carregarFragmentoInicial();

    }

/*    private void carregarCabecalho(){
        email = getIntent().getStringExtra(CHAVE_EMAIL);
        View view = navigationView.getHeaderView(0);
        TextView textview_user = view.findViewById(R.id.textViewEmail);
        textview_user.setText(email);
    }*/

    private void carregarFragmentoInicial(){
        navigationView.setCheckedItem(R.id.nav_inicio);
        Fragment fragment = new WelcomeFragment();
        fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
        setTitle("Bem-Vindo");
    }

    public boolean onNavigationItemSelected(MenuItem item) {

        // Handle navigation view item clicks here.
        Fragment fragment = null;
        switch (item.getItemId()) {
            case R.id.nav_inicio:
                fragment = new WelcomeFragment();
                setTitle(item.getTitle());
                break;
            case R.id.nav_horario:
                fragment = new HorarioFragment();
                setTitle(item.getTitle());
                break;
            case R.id.nav_calendario:
                fragment = new CalendarioFragment();
                setTitle(item.getTitle());
                break;
/*            case R.id.nav_forum:
                fragment = new ForumFragment();
                setTitle(item.getTitle());
                break;*/
            case R.id.nav_pagamentos:
                fragment = new PagamentosFragment();
                setTitle(item.getTitle());
                break;
/*            case R.id.nav_turno:
                fragment = new TurnosFragment();
                setTitle(item.getTitle());
                break;*/
            case R.id.nav_unidades_curriculares:
                fragment = new UnidadesCurricularesFragment();
                setTitle(item.getTitle());
                break;
            case R.id.nav_perfil:
                fragment = new PerfilFragment();
                setTitle(item.getTitle());
                break;
            case R.id.nav_configuracoes:
                fragment = new ConfiguracoesFragment();
                setTitle(item.getTitle());
                break;
            default:
                fragment = new WelcomeFragment();
                setTitle("Bem-Vindo");
        }
        if(fragment != null){
            fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
        }
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public void onClickCalendario(View view){

        Fragment fragment = new CalendarioFragment();
        setTitle("Calendário");
        fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
    }

    public void onClickHorario(View view){

        Fragment fragment = new HorarioFragment();
        setTitle("Horário");
        fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
    }

    public void onClickForum(View view){

        Fragment fragment = new ForumFragment();
        setTitle("Fórum");
        fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
    }




}
