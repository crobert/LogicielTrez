<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
    {
        $this->load->library('form_validation');
        $this->load->model('user_model');

        // Validation du formulaire
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
        $this->form_validation->set_message('required', 'Nom d\'utilisateur et/ou mot de passe invalide');

        if ($this->form_validation->run() === TRUE) {
            // la 1ère validation est ok, on check dans la base de données
            $user = $this->user_model->validate_credentials($this->input->post('username'), $this->input->post('password'));

            if ($user) {
                $this->session->set_userdata(array(
                    'logged' => TRUE,
                    'user_id' => $user->id,
                    'username' => $user->username
                ));

                redirect('accueil/index');
            } else {
                $this->session->set_flashdata('error', 'Nom d\'utilisateur et/ou mot de passe invalide');
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
        $this->session->userdata = array();
        $this->session->sess_destroy();
        $this->session->set_flashdata('warning', 'Vous &ecirc;tes maintenant d&eacute;connect&eacute;');
        redirect('login/index');
    }
}
