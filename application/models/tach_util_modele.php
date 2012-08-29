<?php
Class Tach_util_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getTach_utilByIds($utilID, $tachID)
	{
		$sql = "SELECT * 
				FROM tach_util 
				WHERE tach_util_tach = " . $tachID . "
				AND tach_util_util = " . $utilID . "
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
	
	public function getTach_util_utilList($utilID)
	{
		$sql = "SELECT *
				FROM tach_util
				WHERE tach_util_util = " . $utilID . "
				";
		
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getTach_util_tachList($tachID)
	{
		$sql = "SELECT *
				FROM tach_util
				WHERE tach_util_tach = " . $tachID . "
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getTach_utilList()
	{
		$sql = "SELECT *
				FROM tach_util
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
		$this->db->insert('tach_util',$data);
	}
	
	function delete($utilID, $tachID)
	{
		$this->db->where('tach_util_tach',$tachID);
		$this->db->where('tach_util_util',$utilID);
		$this->db->delete('tach_util');
	}
	
	function update($utilID, $tachID, $data)
	{
		$this->db->where('tach_util_tach',$tachID);
		$this->db->where('tach_util_util',$utilID);
		$this->db->update('tach_util',$data);
	}
	
}
/* Fin de la classe tach_util */
/* Début des tests sur tach_util */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$tach = new Tach_util;

echo "tach_util util 1";
$test = $tach->getTach_util_utilList(1);
var_dump(($test));

echo "tach_util acti 1";
$test = $tach->getTach_util_tachList(1);
var_dump(($test));

echo "tach_util by ids";
$test = $tach->getTach_utilByIds(1,2);
var_dump($test);

echo "tach_util all";
$test = $tach->getTach_utilList();
var_dump($test);






// Fin des tests sur Contacts*/
