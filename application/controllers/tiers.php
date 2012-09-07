<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiers extends MY_Auth
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('tiers_model');
    }

    public function index()
    {
        $data['tiers'] = $this->tiers_model->list_tiers();
        $data['_view'] = 'tiers/list_view';
        $this->load->view('default_template', $data);
    }

    public function detail($id)
    {
        $data['tiers'] = $this->tiers_model->get_tiers($id);
        $data['_view'] = 'tiers/detail_view';
        $this->load->view('default_template', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        $this->form_validation->set_rules(array(
            array(
                'field' => 'nom',
                'label' =>  'nom du tiers',
                'rules' => 'required'
            ),
            array(
                'field' => 'responsable',
                'label' =>  'nom du responsable'
            ),
            array(
                'field' => 'telephone',
                'label' =>  'num&eacute;ro de t&eacute;l&eacute;phone'
            ),
            array(
                'field' => 'fax',
                'label' =>  'num&eacute;ro de fax'
            ),
            array(
                'field' => 'mail',
                'label' =>  'adresse e-mail',
                'rules' => 'valid_email'
            ),
            array(
                'field' => 'adresse',
                'label' =>  'adresse postale'
            ),
            array(
                'field' => 'rib',
                'label' =>  'RIB'
            ),
            array(
                'field' => 'ordre_cheque',
                'label' =>  'ordre des ch&egrave;ques'
            ),
            array(
                'field' => 'commentaire',
                'label' =>  'commentaire'
            ),
        ));

        if ($this->form_validation->run() === TRUE) {
            $query_data = array(
                'nom' => $this->input->post('nom'),
                'responsable' => $this->input->post('responsable'),
                'telephone' => $this->input->post('telephone'),
                'fax' => $this->input->post('fax'),
                'mail' => $this->input->post('mail'),
                'adresse' => $this->input->post('adresse'),
                'rib' => $this->input->post('rib'),
                'ordre_cheque' => $this->input->post('ordre_cheque'),
                'commentaire' => $this->input->post('commentaire')
            );
            $this->tiers_model->add_tiers($query_data);

            $this->session->set_flashdata('success', 'Tiers ajout&eacute;');
            redirect('tiers/index');
        } else {
            $data['_view'] = 'tiers/add_view';
            $this->load->view('default_template', $data);
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        $this->form_validation->set_rules(array(
            array(
                'field' => 'nom',
                'label' =>  'nom du tiers',
                'rules' => 'required'
            ),
            array(
                'field' => 'responsable',
                'label' =>  'nom du responsable'
            ),
            array(
                'field' => 'telephone',
                'label' =>  'num&eacute;ro de t&eacute;l&eacute;phone'
            ),
            array(
                'field' => 'fax',
                'label' =>  'num&eacute;ro de fax'
            ),
            array(
                'field' => 'mail',
                'label' =>  'adresse e-mail',
                'rules' => 'valid_email'
            ),
            array(
                'field' => 'adresse',
                'label' =>  'adresse postale'
            ),
            array(
                'field' => 'rib',
                'label' =>  'RIB'
            ),
            array(
                'field' => 'ordre_cheque',
                'label' =>  'ordre des ch&egrave;ques'
            ),
            array(
                'field' => 'commentaire',
                'label' =>  'commentaire'
            ),
        ));

        if ($this->form_validation->run() === TRUE) {
            $query_data = array(
                'nom' => $this->input->post('nom'),
                'responsable' => $this->input->post('responsable'),
                'telephone' => $this->input->post('telephone'),
                'fax' => $this->input->post('fax'),
                'mail' => $this->input->post('mail'),
                'adresse' => $this->input->post('adresse'),
                'rib' => $this->input->post('rib'),
                'ordre_cheque' => $this->input->post('ordre_cheque'),
                'commentaire' => $this->input->post('commentaire')
            );
            $this->tiers_model->edit_tiers($id, $query_data);

            $this->session->set_flashdata('success', 'Tiers modifi&eacute;');
            redirect('tiers/index');
        } else {
            $data['tiers'] = $this->tiers_model->get_tiers($id);
            $data['_view'] = 'tiers/edit_view';
            $this->load->view('default_template', $data);
        }
    }

    public function delete($id)
    {
        $this->tiers_model->delete_tiers($id);
        $this->session->set_flashdata('success', 'Tiers supprim&eacute;');
        redirect('tiers');
    }
}
