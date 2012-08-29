<?php
Class Contrats_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getContratById($id)
	{
		$sql = "SELECT * 
				FROM contrats 
				WHERE contr_id = " . $id . "
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
	
	public function getContratList()
	{
		$sql = "SELECT *
				FROM contrats
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
		$this->db->insert('contrats',$data);
	}
	
	function delete($id)
	{
		$this->db->where('contr_id',$id);
		$this->db->delete('contrats');
	}
	
	function update($id, $data)
	{
		$this->db->where('contr_id',$id);
		$this->db->update('contrats',$data);
	}
	
}
/* Fin de la classe Contrats */
/* Début des tests sur Contrats */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$contr = new Contrat;

echo "contrat 1";
$test = $contr->getContratById(1);
var_dump(utf8_decode($test->contr_intitule));
var_dump(($test));


echo "contrat all";
$test = $contr->getContratList();
var_dump($test);







// Fin des tests sur Contrats*/
