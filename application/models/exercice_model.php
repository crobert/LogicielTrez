<?php
class Exercice_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_exercice($id)
    {
        $sql = 'SELECT edition FROM exercice WHERE id = ?';
		return $this->db->query($sql, array($id))>row();
    }
    public function list_exercice()
    {
        $sql = 'SELECT edition FROM exercice';
        return $this->db->query($sql)->result();
    }
    public function add_exercice($data)
    {
        return $this->db->insert_id('exercice', $data); // va retourner l'id (MySQL seulement)
    }
    public function modify_exercice($id, $data)
    {
        $this->db->where('id', $id)->update('exercice', $data);
        return $id;
    }
    public function delete_exercice($id)
    {
        $this->db->delete('exercice', array('id' => $id));
        return $id;
    }

}
