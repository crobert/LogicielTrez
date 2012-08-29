<?php
Class Tiers_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function getTiersById($id)
	{
		$sql = "SELECT * 
				FROM tiers 
				WHERE tier_id = " . $id . "
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
	
	public function getTiersList()
	{
		$sql = "SELECT *
				FROM tiers
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
		$this->db->insert('tiers',$data);
	}
	
	function delete($id)
	{
		$this->db->where('tier_id',$id);
		$this->db->delete('tiers');
	}
	
	function update($id, $data)
	{
		$this->db->where('tier_id',$id);
		$this->db->update('tiers',$data);
	}
	
}
/* Fin de la classe Tiers */
/* Début des tests sur Tiers */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$tier = new Tiers;

echo "tier 1";
$test = $tier->getUserById(1);
var_dump(utf8_decode($test->tier_intitule));
var_dump(($test));


echo "tier all";
$test = $tier->getTiersList(1);
var_dump($test);







// Fin des tests sur Tiers*/
