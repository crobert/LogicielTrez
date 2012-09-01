<?php
class User_model extends CI_Model
{
    // retourne un objet utilisateur si le couple login/pass est ok
    public function validate_credentials($login, $password)
    {
        // best practice : utiliser une requête préparée
        $sql = 'SELECT id, login AS username FROM user WHERE login = ? AND password = ?';
        $data = array($login, $this->hash_password($password));
        $query = $this->db->query($sql, $data);

        return $query->row();
    }

    /*
      * CRUD avec un item
      */
    public function get_user($id, $type = 'object')
    {
        $sql = 'SELECT id, login AS username, type FROM user WHERE id = ?';
        $query = $this->db->query($sql, array($id));

        if ($type === 'array') {
            return $query->row_array();
        }
        return $query->row();
    }
    public function list_user()
    {
        $sql = 'SELECT id, login AS username, type FROM user';
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_user($data)
    {
        $data['password'] = $this->hash_password($data['password']);

        $this->db->insert('user', $data); // va retourner l'id (MySQL seulement)

        return $this->db->insert_id();
    }
    public function modify_user($id, $data)
    {
        if (isset($data['password'])) {
            $data['password'] = $this->hash_password($data['password']);
        }

        $this->db->where('id', $id)->update('user', $data);
    }
    public function delete_user($id)
    {
        $this->db->delete('user', array('id' => $id));
    }

    /*
     * Private
     */

    // 1-way transformation sur le mot de passe
    private function hash_password($password)
    {
        $this->load->helper('security');

        return do_hash($this->config->item('encryption_key').$password);
    }

}