<?php
Class Utilisateurs_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function login($username, $password)
	{
		$sql = "SELECT * 
				FROM utilisateurs 
				WHERE 'util_login = '" . $username . "' 
				AND 'util_mdp = '". MD5($password) . "'
				";
		
		$query = $this->db->query($sql);
		if($query -> num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	function getUtilisateurById($id)
	{
		$sql = "SELECT * 
				FROM utilisateurs 
				WHERE util_id = " . $id . "
				";
		
		$query = $this->db->query($sql);
		if ($query->num_rows()== 1)
		{
			return $query->row();
		}
		else
		{
			return FALSE ;
		}
	}
	function getUtilisateurWithCriteria($array)
	{
		$this->db->select()
				->from('utilisateurs')
				->where($array);
	}
		
	public function getUtilisateurList()
	{
		$sql = "SELECT *
				FROM utilisateurs
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function ToArray($objet)
	{
		$a = array(
			'id' => $objet->util_id,
			'civilite' => $objet->util_civilite,			
			'nom' => utf8_decode($objet->util_nom),
			'prenom' => utf8_decode($objet->util_prenom),
			'actif' => $objet->util_actif,
			'login' => $objet->util_login,
			'mdp' => $objet->util_mdp,
			'droit' => $objet->util_droit,
			'type' => $objet->util_type,
			'antenne' => $objet->util_antenne,
			'mel' => $objet->util_mel,
			'create' => $objet->util_create,
			'update' => $objet->util_update,
			//'commentaires' => utf8_decode($objet->util_commentaire),
			'adresse' => $objet->util_adresse,
			'cp' => $objet->util_cp,
			'commune' => utf8_decode($objet->util_commune),
			'insee' => $objet->util_insee,
			'tel1' => $objet->util_tel1,
			'tel2' => $objet->util_tel2,
			'fax' => $objet->util_fax,
			//'debut_journee' => $objet->util_debutJournee,
			//'fin_journee' => $objet->util_finJournee,
			//'week_end' => $objet->util_weekEnd		
		);	
		return $a;
	}
	
	function add($data)
	{
		$this->db->insert('utilisateurs',$data);
	}
	
	function delete($id)
	{
		$this->db->where('util_id',$id);
		$this->db->delete('utilisateurs');
	}
	
	function update($id, $data)
	{
		$this->db->where('util_id',$id);
		$this->db->update('utilisateurs',$data);
	}
	
}
/* Fin de la classe Utilisateur */
/* Début des tests sur Utilisateurs */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new Utilisateur;

echo "user 1";
$test = $user->getUtilisateurById(1);
var_dump(utf8_decode($test->util_prenom));
var_dump(($test));


echo "user all";
$test = $user->getUtilisateurList(1);
var_dump($test);







// Fin des tests sur Utilisateurs*/
