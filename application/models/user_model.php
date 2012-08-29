<?php
Class User_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function testLog($login, $pass)
    {
        //Retourne un objet utilisateur si le couple login/pass est ok
        //Sinon retourne FAUX
        $sql="SELECT *
              FROM user
              WHERE user.login = '".$login."'
              AND user.password= '" $pass."'
        ";
        return $this->db->query($sql)->result();
    }

}
/* Fin de la classe Login_model */
