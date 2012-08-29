<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends MY_Auth
{
	public function index()
	{
        $data['_view'] = 'accueil/index_view';
        $this->load->view('default_template', $data);
	}
}
