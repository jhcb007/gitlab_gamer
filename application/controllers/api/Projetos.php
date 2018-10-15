<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gitlab/Projects_model', 'pro');

        ini_set('zlib.output_compression_level', 9);
        ob_start('ob_gzhandler');
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8');
    }

    public function all()
    {
        echo json_encode($this->pro->list_projects());
    }

    public function get_project($id)
    {
        $resposta = new stdClass;

        $resposta->projeto = $this->pro->get_project($id);
        $resposta->devs = $this->pro->list_projects_users($id);
        $resposta->contribuicao = $this->pro->list_projects_repositor_contributors($id);
        //$resposta->repositorios = $this->pro->list_projects_repositor($id);

        echo json_encode($resposta);
    }

}
