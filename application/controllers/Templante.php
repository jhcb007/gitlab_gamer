<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templante extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function list_projetos()
    {
        $this->load->view('templates/list_projetos');
    }

    public function projeto()
    {
        $this->load->view('templates/projeto');
    }

    public function configuracao()
    {
        $this->load->view('templates/configuracao');
    }
}
/*
https://gitlab.com/api/v4/projects/6337036/repository/commits?private_token=6abpZCaGrwLJphicE4eU&with_stats=true&path=application/controllers&since=2017-04-30T20:46:36.000Z

https://docs.gitlab.com/ee/api/projects.html

*/