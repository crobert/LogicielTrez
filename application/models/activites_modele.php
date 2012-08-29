<?php
Class Activites_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getActiviteById($id)
	{
		$sql = "SELECT * 
				FROM activites 
				WHERE acti_id = " . $id . "
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
	
	function getActiviteByUtilisateur($id)
	{
		$sql = "SELECT * 
				FROM activites 
				WHERE acti_utilisateur = " . $id . "
				";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function getActiviteByAgenda($id)
	{
		$sql = "SELECT * 
				FROM activites 
				WHERE acti_agenda = " . $id . "
				";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getActiviteList()
	{
		$sql = "SELECT *
				FROM activites
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function ToArray($objet)
	{
		$a = array(
			// Implémenter si besoin
		);	
		return $a;
	}
	
	function add($data)
	{
		$this->db->insert('activites',$data);
	}
	
	function delete($id)
	{
		$this->db->where('acti_id',$id);
		$this->db->delete('activites');
	}
	
	function update($id, $data)
	{
		$this->db->where('acti_id',$id);
		$this->db->update('activites',$data);
	}
	
}
/* Fin de la classe Activites */
/* Début des tests sur Activites */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new Activites;

echo "activit&eacute; 1";
$test = $user->getActiviteById(1);
var_dump(($test));


echo "activit&eacute; all";
$test = $user->getActiviteList();
var_dump($test);

echo "activit&eacute; util 1 ";
$test = $user->getActiviteByUtilisateur(1);
var_dump($test);

echo "activit&eacute; util 1 ";
$test = $user->getActiviteByAgenda(1);
var_dump($test);



// Fin des tests sur Activites*/
