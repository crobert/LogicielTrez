<?php
Class List_tiers_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getListTiersById($id)
	{
		$sql = "SELECT * 
				FROM list_tiers
				WHERE list_tier_id = " . $id . "
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
	
	public function getListTiers()
	{
		$sql = "SELECT *
				FROM list_tiers
				ORDER BY list_tier_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_tiers',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_tier_id',$id);
		$this->db->delete('list_tiers');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_tier_id',$id);
		$this->db->update('list_tiers',$data);
	}
	
}
/* Fin de la classe List_tier */
/* Début des tests sur List_tier */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$tier = new List_tier;

echo "list_tier 1";
$test = $user->getList_tierById(1);
var_dump(($test));


echo "list_tier all";
$test = $tier->getList_tier();
var_dump($test);







// Fin des tests sur List_tier*/
