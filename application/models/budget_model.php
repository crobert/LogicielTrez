<?php
class budget_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_budget($id)
    {
        $sql = 'SELECT * FROM budget WHERE id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_budget_by_exercice($id)
    {
        $sql = 'SELECT * FROM budget WHERE id_exercice = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_budget()
    {
        $sql = 'SELECT * FROM budget';
        return $this->db->query($sql)->result();
    }
    public function add_budget($data)
    {
        $this->db->insert('budget', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function modify_budget($id, $data)
    {
        $this->db->where('id', $id)->update('budget', $data);
        return $id;
    }
    public function delete_budget($id)
    {
        $this->db->delete('budget', array('id' => $id));
        return $id;
    }

}
