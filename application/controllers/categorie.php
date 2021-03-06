<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie extends MY_Breadcrumb
{
	public function index($id_budget)
	{
		$this->load->model('categorie_model');
		$data['categories'] = $this->categorie_model->get_categorie_by_budget($id_budget); 

        $this->set_breadcrumb('categorie', 'Cat&eacute;gories de '.$id_budget, 'categorie/index/'.$id_budget);

        $data['id_budget'] = $id_budget;
        $data['_view'] = 'categorie/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add($id_budget)
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

		if($this->form_validation->run() === FALSE) {
			$data['id_budget'] = $id_budget;
			$data['_view'] = 'categorie/add_view';
			$this->load->view('default_template', $data);
		} else	{
			$data= array(
					'cat_nom' => $this->input->post('nom'),
					'cat_description' => $this->input->post('description'),
					'cat_id_budget' => $id_budget
			);
		$this->load->model('categorie_model');
			$this->categorie_model->add_categorie($data);
            $this->session->set_flashdata('success', 'Cat&eacute;gorie ajout&eacute;e');
            redirect('categorie/index/'.$id_budget, 'refresh');
		}
		
	}
	
	public function edit($id, $id_budget)
	{
		$this->load->model('categorie_model');
		$categorie = $this->categorie_model->get_categorie($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

		if($this->form_validation->run() === FALSE)	{
			$data['id_budget'] = $id_budget;
			$data['categorie'] = $categorie;
			$data['_view'] = 'categorie/edit_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'cat_nom' => $this->input->post('nom'),
					'cat_description' => $this->input->post('description'),
					'cat_id_budget' => $id_budget
			);
			
			$this->categorie_model->edit_categorie($id, $data);
            $this->session->set_flashdata('success', 'Cat&eacute;gorie modifi&eacute;e');
            redirect('categorie/index/'.$id_budget, 'refresh');
		}
		
	}
	
	public function delete($id, $id_budget)
	{
		$this->load->model('categorie_model');
		$this->categorie_model->delete_categorie($id);
        $this->session->set_flashdata('success', 'Cat&eacute;gorie supprim&eacute;e');
        redirect('categorie/index/'.$id_budget, 'refresh');
	}
}
