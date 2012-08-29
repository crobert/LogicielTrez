<?php
class User_model extends CI_Model
{
    // retourne un objet utilisateur si le couple login/pass est ok
    public function validate_credentials($login, $password)
    {
        $this->db->select('login AS username')->from('user')->where('login', $login)->where('password', $password);

        return $this->db->get()->row();
        //Sinon retourne FAUX
        /*$sql="SELECT *
              FROM user
              WHERE user.login = '".$login."'
              AND user.password= '" $pass."'
        ";*/
        //return $this->db->query($sql)->result();
    }

}