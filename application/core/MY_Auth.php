<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// on test si l'utilisateur est loggué ou pas.
		if (! $this->session->userdata('logged'))
		{
			// s'il ne l'est pas on le redirige sur la page de login
			redirect('login', 'refresh');
		}

        // on reset les éventuelles breadcrumbs
        $this->session->unset_userdata('breadcrumbs');
	}
}


