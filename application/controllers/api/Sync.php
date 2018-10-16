<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gitlab/Projects_model', 'git_pro');
        $this->load->model('Projetos_model', 'pro');
        $this->load->model('Devs_model', 'devs');
        $this->load->model('Commits_model', 'com');

        ini_set('zlib.output_compression_level', 9);
        ob_start('ob_gzhandler');
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8');
    }

    public function projects()
    {
        $dados = $this->git_pro->list_projects();
        foreach ($dados->conteudo as $d):
            if ($dados->success):
                $this->pro->set($d);
            endif;
            $devs = $this->git_pro->list_projects_repositor_contributors($d->id);
            foreach ($devs->conteudo as $dev):
                if ($devs->success):
                    $this->devs->set($dev);
                endif;
            endforeach;
        endforeach;
        echo json_encode($this->git_pro->list_projects());
    }


    public function commit()
    {
        $projetos = $this->pro->list_projetos('N');
        $resposta = new stdClass;
        $total_atualizado = 0;

        foreach ($projetos as $pro):

            $ultimoCommit = $this->com->get_ultimo_commit($pro->pro_codigo);
            $data_hora = null;
            if (empty($ultimoCommit->ultimo_commit) == FALSE):
                $datetime = new DateTime($ultimoCommit->ultimo_commit);
                $datetime->modify('-1 day');
                $data_hora = $datetime->format('c');
            endif;

            $commits = $this->git_pro->list_projects_commits($pro->pro_codigo, $data_hora);
            if (intval($commits->header['X-Total-Pages']) > 1):
                for ($i = 2; $i <= $commits->header['X-Total-Pages']; $i++):
                    $aux_array = $this->git_pro->list_projects_commits($pro->pro_codigo, $data_hora, $i);
                    if ($aux_array->success):
                        foreach ($aux_array->conteudo as $aa):
                            array_push($commits->conteudo, $aa);
                        endforeach;
                    endif;
                endfor;
            endif;

            foreach ($commits->conteudo as $com):
                $this->com->set($com, $pro->pro_codigo);
                $total_atualizado++;
            endforeach;
        endforeach;

        $resposta->atualizado = $total_atualizado;
        echo json_encode($resposta);
    }

}
