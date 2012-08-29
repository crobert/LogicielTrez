<?php
Class Contacts_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getContactById($id)
	{
		$sql = "SELECT * 
				FROM contacts 
				WHERE conta_id = " . $id . "
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
	
	public function getContactList()
	{
		$sql = "SELECT *
				FROM contacts
				";
				
		$result = array();
		$query=$this->db->query($sql);
		foreach( $query->result() as $user)
		{ 
			$result[$user->conta_id] = $user;
		}
		return $result;
	}
	
	public function ToArray($objet)
	{
		$a = array(
			'id' => $objet->conta_id,
			'civilite' => $objet->conta_civilite,			
			'nom' => utf8_decode($objet->conta_nom),
			'prenom' => utf8_decode($objet->conta_prenom),
			'actif' => $objet->conta_actif,
			'login' => $objet->conta_login,
			'mdp' => $objet->conta_mdp,
			'droit' => $objet->conta_droit,
			'type' => $objet->conta_type,
			'antenne' => $objet->conta_antenne,
			'mel' => $objet->conta_mel,
			'create' => $objet->conta_create,
			'update' => $objet->conta_update,
			//'commentaires' => utf8_decode($objet->conta_commentaire),
			'adresse' => $objet->conta_adresse,
			'cp' => $objet->conta_cp,
			'commune' => utf8_decode($objet->conta_commune),
			'insee' => $objet->conta_insee,
			'tel1' => $objet->conta_tel1,
			'tel2' => $objet->conta_tel2,
			'fax' => $objet->conta_fax,
			//'debut_journee' => $objet->conta_debutJournee,
			//'fin_journee' => $objet->conta_finJournee,
			//'week_end' => $objet->conta_weekEnd		
		);	
		return $a;
	}
	
	function add($data)
	{
		$this->db->insert('contacts',$data);
	}
	
	function delete($id)
	{
		$this->db->where('conta_id',$id);
		$this->db->delete('contacts');
	}
	
	function update($id, $data)
	{
		$this->db->where('conta_id',$id);
		$this->db->update('contacts',$data);
	}
	
}
/* Fin de la classe Contacts */
/* Début des tests sur Contacts */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new Contact;

echo "contact 1";
$test = $user->getContactById(1);
var_dump(utf8_decode($test->conta_prenom));
var_dump(($test));


echo "contact all";
$test = $user->getContactList();
var_dump($test);







// Fin des tests sur Contacts*/
