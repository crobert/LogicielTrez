<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercice extends MY_Breadcrumb
{
	public function index()
	{
		$this->load->model('exercice_model');
		$data['exercices'] = $this->exercice_model->list_exercice();

        $this->set_breadcrumb('exercice', 'Exercices', 'exercice/index');
		
        $data['_view'] = 'exercice/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add()
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('edition', 'Edition', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('annee_1', 'Année d\'avant', 'trim|numeric|min_length[4]|max_length[4]|xss_clean');
		$this->form_validation->set_rules('annee_2', 'Année d\'encore avant', 'trim|numeric|min_length[4]|max_length[4]|xss_clean');

		if($this->form_validation->run() === FALSE)	{
            $data['_view'] = 'exercice/add_view';
            $this->load->view('default_template', $data);
		} else {
			$data= array(
					'exe_edition' => $this->input->post('edition'),
					'exe_annee_1' => $this->input->post('annee_1'),
					'exe_annee_2' => $this->input->post('annee_2')
			);
			$this->load->model('exercice_model');
			$this->exercice_model->add_exercice($data);
            $this->session->set_flashdata('success', 'Exercice ajout&eacute;');
            redirect('exercice', 'refresh');
		}
		
	}
	
	public function edit($id)
	{
		$this->load->model('exercice_model');
		$exercice = $this->exercice_model->get_exercice($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('edition', 'Edition', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('annee_1', 'Année 1', 'trim|numeric|min_length[4]|max_length[4]|xss_clean');
		$this->form_validation->set_rules('annee_2', 'Année 2', 'trim|numeric|min_length[4]|max_length[4]|xss_clean');

		if($this->form_validation->run() === FALSE)	{
            $data['exercice'] = $exercice;
            $data['_view'] = 'exercice/edit_view';
            $this->load->view('default_template', $data);
		} else {
			$data= array(
					'exe_edition' => $this->input->post('edition'),
					'exe_annee_1' => $this->input->post('annee_1'),
					'exe_annee_2' => $this->input->post('annee_2')
			);
			
			$this->exercice_model->edit_exercice($id, $data);
            $this->session->set_flashdata('success', 'Exercice modifi&eacute;');

            redirect('exercice', 'refresh');
		}
		
	}
	
	public function delete($id)
	{
		$this->load->model('exercice_model');
		$this->exercice_model->delete_exercice($id);
        $this->session->set_flashdata('success', 'Exercice supprim&eacute;');
        redirect('exercice', 'refresh');
	}
}
