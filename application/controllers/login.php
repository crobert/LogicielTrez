<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
    {

		echo "<a href='".base_url()."accueil'>Page d'accueil</a>";
        echo '<br/>';
		echo "<a href='".base_url()."login/verifLogin'>Pour simuler une connexion cliquer ce lien</a>";
		//~ $this->load->model('constantes', '', TRUE);
		
		//		return $query->result();
		//$this->load->view('template/footer');
        var_dump($this->session->userdata('logged'));
        var_dump($this->session);

        $data['_view'] = 'login/login_view';
        $this->load->view('default_template', $data);
	}

    public function verifLogin()
    {
        //TODO vérif la connexion, recharger le formulaire si les tests ne passent pas

        $data = array(
            'logged'    => TRUE,
            'login'  => 'johndoe'
        );
        $this->session->set_userdata($data);
        var_dump($this->session->userdata('logged'));
        var_dump($this->session);
      // redirect(base_url(), 'refresh');
        echo "<a href='".base_url()."'>Page d'accueil</a>";
    }

}
