<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercice extends MY_Auth
{
	public function index()
	{
		$this->load->model('exercice_model');
		$data['exercice'] = $this->exercice_model->list_exercice(); 
		
        $data['_view'] = 'exercice/list_view';
        $this->load->view('default_template', $data);
	}
}
