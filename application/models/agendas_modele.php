<?php
Class Agendas_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getAgendaById($id)
	{
		$sql = "SELECT * 
				FROM agendas 
				WHERE agen_id = " . $id . "
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
	
	public function getAgendaList()
	{
		$sql = "SELECT *
				FROM agendas
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
		$this->db->insert('agendas',$data);
	}
	
	function delete($id)
	{
		$this->db->where('agen_id',$id);
		$this->db->delete('agendas');
	}
	
	function update($id, $data)
	{
		$this->db->where('agen_id',$id);
		$this->db->update('agendas',$data);
	}
	
}
/* Fin de la classe Agendas */
/* Début des tests sur Agendas */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$agen = new Agendas;

echo "agenda 1";
$test = $agen->getAgendaById(1);
var_dump(utf8_decode($test->agen_intitule));
var_dump(($test));


echo "agenda all";
$test = $agen->getAgendaList();
var_dump($test);







// Fin des tests sur Agendas*/
