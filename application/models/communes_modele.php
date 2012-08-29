<?php
Class Communes_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getCommuneByInsee($insee)
	{
		$sql = "SELECT * 
				FROM contacts 
				WHERE comm_insee = " . $insee . "
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
	
	public function getCommuneList()
	{
		$sql = "SELECT *
				FROM contacts
				";
				
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
		$this->db->insert('communes',$data);
	}
	
	function delete($insee)
	{
		$this->db->where('comm_insee',$insee);
		$this->db->delete('communes');
	}
	
	function update($insee, $data)
	{
		$this->db->where('comm_insee',$insee);
		$this->db->update('communes',$data);
	}
	
}
/* Fin de la classe Contacts */
/* Début des tests sur Contacts */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$comm = new Communes;

echo "commune 1";
$test = $comm->getCommuneByInsee();
var_dump(utf8_decode($test->comm_intitule));
var_dump(($test));


echo "commune all";
$test = $comm->getCommuneList();
var_dump($test);







// Fin des tests sur Contacts*/
