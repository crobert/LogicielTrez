<?php
class Categorie_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_categorie($id)
    {
        $sql = 'SELECT * FROM categorie WHERE id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_categorie_by_budget($id)
    {
        $sql = 'SELECT * FROM categorie WHERE id_budget = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_categorie()
    {
        $sql = 'SELECT * FROM categorie';
        return $this->db->query($sql)->result();
    }
    public function add_categorie($data)
    {
        $this->db->insert('categorie', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_categorie($id, $data)
    {
        $this->db->where('id', $id)->update('categorie', $data);
        return $id;
    }
    public function delete_categorie($id)
    {
        $this->db->delete('categorie', array('id' => $id));
        return $id;
    }

}
