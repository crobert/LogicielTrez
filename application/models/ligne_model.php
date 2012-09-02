<?php
class ligne_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_ligne($id)
    {
        $sql = 'SELECT * FROM ligne WHERE id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_ligne_by_souscategorie($id)
    {
        $sql = 'SELECT * FROM ligne WHERE id_souscategorie = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_ligne()
    {
        $sql = 'SELECT * FROM ligne';
        return $this->db->query($sql)->result();
    }
    public function add_ligne($data)
    {
        $this->db->insert('ligne', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function modify_ligne($id, $data)
    {
        $this->db->where('id', $id)->update('ligne', $data);
        return $id;
    }
    public function delete_ligne($id)
    {
        $this->db->delete('ligne', array('id' => $id));
        return $id;
    }

}
