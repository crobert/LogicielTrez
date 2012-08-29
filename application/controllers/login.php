<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		echo "<a href='".base_url()."accueil'>Pour simuler une connexion cliquer ce lien</a>"; 
		//~ $this->load->model('constantes', '', TRUE);
		
		//		return $query->result();
		//$this->load->view('template/footer');
        $data['_view'] = 'login';
        $this->load->view('template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
