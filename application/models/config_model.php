<?php
class Config_model extends CI_Model
{
    private $config_name;
    private $prefixe;
	private $list_prefixe = array(
		'config_classe_tva' => 'cct_', 
		'config_methode_paiement' => 'cmp_', 
		'config_type_facture' => 'ctf_',
		'config' => 'cfg_'
	);

    public function _populate($config)
    {
        $this->config_name = $config;
        $this->prefixe = $this->list_prefixe[$config];
        return $this;
    }

    /*
      * CRUD avec un item
      */
    public function get_config($id)
    {
        $sql = 'SELECT * FROM '.$this->config_name.' WHERE '.$this->prefixe.'id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }
    public function list_config()
    {
        $sql = 'SELECT * FROM '.$this->config_name;
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_config($data)
    {
        $this->db->insert($this->config_name, $data);

        return $this->db->insert_id(); // va retourner l'id (MySQL seulement)
    }
    public function edit_config($id, $data)
    {
        $this->db->where($this->prefixe.'id', $id)->update($this->config_name, $data);
    }
    public function delete_config($id)
    {
        $this->db->delete($this->config_name, array($this->prefixe.'id' => $id));
    }
    
}
