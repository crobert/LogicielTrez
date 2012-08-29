<?php
Class Memos_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function getMemoById($id)
	{
		$sql = "SELECT * 
				FROM memos 
				WHERE memo_id = " . $id . "
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
	
	public function getMemoList()
	{
		$sql = "SELECT *
				FROM memos
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
		$this->db->insert('memos',$data);
	}
	
	function delete($id)
	{
		$this->db->where('memo_id',$id);
		$this->db->delete('memos');
	}
	
	function update($id, $data)
	{
		$this->db->where('memo_id',$id);
		$this->db->update('memos',$data);
	}
	
}
/* Fin de la classe Tiers */
/* Début des tests sur Tiers */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$memo = new Tiers;

echo "memo 1";
$test = $memo->getUserById(1);
var_dump(utf8_decode($test->memo_intitule));
var_dump(($test));


echo "memo all";
$test = $memo->getTiersList(1);
var_dump($test);







// Fin des tests sur Tiers*/
