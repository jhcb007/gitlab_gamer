<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gitlab/Projects_model', 'git_pro');
        $this->load->model('Projetos_model', 'projects');
        $this->load->model('Devs_model', 'devs');
        $this->load->model('Commits_model', 'com');

        ini_set('zlib.output_compression_level', 9);
        ob_start('ob_gzhandler');
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8');
    }

    public function all()
    {
        $dados = $this->git_pro->list_projects();

        foreach ($dados->conteudo as $d):
            $this->projects->set($d);
            $devs = $this->git_pro->list_projects_repositor_contributors($d->id);
            foreach ($devs->conteudo as $dev):
                $this->devs->set($dev);
            endforeach;
            $commits = $this->git_pro->list_projects_commits($d->id);
            foreach ($commits->conteudo as $com):
                $this->com->set($com, $d->id);
            endforeach;
        endforeach;

        echo json_encode($this->git_pro->list_projects());
    }

}
