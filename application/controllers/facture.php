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

        // TODO : regarder pour virer les xss_clean
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('numero', 'Num&eacute;ro', 'trim|required|xss_clean');
		$this->form_validation->set_rules('objet', 'Objet', 'trim|required|xss_clean');
		$this->form_validation->set_rules('montant', 'Montant', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('methode_paiement', 'M&eacute;thode de paiement', 'trim|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date_paiement', 'Date de paiement', 'trim|xss_clean');
        $this->form_validation->set_rules('ref_paiement', 'R&eacute;f&eacute;rence du paiement', 'trim');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'trim|xss_clean');
		$this->form_validation->set_rules('tiers', 'Tiers', 'required|trim|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$this->load->model('tiers_model');

			//Récupération des configs pour les selects
			$this->load->model('config_model', 'tva');
			$this->load->model('config_model', 'paiement');
			$this->load->model('config_model', 'facture');
			$data['tva'] = $this->tva->_populate('config_classe_tva')->list_config();
			$data['methode_paiement'] = $this->paiement->_populate('config_methode_paiement')->list_config();
			$data['type_facture'] = $this->facture->_populate('config_type_facture')->list_config();
			
			$data['id_ligne'] = $id_ligne;
			$data['tiers'] = $this->tiers_model->list_tiers();
			$data['_view'] = 'facture/add_view';
            $data['_assets'] = array('chosen', 'jquery-ui');

            $this->load->view('default_template', $data);
		} else {
            if ($this->input->post('date_paiement' != '')){
                $date_paiement = DateTime::createFromFormat('d/m/Y', $this->input->post('date_paiement'))->format('Y-m-d');
            } else {
                $date_paiement = NULL;
            }

			$data = array(
					'fac_type' => $this->input->post('type'),
					'fac_numero' => $this->input->post('numero'),
					'fac_objet' => $this->input->post('objet'),
					'fac_montant' => $this->input->post('montant'),
					'fac_methode_paiement' => $this->input->post('methode_paiement'),
                    'fac_date' => DateTime::createFromFormat('d/m/Y', $this->input->post('date'))->format('Y-m-d'),
					'fac_date_paiement' => $date_paiement,
                    'fac_ref_paiement' => $this->input->post('ref_paiement'),
                    'fac_commentaire' => $this->input->post('commentaire'),
					'fac_id_ligne' => $id_ligne,
					'fac_id_tiers' => $this->input->post('tiers')
			);

			$this->facture_model->add_facture($data); 
			$this->session->set_flashdata('success', 'Facture ajout&eacute;e');

			redirect('facture/index/'.$id_ligne, 'refresh');
		}
		
	}
	
	public function edit($id, $id_ligne)
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
        $this->form_validation->set_rules('ref_paiement', 'R&eacute;f&eacute;rence du paiement', 'trim');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'trim|xss_clean');
		$this->form_validation->set_rules('tiers', 'Tiers', 'required|trim|numeric|xss_clean');

		if($this->form_validation->run() == FALSE) {
			$this->load->model('tiers_model');

			//Récupération des configs pour les selects
			$this->load->model('config_model', 'tva');
			$this->load->model('config_model', 'paiement');
			$this->load->model('config_model', 'facture');
			$data['tva'] = $this->tva->_populate('config_classe_tva')->list_config();
			$data['methode_paiement'] = $this->paiement->_populate('config_methode_paiement')->list_config();
			$data['type_facture'] = $this->facture->_populate('config_type_facture')->list_config();

			$data['id_ligne'] = $id_ligne;
			$data['tiers'] = $this->tiers_model->list_tiers();
			$data['facture'] = $facture;
			$data['_view'] = 'facture/edit_view';
            $data['_assets'] = array('chosen', 'jquery-ui');

			$this->load->view('default_template', $data);
		} else {
			if ($this->input->post('date_paiement' != '')){
                $date_paiement = DateTime::createFromFormat('d/m/Y', $this->input->post('date_paiement'))->format('Y-m-d');
			} else {
                $date_paiement = NULL;
			}

			$data = array(
					'fac_type' => $this->input->post('type'),
					'fac_numero' => $this->input->post('numero'),
					'fac_objet' => $this->input->post('objet'),
					'fac_montant' => $this->input->post('montant'),
					'fac_methode_paiement' => $this->input->post('methode_paiement'),
					'fac_date' => DateTime::createFromFormat('d/m/Y', $this->input->post('date'))->format('Y-m-d'),
					'fac_date_paiement' => $date_paiement,
                    'fac_ref_paiement' => $this->input->post('ref_paiement'),
                    'fac_commentaire' => $this->input->post('commentaire'),
					'fac_id_ligne' => $id_ligne,
					'fac_id_tiers' => $this->input->post('tiers')
			);
			$this->facture_model->edit_facture($id, $data);
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
