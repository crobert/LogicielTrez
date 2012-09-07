<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Auth
{
	
	public function index()
	{
		$this->load->model('config_model');
		$data['tva'] = $this->config_model->list_config('classe_tva' );
		$data['methode_paiement'] = $this->config_model->list_config('methode_paiement');
		$data['type_facture'] = $this->config_model->list_config('type_facture');

		$data['_view'] = 'config/list_view';
        $this->load->view('default_template', $data);
		
	}
	
	
	
	
	
	


}
