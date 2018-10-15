<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gitlab/Projetos_model', 'pro');
    }

    public function index()
    {

        /*        $dados = new stdClass();

                //$dados->user_id = "2290935";

                $dados->id = "52";

                //$dados->path = "";

                //echo json_encode($this->pro->list_projects($dados));
                //exit();

                echo json_encode($this->pro->list_projects_users($dados));
                exit();

                //echo json_encode($this->pro->list_projects_repositor($dados));
                //exit();

                //echo json_encode($this->pro->list_projects_repositor_contributors($dados));
                //exit();*/

        $this->load->view('templates/index');
    }

    public function projetos()
    {
        $this->load->view('templates/index');
    }

}
/*
https://gitlab.com/api/v4/projects/6337036/repository/commits?private_token=6abpZCaGrwLJphicE4eU&with_stats=true&path=application/controllers&since=2017-04-30T20:46:36.000Z

https://docs.gitlab.com/ee/api/projects.html

*/