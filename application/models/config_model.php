<?php
class Config_model extends CI_Model
{
    private $config_name;

    public function __construct($config)
    {
        $this->config_name = $config;
    }

    /*
      * CRUD avec un item
      */
    public function get_config($id)
    {
        $sql = 'SELECT * FROM config_'.$this->config_name.' WHERE cfg_id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }
    public function list_config()
    {
        $sql = 'SELECT * FROM config_'.$this->config_name;
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_config($data)
    {
        $this->db->insert('config_'.$this->config_name, $data);

        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_config($id, $data)
    {
        $this->db->where('cfg_id', $id)->update('config_'.$this->config_name, $data);
    }
    public function delete_config($id)
    {
        $this->db->delete('config_'.$this->config_name, array('cfg_id' => $id));
    }
}
