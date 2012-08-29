<?php
Class List_inte_mode_modele extends CI_Model
{
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
		function getListInteModeById($id)
	{
		$sql = "SELECT * 
				FROM list_inte_mode 
				WHERE list_inte_mode_id = " . $id . "
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
	
	public function getListInteMode()
	{
		$sql = "SELECT *
				FROM list_inte_mode
				ORDER BY list_inte_mode_ordre ASC
				";
				
		$result = array();
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function add($data)
	{
		$this->db->insert('list_inte_mode',$data);
	}
	
	function delete($id)
	{
		$this->db->where('list_inte_mode_id',$id);
		$this->db->delete('list_inte_mode');
	}
	
	function update($id, $data)
	{
		$this->db->where('list_inte_mode_id',$id);
		$this->db->update('list_inte_mode',$data);
	}
	
}
/* Fin de la classe List_inte_mode */
/* Début des tests sur List_inte_mode */
/* <--Ajouter un / en début de ligne pour entrer en phase de test

$user = new List_inte_mode;

echo "list_inte_mode 1";
$test = $user->getList_inte_modeById(1);
var_dump(($test));


echo "list_inte_mode all";
$test = $user->getList_inte_mode();
var_dump($test);







// Fin des tests sur List_inte_mode*/
