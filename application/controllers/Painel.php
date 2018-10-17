<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //$dados = new stdClass();

        $this->load->view('painel');
    }
}