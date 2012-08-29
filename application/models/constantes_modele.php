<?php
Class Constantes_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getConstanteById($id)
	{
		$sql = "SELECT * 
				FROM constantes 
				WHERE cons_id = " . $id . "
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
	
	public function getConstanteList()
	{
		$sql = "SELECT *
				FROM constantes
				";
				
		$result = array();
		$query=$this->db->query($sql);
		foreach( $query->result() as $cons)
		{ 
			$result[$cons->cons_id] = $cons;
		}
		return $result;
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
		$this->db->insert('constantes',$data);
	}
	
	function delete($id)
	{
		$this->db->where('cons_id',$id);
		$this->db->delete('constantes');
	}
	
	function update($id, $data)
	{
		$this->db->where('cons_id',$id);
		$this->db->update('constantes',$data);
	}
	
}
/* Fin de la classe Constantes */
/* Début des tests sur Constantes */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$cons = new Constantes;

echo "constante 1";
$test = $cons->getConstanteById(1);
var_dump(utf8_decode($test->cons_titre));
var_dump(($test));


echo "constante all";
$test = $cons->getConstanteList();
var_dump($test);







// Fin des tests sur Constantes*/
