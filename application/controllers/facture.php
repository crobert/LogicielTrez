<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class facture extends MY_Breadcrumb
{
	public function __construct()
    {
        parent::__construct();

        $this->load->model('facture_model');
    }
	
	public function index($id_ligne)
	{
		$data['factures'] = $this->facture_model->get_facture_by_ligne($id_ligne); 

        $this->set_breadcrumb('facture', 'Factures de '.$id_ligne, 'facture/index/'.$id_ligne);

        $data['id_ligne'] = $id_ligne;
        $data['_view'] = 'facture/list_view';
        $this->load->view('default_template', $data);
	}
	
	public function add($id_ligne)
	{
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('numero', 'Num&eacute;ro', 'trim|required|xss_clean');
		$this->form_validation->set_rules('objet', 'Objet', 'trim|required|xss_clean');
		$this->form_validation->set_rules('montant', 'Montant', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('methode_paiement', 'M&eacute;thode de paiement', 'trim|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date_paiement', 'Date de paiement', 'trim|xss_clean');
		$this->form_validation->set_rules('commentaire', 'Commentaire', 'trim|xss_clean');
		$this->form_validation->set_rules('id_tiers', 'Tiers', 'trim|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$this->load->model('tiers_model');

			$data['id_ligne'] = $id_ligne;
			$data['tiers'] = $this->tiers_model->list_tiers();
			$data['_view'] = 'facture/add_view';

			$this->load->view('default_template', $data);
		} else {
			$date = new DateTime ($this->input->post('date'));

			if ($this->input->post('date_paiement' != '')) {
				$datePaiement = new DateTime($this->input->post('date_paiement'));
				$date_paiement = $datePaiement->format('Y-m-d');
			} else {
				$datePaiement = NULL;
			}
			$data = array(
					'type' => $this->input->post('type'), 
					'numero' => $this->input->post('numero'), 
					'objet' => $this->input->post('objet'),
					'montant' => $this->input->post('montant'),
					'methode_paiement' => $this->input->post('methode_paiement'),
					'date' => $date->format('Y-m-d'),
					'date_paiement' => $date_paiement,
					'commentaire' => $this->input->post('commentaire'),
					'id_ligne' => $id_ligne,
					'id_tiers' => $this->input->post('id_tiers')
			);

			$this->facture_model->add_facture($data); 
			$this->session->set_flashdata('success', 'Facture ajout&eacute;e');

			redirect('facture/index/'.$id_ligne, 'refresh');
		}
		
	}
	
	public function modify($id, $id_ligne)
	{
		$facture = $this->facture_model->get_facture($id); 
		//Règles pour tous les champs
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('numero', 'Num&eacute;ro', 'trim|required|xss_clean');
		$this->form_validation->set_rules('objet', 'Objet', 'trim|required|xss_clean');
		$this->form_validation->set_rules('montant', 'Montant', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('methode_paiement', 'M&eacute;thode de paiement', 'trim|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date_paiement', 'Date de paiement', 'trim|xss_clean');
		$this->form_validation->set_rules('commentaire', 'Commentaire', 'trim|xss_clean');
		$this->form_validation->set_rules('id_tiers', 'Tiers', 'trim|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$this->load->model('tiers_model');
			$data['id_ligne'] = $id_ligne;
			$data['tiers'] = $this->tiers_model->list_tiers();
			$data['facture'] = $facture;
			$data['_view'] = 'facture/modify_view';
			$this->load->view('default_template', $data);
		} else {
			$date = new dateTime ($this->input->post('date'));
			if ($this->input->post('date_paiement' != '')){
				$datePaiement = new dateTime ($this->input->post('date_paiement')); 
				$date_paiement = $datePaiement->format('Y-m-d');
			}else{
				$datePaiement = NULL;
			}
			$data= array(
					'type' => $this->input->post('type'), 
					'numero' => $this->input->post('numero'), 
					'objet' => $this->input->post('objet'),
					'montant' => $this->input->post('montant'),
					'methode_paiement' => $this->input->post('methode_paiement'),
					'date' => $date->format('Y-m-d'),
					'date_paiement' => $datePaiement,
					'commentaire' => $this->input->post('commentaire'),
					'id_ligne' => $id_ligne,
					'id_tiers' => $this->input->post('id_tiers')
			);
			$this->facture_model->modify_facture($id, $data);
			$this->session->set_flashdata('success', 'Facture modifi&eacute;e'); 
			redirect('facture/index/'.$id_ligne, 'refresh');
		}
		
	}
	
	public function delete($id, $id_ligne)
	{
		$this->facture_model->delete_facture($id); 
		redirect('facture/index/'.$id_ligne, 'refresh');
	}
}
