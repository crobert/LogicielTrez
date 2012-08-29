<?php
Class Agen_util_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getAgen_utilByIds($utilID, $agenID)
	{
		$sql = "SELECT * 
				FROM agen_util 
				WHERE agen_util_agen = " . $agenID . "
				AND agen_util_util = " . $utilID . "
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
	
	public function getAgen_util_utilList($utilID)
	{
		$sql = "SELECT *
				FROM agen_util
				WHERE agen_util_util = " . $utilID . "
				";
		
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getAgen_util_agenList($agenID)
	{
		$sql = "SELECT *
				FROM agen_util
				WHERE agen_util_agen = " . $agenID . "
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getAgen_utilList()
	{
		$sql = "SELECT *
				FROM agen_util
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
		$this->db->insert('agen_util',$data);
	}
	
	function delete($utilID, $agenID)
	{
		$this->db->where('agen_util_agen',$agenID);
		$this->db->where('agen_util_util',$utilID);
		$this->db->delete('agen_util');
	}
	
	function update($utilID, $agenID, $data)
	{
		$this->db->where('agen_util_agen',$agenID);
		$this->db->where('agen_util_util',$utilID);
		$this->db->update('agen_util',$data);
	}
	
}
/* Fin de la classe agen_util */
/* Début des tests sur agen_util */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$agen = new Agen_util;

echo "agen_util util 1";
$test = $agen->getAgen_util_utilList(1);
var_dump(($test));

echo "agen_util acti 1";
$test = $agen->getAgen_util_agenList(1);
var_dump(($test));

echo "agen_util by ids";
$test = $agen->getAgen_utilByIds(1,2);
var_dump($test);

echo "agen_util all";
$test = $agen->getAgen_utilList();
var_dump($test);






// Fin des tests sur Contacts*/
