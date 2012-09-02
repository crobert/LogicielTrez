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
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        $this->form_validation->set_rules(array(
            array(
                'field' => 'username',
                'label' =>  'nom d\'utilisateur',
                'rules' => 'required|min_length[5]'
            ),
            array(
                'field' => 'password',
                'label' =>  'mot de passe',
                'rules' => 'required|min_length[8]'
            ),
            array(
                'field' => 'password_confirmation',
                'label' => 'confirmation du mot de passe',
                'rules' => 'required|matches[password]'
            ),
            array(
                'field' => 'type',
                'label' => 'type',
                'rules' => 'required'
            )
        ));

        if ($this->form_validation->run() === TRUE) {
            $query_data = array(
                'login' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'type' => $this->input->post('type'),
            );
            $this->user_model->add_user($query_data);

            $this->session->set_flashdata('success', 'Utilisateur ajout&eacute;');
            redirect('user/index');
        } else {
            $data['_view'] = 'user/add_view';
            $this->load->view('default_template', $data);
        }
    }

    public function modify($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        $this->form_validation->set_rules(array(
            array(
                'field' => 'username',
                'label' =>  'nom d\'utilisateur',
                'rules' => 'required|min_length[5]'
            ),
            array(
                'field' => 'password',
                'label' =>  'mot de passe',
                'rules' => 'min_length[8]'
            ),
            array(
                'field' => 'password_confirmation',
                'label' => 'confirmation du mot de passe',
                'rules' => 'matches[password]'
            ),
            array(
                'field' => 'type',
                'rules' => 'required'
            )
        ));

        if ($this->form_validation->run() === TRUE) {
            $query_data = array(
                'login' => $this->input->post('username'),
                'type' => $this->input->post('type')
            );
            $this->input->post('password') && $query_data['password'] = $this->input->post('password');
            $this->user_model->modify_user($id, $query_data);

            $this->session->set_flashdata('success', 'Utilisateur modifi&eacute;');
            redirect('user/index');
        } else {
            $data = $this->user_model->get_user($id, 'array');
            $data['_view'] = 'user/modify_view';
            $this->load->view('default_template', $data);
        }
    }

    public function delete($id)
    {
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Vous ne pouvez pas supprimer l\'utilisateur avec lequel vous &ecirc;tes connect&eacute;');
            redirect('user');
        } else {
            $this->user_model->delete_user($id);
            $this->session->set_flashdata('success', 'Utilisateur supprim&eacute;');
            redirect('user');
        }
    }
}
