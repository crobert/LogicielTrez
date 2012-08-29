<?php
Class Sites_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getSiteById($id)
	{
		$sql = "SELECT * 
				FROM sites 
				WHERE site_id = " . $id . "
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
	
	public function getSiteList()
	{
		$sql = "SELECT *
				FROM sites
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
		$this->db->insert('sites',$data);
	}
	
	function delete($id)
	{
		$this->db->where('site_id',$id);
		$this->db->delete('sites');
	}
	
	function update($id, $data)
	{
		$this->db->where('site_id',$id);
		$this->db->update('sites',$data);
	}
	
}
/* Fin de la classe Site */
/* Début des tests sur Sites */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$site = new Site;

echo "user 1";
$test = $site->getSiteById(1);
var_dump(utf8_decode($test->site_intitule));
var_dump(($test));


echo "user all";
$test = $site->getSiteList(1);
var_dump($test);







// Fin des tests sur Sites*/
