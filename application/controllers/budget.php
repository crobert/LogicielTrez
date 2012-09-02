<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends MY_Breadcrumb
{
    public function index($id_exercice)
    {
        $this->load->model('budget_model');
        $data['budgets'] = $this->budget_model->get_budget_by_exercice($id_exercice);

        $this->set_breadcrumb('exercice', 'Exercice '.$id_exercice, 'exercice/index/'.$id_exercice);
        $this->set_breadcrumb('budget', 'Budgets');

        $data['id_exercice'] = $id_exercice;
        $data['_view'] = 'budget/list_view';
        $this->load->view('default_template', $data);
    }

    public function add($id_exercice)
    {
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');


        if($this->form_validation->run() === FALSE) {
            $data['id_exercice'] = $id_exercice;
            $data['_view'] = 'budget/nouveau_view';
            $this->load->view('default_template', $data);
        } else {
            $data= array(
                'nom' => $this->input->post('nom'),
                'id_exercice' => $id_exercice
            );

            $this->load->model('budget_model');
            $this->budget_model->add_budget($data);

            redirect('budget/index/'.$id_exercice, 'refresh');
        }

    }

    public function modify($id, $id_exercice)
    {
        $this->load->model('budget_model');
        $budget = $this->budget_model->get_budget($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');

        if($this->form_validation->run() === FALSE) {
			$data['id_exercice'] = $id_exercice;
            $data['budget'] = $budget;
            $data['_view'] = 'budget/modifier_view';
            $this->load->view('default_template', $data);
        } else {
            $data= array(
                'nom' => $this->input->post('nom')
            );

            $this->budget_model->modify_budget($id, $data);
            redirect('budget/index/'.$id_exercice, 'refresh');
        }
    }

    public function delete($id, $id_exercice)
    {
        $this->load->model('budget_model');
        $this->budget_model->delete_budget($id);
        redirect('budget/index/'.$id_exercice, 'refresh');
    }
}
