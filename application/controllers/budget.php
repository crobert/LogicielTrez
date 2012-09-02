<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercice extends MY_Auth
{
    public function index()
    {
        $this->load->model('exercice_model');
        $data['exercices'] = $this->exercice_model->list_exercice();

        $data['_view'] = 'exercice/list_view';
        $this->load->view('default_template', $data);
    }

    public function add()
    {
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('edition', 'Edition', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('annee_1', 'Année d\'avant', 'trim|required|numeric|min_length[4]|max_length[4]|xss_clean');
        $this->form_validation->set_rules('annee_2', 'Année d\'encore avant', 'trim|required|numeric|min_length[4]|max_length[4]|xss_clean');

        if($this->form_validation->run() == FALSE)
        {

            $data['_view'] = 'exercice/nouveau_view';
            $this->load->view('default_template', $data);
        }
        else
        {
            $data= array(
                'edition' => $this->input->post('edition'),
                'annee_1' => $this->input->post('annee_1'),
                'annee_2' => $this->input->post('annee_2')
            );
            $this->load->model('exercice_model');
            $this->exercice_model->add_exercice($data);
            redirect('exercice', 'refresh');
        }

    }

    public function modify($id)
    {
        $this->load->model('exercice_model');
        $exercice = $this->exercice_model->get_exercice($id);
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('edition', 'Edition', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('annee_1', 'Année d\'avant', 'trim|required|numeric|min_length[4]|max_length[4]|xss_clean');
        $this->form_validation->set_rules('annee_2', 'Année d\'encore avant', 'trim|required|numeric|min_length[4]|max_length[4]|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            $data['exercice'] = $exercice;
            $data['_view'] = 'exercice/modifier_view';
            $this->load->view('default_template', $data);
        }
        else
        {
            $data= array(
                'edition' => $this->input->post('edition'),
                'annee_1' => $this->input->post('annee_1'),
                'annee_2' => $this->input->post('annee_2')
            );

            $this->exercice_model->modify_exercice($id, $data);
            redirect('exercice', 'refresh');
        }

    }

    public function delete($id)
    {
        $this->load->model('exercice_model');
        $this->exercice_model->delete_exercice($id);
        redirect('exercice', 'refresh');
    }
}