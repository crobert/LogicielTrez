<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends MY_Breadcrumb
{
    public function index($id_exercice)
    {
        $this->load->model('budget_model');
        $data['budgets'] = $this->budget_model->get_budget_by_exercice($id_exercice);

        $this->set_breadcrumb('budget', 'Budgets de '.$id_exercice, 'budget/index/'.$id_exercice);

        $data['id_exercice'] = $id_exercice;
        $data['_view'] = 'budget/list_view';
        $this->load->view('default_template', $data);
    }

    public function add($id_exercice)
    {
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $data['id_exercice'] = $id_exercice;
            $data['_view'] = 'budget/add_view';
            $this->load->view('default_template', $data);
        } else {
            $data = array(
                'bud_nom' => $this->input->post('nom'),
                'bud_id_exercice' => $id_exercice
            );

            $this->load->model('budget_model');
            $this->budget_model->add_budget($data);
            $this->session->set_flashdata('success', 'Budget ajout&eacute;');
            redirect('budget/index/'.$id_exercice, 'refresh');
        }

    }

    public function edit($id, $id_exercice)
    {
        $this->load->model('budget_model');
        $budget = $this->budget_model->get_budget($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');

        if($this->form_validation->run() === FALSE) {
			$data['id_exercice'] = $id_exercice;
            $data['budget'] = $budget;
            $data['_view'] = 'budget/edit_view';
            $this->load->view('default_template', $data);
        } else {
            $data = array(
                'bud_nom' => $this->input->post('nom')
            );

            $this->budget_model->edit_budget($id, $data);
            $this->session->set_flashdata('success', 'Exercice modifi&eacute;');
            redirect('budget/index/'.$id_exercice, 'refresh');
        }
    }

    public function delete($id, $id_exercice)
    {
        $this->load->model('budget_model');
        $this->budget_model->delete_budget($id);
        $this->session->set_flashdata('success', 'Exercice supprim&eacute;');
        redirect('budget/index/'.$id_exercice, 'refresh');
    }
}
