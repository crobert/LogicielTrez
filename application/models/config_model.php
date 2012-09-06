<?php
class Config_model extends CI_Model
{
    /*
      * CRUD avec un item
      */
    public function get_config($config, $id)
    {
        $sql = 'SELECT * FROM config_'.$config.' WHERE id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }
    public function list_config($config)
    {
        $sql = 'SELECT * FROM config_'.$config;
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_config($config, $data)
    {
        $this->db->insert('config_'.$config, $data);

        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function modify_config($config, $id, $data)
    {
        $this->db->where('id', $id)->update('config_'.$config,, $data);
    }
    public function delete_config($config, $id)
    {
        $this->db->delete('config_'.$config,, array('id' => $id));
    }
}
