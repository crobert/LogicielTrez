<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Auth
{
	private $list_conf = array(
		'tva' => 'config_classe_tva', 
		'paiement' => 'config_methode_paiement', 
		'facture' => 'config_type_facture',
		'config' => 'config'
	);
	
	public function index()
	{
		$this->load->model('config_model', 'conf');
		$this->load->model('config_model', 'tva');
		$this->load->model('config_model', 'paiement');
		$this->load->model('config_model', 'facture');
		$data['conf'] = $this->conf->_populate('config')->list_config();
		$data['tva'] = $this->tva->_populate('config_classe_tva')->list_config();
		$data['methode_paiement'] = $this->paiement->_populate('config_methode_paiement')->list_config();
		$data['type_facture'] = $this->facture->_populate('config_type_facture')->list_config();

		$data['_view'] = 'config/list_view';
        $this->load->view('default_template', $data);
		
	}

public function edit_tva($id)
	{
		$this->load->model('config_model');
		$data['tva'] = $this->config_model->_populate('config_classe_tva')->get_config($id);
		
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('taux', 'Taux', 'trim|required');
		$this->form_validation->set_rules('actif', 'Actif', 'trim');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/edit_tva_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cct_nom' => $this->input->post('nom'),
                'cct_taux' => $this->input->post('taux'),
                'cct_actif' => $this->input->post('actif')
            );

            $this->config_model->edit_config($id, $data);
            $this->session->set_flashdata('success', 'Config modifi&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function edit_paiement($id)
	{
		$this->load->model('config_model');
		$data['paiement'] = $this->config_model->_populate('config_methode_paiement')->get_config($id);

		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/edit_paiement_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cmp_nom' => $this->input->post('nom')
            );

            $this->config_model->edit_config($id, $data);
            $this->session->set_flashdata('success', 'Config modifi&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function edit_facture($id)
	{
		$this->load->model('config_model');
		$data['facture'] = $this->config_model->_populate('config_type_facture')->get_config($id);

		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('abr', 'Abréviation', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/edit_facture_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'ctf_nom' => $this->input->post('nom'),
                'ctf_abr' => $this->input->post('abr'),
            );

            $this->config_model->edit_config($id, $data);
            $this->session->set_flashdata('success', 'Config modifi&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function edit_conf($id)
	{
		$this->load->model('config_model');
		$data['conf'] = $this->config_model->_populate('config')->get_config($id);

		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('valeur', 'Valeur', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/edit_conf_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cfg_key' => $this->input->post('nom'),
                'cfg_value' => $this->input->post('valeur'),
            );

            $this->config_model->edit_config($id, $data);
            $this->session->set_flashdata('success', 'Config modifi&eacute;');
            redirect('config/index/', 'refresh');
		}
	}

	public function add_tva()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('taux', 'Taux', 'trim|required');
		$this->form_validation->set_rules('actif', 'Actif', 'trim');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/add_tva_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cct_nom' => $this->input->post('nom'),
                'cct_taux' => $this->input->post('taux'),
                'cct_actif' => $this->input->post('actif')
            );
            
			$this->load->model('config_model');
            $this->config_model->_populate('config_classe_tva')->add_config($data);
            $this->session->set_flashdata('success', 'Classe de tva ajout&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function add_paiement()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/add_paiement_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cmp_nom' => $this->input->post('nom')
            );
            
			$this->load->model('config_model');
            $this->config_model->_populate('config_methode_paiement')->add_config($data);
            $this->session->set_flashdata('success', 'M&eacute;thode de paiement ajout&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function add_facture()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('abr', 'Abréviation', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/add_facture_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'ctf_nom' => $this->input->post('nom'),
                'ctf_abr' => $this->input->post('abr'),
            );

			$this->load->model('config_model');
            $this->config_model->_populate('config_type_facture')->add_config($data);
            $this->session->set_flashdata('success', 'Type de facture ajout&eacute;');
            redirect('config/index/', 'refresh');
		}
	}
	
	public function add_conf()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required');
		$this->form_validation->set_rules('valeur', 'Valeur', 'trim|required');
		
		if($this->form_validation->run() === FALSE) {
			$data['_view'] = 'config/add_conf_view';
			$this->load->view('default_template', $data);
        } else {
            $data = array(
                'cfg_key' => $this->input->post('nom'),
                'cfg_value' => $this->input->post('valeur'),
            );

			$this->load->model('config_model');
            $this->config_model->_populate('config')->add_config($data);
            $this->session->set_flashdata('success', 'Config ajout&eacute;e');
            redirect('config/index/', 'refresh');
		}
	}


	public function delete($config, $id)
	{
		$this->load->model('config_model');
		$this->config_model->_populate($this->list_conf[$config])->delete_config($id);
		$this->session->set_flashdata('success', 'Config supprim&eacute;');
		redirect('config/index/', 'refresh');
	}
	
		
}
