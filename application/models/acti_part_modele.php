<?php
Class Acti_part_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getActi_partByIds($utilID, $actiID)
	{
		$sql = "SELECT * 
				FROM acti_part 
				WHERE acti_part_acti = " . $actiID . "
				AND acti_part_util = " . $utilID . "
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
	
	public function getActi_part_utilList($utilID)
	{
		$sql = "SELECT *
				FROM acti_part
				WHERE acti_part_util = " . $utilID . "
				";
		
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getActi_part_actiList($actiID)
	{
		$sql = "SELECT *
				FROM acti_part
				WHERE acti_part_acti = " . $actiID . "
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getActi_partList()
	{
		$sql = "SELECT *
				FROM acti_part
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	
	public function ToArray($objet)
	{
		$a = array(
		
		//L'implémenter si besoin
		
		);	
		return $a;
	}
	
	function add($data)
	{
		$this->db->insert('acti_part',$data);
	}
	
	function delete($utilID, $actiID)
	{
		$this->db->where('acti_part_acti',$actiID);
		$this->db->where('acti_part_util',$utilID);
		$this->db->delete('acti_part');
	}
	
	function update($utilID, $actiID, $data)
	{
		$this->db->where('acti_part_acti',$actiID);
		$this->db->where('acti_part_util',$utilID);
		$this->db->update('acti_part',$data);
	}
	
}
/* Fin de la classe acti_part */
/* Début des tests sur acti_part */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new Acti_part;

echo "acti_part util 1";
$test = $user->getActi_part_utilList(1);
var_dump(($test));

echo "acti_part acti 1";
$test = $user->getActi_part_actiList(1);
var_dump(($test));

echo "acti_part by ids";
$test = $user->getActi_partByIds(1,2);
var_dump($test);

echo "acti_part all";
$test = $user->getActi_partList();
var_dump($test);






// Fin des tests sur Contacts*/
