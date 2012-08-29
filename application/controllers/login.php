<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
    {
        //$this->session->set_flashdata('page', 'login');

        $this->load->library('form_validation');
        $this->load->model('user_model');

        // Validation du formulaire
        // TODO : déplacer vers un fichier séparé
        $this->form_validation->set_rules(array(
            array(
                'field' => 'username',
                'label' =>  'nom d\'utilisateur',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' =>  'mot de passe',
                'rules' => 'required'
            )
        ));
        $this->form_validation->set_message('required', 'Nom d\'utilisateur et/ou mot de passe incorrect');

        if ($this->form_validation->run() === TRUE) {
            // la 1ère validation est ok, on check dans la base de données
            $user = $this->user_model->validate_credentials($this->input->post('username'), $this->input->post('password'));

            if ($user) {
                $this->session->set_userdata(array(
                    'logged' => TRUE,
                    'username'  => $user->username
                ));

                $data['_view'] = 'accueil/index_view';
                $this->load->view('default_template', $data);
            } else {
                //$this->session->set_flashdata('error', 'credentials_error');
                $data['_view'] = 'login/login_view';
                $this->load->view('default_template', $data);
            }
        } else {
            $data['_view'] = 'login/login_view';
            $this->load->view('default_template', $data);
        }
	}

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index');
    }
}
