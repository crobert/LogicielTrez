<?php
Class Tier_conta_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getTiers_contaByIds($tierID, $contaID)
	{
		$sql = "SELECT * 
				FROM tier_conta 
				WHERE tier_conta_tier = " . $tierID . "
				AND tier_conta_conta = " . $contaID . "
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
	
	public function getTier_conta_tierList($tierID)
	{
		$sql = "SELECT *
				FROM tier_conta
				WHERE tier_conta_tier = " . $tierID . "
				";
		
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getTier_conta_contaList($contaID)
	{
		$sql = "SELECT *
				FROM tier_conta
				WHERE tier_conta_conta = " . $contaID . "
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getTier_contaList()
	{
		$sql = "SELECT *
				FROM tier_conta
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
		$this->db->insert('tier_conta',$data);
	}
	
	function delete($contaID, $tierID)
	{
		$this->db->where('tier_conta_tier',$tierID);
		$this->db->where('tier_conta_conta',$contaID);
		$this->db->delete('tier_conta');
	}
	
	function update($contaID, $tierID, $data)
	{
		$this->db->where('tier_conta_tier',$tierID);
		$this->db->where('tier_conta_conta',$contaID);
		$this->db->update('tier_conta',$data);
	}
	
}
/* Fin de la classe tier_conta */
/* Début des tests sur tier_conta */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new Tier_conta;

echo "tier_conta tier 1";
$test = $user->getTiers_conta_tierList(1);
var_dump(($test));

echo "tier_conta conta 1";
$test = $user->getTiers_conta_contaList(1);
var_dump(($test));

echo "tier_conta by ids";
$test = $user->getTier_contaByIds(1,2);
var_dump($test);

echo "tier_conta all";
$test = $user->getTier_contaList();
var_dump($test);






// Fin des tests sur Contacts*/
