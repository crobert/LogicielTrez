<?php
class facture_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_facture($id)
    {
        $sql = 'SELECT * FROM facture WHERE id = ?';
		return $this->db->query($sql, array($id))->row();
    }
    public function get_facture_by_ligne($id)
    {
        $sql = 'SELECT * FROM facture WHERE id_ligne = ?';
		return $this->db->query($sql, array($id))->result();
    }
    public function list_facture()
    {
        $sql = 'SELECT * FROM facture';
        return $this->db->query($sql)->result();
    }
    public function add_facture($data)
    {
        $this->db->insert('facture', $data); 
        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function modify_facture($id, $data)
    {
        $this->db->where('id', $id)->update('facture', $data);
        return $id;
    }
    public function delete_facture($id)
    {
        $this->db->delete('facture', array('id' => $id));
        return $id;
    }

}