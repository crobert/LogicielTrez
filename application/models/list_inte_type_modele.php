<?php
Class List_inte_type_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		function getListInteTypeById($id)
	{
		$sql = "SELECT * 
				FROM list_inte_type 
				WHERE list_inte_type_id = " . $id . "
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
	
	public function getListInteType()
	{
		$sql = "SELECT *
				FROM list_inte_type
				ORDER BY list_inte_type_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_inte_type',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_inte_type_id',$id);
		$this->db->delete('list_inte_type');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_inte_type_id',$id);
		$this->db->update('list_inte_type',$data);
	}
	
}
/* Fin de la classe List_inte_type */
/* Début des tests sur List_inte_type */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_inte_type;

echo "list_inte_type 1";
$test = $user->getList_inte_typeById(1);
var_dump(($test));


echo "list_inte_type all";
$test = $user->getList_inte_type();
var_dump($test);







// Fin des tests sur List_inte_type*/
