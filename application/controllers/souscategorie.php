<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Souscategorie extends MY_Breadcrumb
{
	public function index($id_categorie)
	{
		$this->load->model('souscategorie_model');
		$data['souscategories'] = $this->souscategorie_model->get_souscategorie_by_categorie($id_categorie); 

        $this->set_breadcrumb('souscategorie', 'Sous-cat&eacute;gories de '.$id_categorie, 'souscategorie/index/'.$id_categorie);

        $data['id_categorie'] = $id_categorie;
        $data['_view'] = 'souscategorie/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add($id_categorie)
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_categorie'] = $id_categorie;
			$data['_view'] = 'souscategorie/add_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'id_categorie' => $id_categorie
			);
		$this->load->model('souscategorie_model');
			$this->souscategorie_model->add_souscategorie($data);
            $this->session->set_flashdata('success', 'Sous-cat&eacute;gorie ajout&eacute;e');
            redirect('souscategorie/index/'.$id_categorie, 'refresh');
		}
		
	}
	
	public function modify($id, $id_categorie)
	{
		$this->load->model('souscategorie_model');
		$souscategorie = $this->souscategorie_model->get_souscategorie($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_categorie'] = $id_categorie;
			$data['souscategorie'] = $souscategorie;
			$data['_view'] = 'souscategorie/modify_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'id_categorie' => $id_categorie
			);
			
			$this->souscategorie_model->modify_souscategorie($id, $data);
            $this->session->set_flashdata('success', 'Sous-cat&eacute;gorie modifi&eacute;e');
            redirect('souscategorie/index/'.$id_categorie, 'refresh');
		}
		
	}
	
	public function delete($id, $id_categorie)
	{
		$this->load->model('souscategorie_model');
		$this->souscategorie_model->delete_souscategorie($id);
        $this->session->set_flashdata('success', 'Sous-cat&eacute;gorie supprim&eacute;e');
        redirect('souscategorie/index/'.$id_categorie, 'refresh');
	}
}
