<?php
class Exercice_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_exercice($id)
    {
        $sql = 'SELECT * FROM exercice WHERE exe_id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function list_exercice()
    {
        $sql = 'SELECT * FROM exercice ORDER BY exe_edition DESC';
        return $this->db->query($sql)->result();
    }
    public function add_exercice($data)
    {
        $this->db->insert('exercice', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_exercice($id, $data)
    {
        $this->db->where('exe_id', $id)->update('exercice', $data);
        return $id;
    }
    public function delete_exercice($id)
    {
        $this->db->delete('exercice', array('exe_id' => $id));
        return $id;
    }

}
