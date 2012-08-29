<?php
Class List_taches_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		function getListTachesById($id)
	{
		$sql = "SELECT * 
				FROM list_taches
				WHERE list_tach_id = " . $id . "
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
	
	public function getListTaches()
	{
		$sql = "SELECT *
				FROM list_taches
				ORDER BY list_tach_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_taches',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_tach_id',$id);
		$this->db->delete('list_taches');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_tach_id',$id);
		$this->db->update('list_taches',$data);
	}
	
}
/* Fin de la classe List_tach */
/* Début des tests sur List_tach */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_tach;

echo "list_tach 1";
$test = $user->getList_tachById(1);
var_dump(($test));


echo "list_tach all";
$test = $user->getList_tach();
var_dump($test);







// Fin des tests sur List_tach*/
