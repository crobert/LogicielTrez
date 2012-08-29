<?php
Class List_droits_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	// On sélectionne 	
	function getListDroitsById($id)
	{
		$sql = "SELECT * 
				FROM list_droits 
				WHERE list_droi_id = " . $id . "
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
	
	public function getListDroits()
	{
		$sql = "SELECT *
				FROM list_droits
				ORDER BY list_droi_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_droits',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_droi_id',$id);
		$this->db->delete('list_droits');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_droi_id',$id);
		$this->db->update('list_droits',$data);
	}
	
}
/* Fin de la classe List_droit */
/* Début des tests sur List_droit */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_droit;

echo "list_droit 1";
$test = $user->getList_droitById(1);
var_dump(($test));


echo "list_droit all";
$test = $user->getList_droit();
var_dump($test);







// Fin des tests sur List_droit*/
