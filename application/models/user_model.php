<?php
class User_model extends CI_Model
{
    // retourne un objet utilisateur si le couple login/pass est ok
    public function validate_credentials($username, $password)
    {
        // best practice : utiliser une requête préparée
        $sql = 'SELECT usr_id, usr_username FROM user WHERE usr_username = ? AND usr_password = ?';
        $data = array($username, $this->hash_password($password));
        $query = $this->db->query($sql, $data);

        return $query->row();
    }

    /*
      * CRUD avec un item
      */
    public function get_user($id)
    {
        $sql = 'SELECT usr_id, usr_username, usr_type FROM user WHERE usr_id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }
    public function list_user()
    {
        $sql = 'SELECT usr_id, usr_username, usr_type FROM user';
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function add_user($data)
    {
        $data['usr_password'] = $this->hash_password($data['usr_password']);

        $this->db->insert('user', $data); // va retourner l'id (MySQL seulement)

        return $this->db->insert_id();
    }
    public function edit_user($id, $data)
    {
        if (isset($data['usr_password'])) {
            $data['usr_password'] = $this->hash_password($data['usr_password']);
        }

        $this->db->where('usr_id', $id)->update('user', $data);
    }
    public function delete_user($id)
    {
        $this->db->delete('user', array('usr_id' => $id));
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