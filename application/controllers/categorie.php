<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie extends MY_Auth
{
	public function index()
	{
		$this->load->model('categorie_model');
		$data['categories'] = $this->categorie_model->list_categorie(); 
		
        $data['_view'] = 'categorie/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_budget', 'Budget', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$data['_view'] = 'categorie/nouveau_view';
			$this->load->view('default_template', $data);
		}
		else
		{
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'id_budget' => $this->input->post('id_budget')
			);
		$this->load->model('categorie_model');
			$this->categorie_model->add_categorie($data); 
			redirect('categorie', 'refresh');
		}
		
	}
	
	public function modify($id)
	{
		$this->load->model('categorie_model');
		$categorie = $this->categorie_model->get_categorie($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_budget', 'Budget', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
        $data['categorie'] = $categorie;
        $data['_view'] = 'categorie/modifier_view';
        $this->load->view('default_template', $data);
		}
		else
		{
			$data= array(
					'nom' => $this->input->post('nom'), 
					'description' => $this->input->post('description'), 
					'id_budget' => $this->input->post('id_budget')
			);
			
			$this->categorie_model->modify_categorie($id, $data); 
			redirect('categorie', 'refresh');
		}
		
	}
	
	public function delete($id)
	{
		$this->load->model('categorie_model');
		$this->categorie_model->delete_categorie($id); 
		redirect('categorie', 'refresh');
	}
}
