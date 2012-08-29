<?php
Class Contr_mail_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getContr_mailByIds($mailID, $contrID)
	{
		$sql = "SELECT * 
				FROM contr_mail 
				WHERE contr_mail_contr = " . $contrID . "
				AND contr_mail_mail = " . $mailID . "
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
	
	public function getContr_mail_mailList($mailID)
	{
		$sql = "SELECT *
				FROM contr_mail
				WHERE contr_mail_mail = " . $mailID . "
				";
		
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getContr_mail_contrList($contrID)
	{
		$sql = "SELECT *
				FROM contr_mail
				WHERE contr_mail_contr = " . $contrID . "
				";
				
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function getContr_mailList()
	{
		$sql = "SELECT *
				FROM contr_mail
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
		$this->db->insert('contr_mail',$data);
	}
	
	function delete($mailID, $contrID)
	{
		$this->db->where('contr_mail_contr',$contrID);
		$this->db->where('contr_mail_mail',$mailID);
		$this->db->delete('contr_mail');
	}
	
	function update($mailID, $contrID, $data)
	{
		$this->db->where('contr_mail_contr',$contrID);
		$this->db->where('contr_mail_mail',$mailID);
		$this->db->update('contr_mail',$data);
	}
	
}
/* Fin de la classe contr_mail */
/* Début des tests sur contr_mail */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$contr = new Contr_mail;

echo "contr_mail mail 1";
$test = $contr->getContr_mail_mailList(1);
var_dump(($test));

echo "contr_mail acti 1";
$test = $contr->getContr_mail_contrList(1);
var_dump(($test));

echo "contr_mail by ids";
$test = $contr->getContr_mailByIds(1,2);
var_dump($test);

echo "contr_mail all";
$test = $contr->getContr_mailList();
var_dump($test);






// Fin des tests sur Contacts*/
