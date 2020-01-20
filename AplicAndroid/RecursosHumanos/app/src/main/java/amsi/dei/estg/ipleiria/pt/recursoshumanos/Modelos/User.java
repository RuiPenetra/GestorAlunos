package amsi.dei.estg.ipleiria.pt.recursoshumanos.Modelos;

import java.io.Serializable;

public class User implements Serializable {

    private int id;
    private String username;
    private String auth_key;


    public User(int id, String username, String auth_key){

        this.id = id;
        this.username = username;
        this.auth_key = auth_key;

    }


    public int getId() {
        return id;
    }

    public String getUsername() {
        return username;
    }

    public String getAuth_key() {
        return auth_key;
    }



    public void setId(int id) {
        this.id = id;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public void setAuth_key(String auth_key) {
        this.auth_key = auth_key;
    }
}
