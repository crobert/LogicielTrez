<?php
Class List_tarification_modele extends CI_Model
{
	 
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
		function getListTarificationById($id)
	{
		$sql = "SELECT * 
				FROM list_tarification
				WHERE list_tari_id = " . $id . "
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
	
	public function getListTarification()
	{
		$sql = "SELECT *
				FROM list_tarification
				ORDER BY list_tari_ordre ASC
				";
				
		$result = array(); 
		$query=$this->db->query($sql); 
		return $query->result(); 
	}
	
	function add($data)
	{
		$sql = "INSERT INTO list_tarification (list_tari_valeur)
				VALUES ('".$data."')
				";
		
		
		$this->db->query($sql); 
	}
	
	function delete($id)
	{
		$this->db->where('list_tari_id',$id); 
		$this->db->delete('list_tarification'); 
	}
	
	function update($id, $data)
	{
		$this->db->where('list_tari_id',$id); 
		$this->db->update('list_tarification',$data); 
	}
	// On retourne l'ordre max qui est déjà présent
	function getOrdreMax()
	{
		$sql = "SELECT * 
				FROM list_tarification
				WHERE list_tari_ordre = ( SELECT MAX( list_tari_ordre ) 
											FROM list_tarification )
				";
		$query = $this->db->query($sql); 
		$test = $query->row();
		return $test->list_tari_ordre; 
	}
	
	
	
}
/* Fin de la classe List_tari */
/* Début des tests sur List_tari */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_tari;

echo "list_tari 1";
$test = $user->getList_tariById(1);
var_dump(($test));


echo "list_tari all";
$test = $user->getList_tari();
var_dump($test);







// Fin des tests sur List_tari*/
