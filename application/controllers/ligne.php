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
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('debit', 'debit', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('credit', 'credit', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_souscategorie'] = $id_souscategorie;
			$data['_view'] = 'ligne/add_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'lig_nom' => $this->input->post('nom'),
					'lig_description' => $this->input->post('description'),
					'lig_debit' => $this->input->post('debit'),
					'lig_credit' => $this->input->post('credit'),
					'lig_id_souscategorie' => $id_souscategorie
			);
			$this->load->model('ligne_model');
			$this->ligne_model->add_ligne($data);
            $this->session->set_flashdata('success', 'Ligne ajout&eacute;e');
            redirect('ligne/index/'.$id_souscategorie, 'refresh');
		}
		
	}
	
	public function edit($id, $id_souscategorie)
	{
		$this->load->model('ligne_model');
		$ligne = $this->ligne_model->get_ligne($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('debit', 'debit', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('credit', 'credit', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$data['id_souscategorie'] = $id_souscategorie;
			$data['ligne'] = $ligne;
			$data['_view'] = 'ligne/edit_view';
			$this->load->view('default_template', $data);
		} else {
			$data= array(
					'lig_nom' => $this->input->post('nom'),
					'lig_description' => $this->input->post('description'),
					'lig_debit' => $this->input->post('debit'),
					'lig_credit' => $this->input->post('credit'),
					'lig_id_souscategorie' => $id_souscategorie
			);
			
			$this->ligne_model->edit_ligne($id, $data);
            $this->session->set_flashdata('success', 'Ligne modifi&eacute;e');
            redirect('ligne/index/'.$id_souscategorie, 'refresh');
		}
		
	}
	
	public function delete($id, $id_souscategorie)
	{
		$this->load->model('ligne_model');
		$this->ligne_model->delete_ligne($id);
        $this->session->set_flashdata('success', 'Ligne supprim&eacute;e');
        redirect('ligne/index/'.$id_souscategorie, 'refresh');
	}
}
