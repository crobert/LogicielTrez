<?php
Class List_tags_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		function getListTagsById($id)
	{
		$sql = "SELECT * 
				FROM list_tags
				WHERE list_tags_id = " . $id . "
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
	
	public function getListTags()
	{
		$sql = "SELECT *
				FROM list_tags
				ORDER BY list_tags_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_tags',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_tags_id',$id);
		$this->db->delete('list_tags');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_tags_id',$id);
		$this->db->update('list_tags',$data);
	}
	
}
/* Fin de la classe List_tag */
/* Début des tests sur List_tag */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_tag;

echo "list_tag 1";
$test = $user->getList_tagById(1);
var_dump(($test));


echo "list_tag all";
$test = $user->getList_tag();
var_dump($test);







// Fin des tests sur List_tag*/
