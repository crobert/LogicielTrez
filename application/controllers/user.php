<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Auth
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->list_user();
        $data['_view'] = 'user/list_view';
        $this->load->view('default_template', $data);
    }

    public function add()
    {
        $this->load->helper('email'); // pour valider l'adesse mail

        // validation des données
        $this->form_validation->set_rules('username', 'nom d\'utilisateur', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'adresse e-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'mot de passe', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirmation', 'confirmation du mot de passe', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'niveau de privil&egrave;ges', 'required|is_numeric');

        $receive_alert = ($this->input->post('receive_alert')=='true')?1:0;

        if ($this->form_validation->run() == TRUE)
        {
            // ajoute l'utilisateur à la bdd
            $query_data = array(
                'usr_login' => $this->input->post('username'),
                'usr_email' => $this->input->post('email'),
                'usr_password' => $this->user_model->hash_password($this->input->post('password')),
                'usr_level' => $this->input->post('level'),
                'usr_receive_alert' => $receive_alert
            );
            $this->user_model->add_user($query_data);

            $this->session->set_flashdata('success', 'Utilisateur ajout&eacute;');
            redirect('user');
        }
        else
        {
            $data['levels'] = $this->_user_level;

            $data['page'] = 'user/user_add_view';
            $this->load->view('container', $data);
        }
    }

    public function modify($id = -1)
    {
        $this->load->helper('email'); // pour valider l'adesse mail

        if ($id == -1)
        {
            $id = $this->input->post('id');
        }

        // validation des données
        $this->form_validation->set_rules('id', 'id', 'is_numeric'); // pour éviter de la merde qui ne devrait pas arriver
        $this->form_validation->set_rules('username', 'nom d\'utilisateur', 'min_length[5]');
        $this->form_validation->set_rules('email', 'adresse e-mail', 'valid_email');
        $this->form_validation->set_rules('password', 'mot de passe', 'min_length[8]');
        $this->form_validation->set_rules('password_confirmation', 'confirmation du mot de passe', 'matches[password]');
        $this->form_validation->set_rules('level', 'niveau de privil&egrave;ges', 'is_numeric');

        $receive_alert = ($this->input->post('receive_alert')=='true')?1:0;

        if ($this->form_validation->run() == TRUE)
        {
            // ajoute l'utilisateur à la bdd
            $query_data = array(
                'usr_login' => $this->input->post('username'),
                'usr_email' => $this->input->post('email'),
                'usr_level' => $this->input->post('level'),
                'usr_receive_alert' => $receive_alert
            );
            $password = $this->input->post('password'); // isset() d'une valeur retournée PLANTE, utiliser une variable temporaire
            if ($password != '') // on ne modifie le mot de passe que s'il a été refourni
            {
                $query_data['usr_password'] = $this->user_model->hash_password($password);
            }
            $this->user_model->modify_user($id, $query_data);

            redirect('user');
        }
        else
        {
            $temp = $this->user_model->get_user($id); // récupère les infos de l'user
            $data = array('id' => $temp['usr_id'], 'username' => $temp['usr_login'], 'email' => $temp['usr_email'], 'level' => $temp['usr_level']);
            $data['levels'] = $this->_user_level;

            $data['page'] = 'user/user_modify_view';
            $this->load->view('container', $data);
        }
    }

    public function delete($id)
    {
        if ($id == $this->session->userdata('user_id'))
        {
            $this->session->set_flashdata('alert', 'Vous ne pouvez pas supprimer l\'utilisateur avec lequel vous &ecirc;tes connect&eacute;');
            redirect('user');
        } else if ($this->user_model->last_user()) {
            $this->session->set_flashdata('alert', 'Vous ne pouvez pas supprimer l\'unique utilisateur');
            redirect('user');
        } else {
            $this->user_model->delete_user($id);
            redirect('user');
        }
    }
}
