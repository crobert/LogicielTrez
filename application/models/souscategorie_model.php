<?php
class Souscategorie_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_souscategorie($id)
    {
        $sql = 'SELECT * FROM souscategorie WHERE sct_id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_souscategorie_by_categorie($id)
    {
        $sql = 'SELECT * FROM souscategorie WHERE sct_id_categorie = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_souscategorie()
    {
        $sql = 'SELECT * FROM souscategorie';
        return $this->db->query($sql)->result();
    }
    public function add_souscategorie($data)
    {
        $this->db->insert('souscategorie', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_souscategorie($id, $data)
    {
        $this->db->where('sct_id', $id)->update('souscategorie', $data);
        return $id;
    }
    public function delete_souscategorie($id)
    {
        $this->db->delete('souscategorie', array('sct_id' => $id));
        return $id;
    }

}
