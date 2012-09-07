<?php
class Tiers_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_tiers($id)
    {
        $sql = 'SELECT * FROM tiers WHERE id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }
    public function list_tiers()
    {
        $sql = 'SELECT * FROM tiers';
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_tiers($data)
    {
        $this->db->insert('tiers', $data);

        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_tiers($id, $data)
    {
        $this->db->where('id', $id)->update('tiers', $data);
    }
    public function delete_tiers($id)
    {
        $this->db->delete('tiers', array('id' => $id));
    }
}