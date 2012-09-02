<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Breadcrumb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // on test si l'utilisateur est loggué ou pas.
        if (! $this->session->userdata('logged'))
        {
            // s'il ne l'est pas on le redirige sur la page de login
            redirect('login', 'refresh');
        }
    }

    public function set_breadcrumb($type, $name, $link = '')
    {
        $breadcrumbs = $this->session->userdata('breadcrumbs');

        // on va recopier en s'assurant que l'on ne va pas plus loin que le breadcrumb setté
        if (is_array($breadcrumbs)) {
            foreach ($breadcrumbs as $key => $bd) {
                if ($key === $type) {
                    break;
                }

                $tmp[$key] = $bd;
            }
        }

        $tmp[$type] = array(
            'name' => $name,
            'link' => $link
        );

        $this->session->set_userdata('breadcrumbs', $tmp);
    }

    public function remove_breadcrumb()
    {
        $breadcrumbs = $this->session->userdata('breadcrumbs');
        array_pop($breadcrumbs);
        $this->session->set_userdata('breadcrumbs', $breadcrumbs);
    }

    public function reset_breadcrumbs()
    {
        $this->session->unset_userdata('breadcrumbs');
    }
}


