<?php
Class Interventions_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getInterventionById($id)
	{
		$sql = "SELECT * 
				FROM interventions 
				WHERE inte_id = " . $id . "
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
	
	public function getInterventionList()
	{
		$sql = "SELECT *
				FROM interventions
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
		$this->db->insert('interventions',$data);
	}
	
	function delete($id)
	{
		$this->db->where('inte_id',$id);
		$this->db->delete('interventions');
	}
	
	function update($id, $data)
	{
		$this->db->where('inte_id',$id);
		$this->db->update('interventions',$data);
	}
	
}
/* Fin de la classe Interventions */
/* Début des tests sur Interventions */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$inte = new Intervention;

echo "intervention 1";
$test = $inte->getInterventionById(1);
var_dump(utf8_decode($test->inte_intitule));
var_dump(($test));


echo "intervention all";
$test = $inte->getInterventionList();
var_dump($test);







// Fin des tests sur Interventions*/
