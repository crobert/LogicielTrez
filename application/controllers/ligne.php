<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ligne extends MY_Breadcrumb
{
	public function index($id_souscategorie)
	{
		$this->load->model('ligne_model');
		$data['lignes'] = $this->ligne_model->get_ligne_by_souscategorie($id_souscategorie); 

        $this->set_breadcrumb('ligne', 'Lignes de '.$id_souscategorie, 'ligne/index/'.$id_souscategorie);

        $data['id_souscategorie'] = $id_souscategorie;
        $data['_view'] = 'ligne/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add($id_souscategorie)
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('debit', 'debit', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('credit', 'credit', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_souscategorie'] = $id_souscategorie;
			$data['_view'] = 'ligne/add_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'debit' => $this->input->post('debit'),
					'credit' => $this->input->post('credit'),
					'id_souscategorie' => $id_souscategorie
			);
			$this->load->model('ligne_model');
			$this->ligne_model->add_ligne($data); 
			redirect('ligne/index/'.$id_souscategorie, 'refresh');
		}
		
	}
	
	public function modify($id, $id_souscategorie)
	{
		$this->load->model('ligne_model');
		$ligne = $this->ligne_model->get_ligne($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('debit', 'debit', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('credit', 'credit', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_souscategorie'] = $id_souscategorie;
			$data['ligne'] = $ligne;
			$data['_view'] = 'ligne/modify_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'debit' => $this->input->post('debit'),
					'credit' => $this->input->post('credit'),
					'id_souscategorie' => $id_souscategorie
			);
			
			$this->ligne_model->modify_ligne($id, $data); 
			redirect('ligne/index/'.$id_souscategorie, 'refresh');
		}
		
	}
	
	public function delete($id, $id_souscategorie)
	{
		$this->load->model('ligne_model');
		$this->ligne_model->delete_ligne($id); 
		redirect('ligne/index/'.$id_souscategorie, 'refresh');
	}
}
