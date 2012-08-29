<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Auth extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		//On test si l'utilisateur est admin ou pas. 
		//~ if (! isset ($this->session->userdata('logged'))
		//~ {
			//~ //S'il ne l'est pas on le redirige sur la page de log
			//~ redirect('login', 'refresh');
		//~ }
		
	}
}

/* Fin du contrôleur admin.php */

