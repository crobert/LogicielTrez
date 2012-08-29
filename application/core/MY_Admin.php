<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		//On test si l'utilisateur est admin ou pas. 
		
		//S'il ne l'est pas on le redirige sur la page de log
	}

	public function index()
	{

	}
	
}

/* Fin du contrôleur admin.php */

