<?php
Class List_contrats_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		function getListContratsById($id)
	{
		$sql = "SELECT * 
				FROM list_contrats 
				WHERE list_contr_id = " . $id . "
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
	
	public function getListContrats()
	{
		$sql = "SELECT *
				FROM list_contrats
				ORDER BY list_contr_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_contrats',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_contr_id',$id);
		$this->db->delete('list_contrats');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_contr_id',$id);
		$this->db->update('list_contrats',$data);
	}
	
}
/* Fin de la classe List_contr */
/* Début des tests sur List_contr */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_contr;

echo "list_contr 1";
$test = $user->getList_contrById(1);
var_dump(($test));


echo "list_contr all";
$test = $user->getList_contr();
var_dump($test);







// Fin des tests sur List_contr*/
