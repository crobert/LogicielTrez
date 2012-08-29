<?php
Class Taches_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function getTacheById($id)
	{
		$sql = "SELECT * 
				FROM taches 
				WHERE tach_id = " . $id . "
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
	
	public function getTacheList()
	{
		$sql = "SELECT *
				FROM taches
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function ToArray($objet)
	{
		$a = array(
			//Implémenter si besoin
		);	
		return $a;
	}
	
	function add($data)
	{
		$this->db->insert('taches',$data);
	}
	
	function delete($id)
	{
		$this->db->where('tach_id',$id);
		$this->db->delete('taches');
	}
	
	function update($id, $data)
	{
		$this->db->where('tach_id',$id);
		$this->db->update('taches',$data);
	}
	
}
/* Fin de la classe Tache */
/* Début des tests sur Taches */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$tach = new Taches;

echo "user 1";
$test = $tach->getTacheById(1);
var_dump(utf8_decode($test->tach_intitule));
var_dump(($test));


echo "user all";
$test = $tach->getTacheList(1);
var_dump($test);







// Fin des tests sur Taches*/
