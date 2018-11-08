<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gitlab/Projects_model', 'pro');
        $this->load->model('Projetos_model', 'pro_mysql');

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
        $resposta->dados_projeto = $this->pro_mysql->get_projeto($id);

        echo json_encode($resposta);
    }

    public function set_project()
    {
        $dados = json_decode(file_get_contents("php://input"));
        $resposta = new stdClass;
        $resposta->status = false;
        $resposta->mensagem = "Ocorreu um erro ao atualizar projeto.";
        if ($this->pro_mysql->set($dados)) {
            $resposta->status = true;
            $resposta->mensagem = "Projeto incluído com sucesso.";
        }
        echo json_encode($resposta);
    }

    public function list_projetos()
    {
        $resposta = new stdClass;
        $resposta->projetos = $this->pro_mysql->list_projetos();
        echo json_encode($resposta);
    }

    public function list_ranking($pro_codigo)
    {
        $resposta = new stdClass;
        $projeto = $this->pro_mysql->get_projeto($pro_codigo);
        $ranking = $this->pro_mysql->list_ranking($pro_codigo);
        $primeiro_colocado = $ranking[0]->total_total;

        //formular
        $primeiro_colocado = ($projeto->pro_peso * $primeiro_colocado) / 1000;

        foreach ($ranking as $r):
            $nome_array = explode(" ", $r->dev_name);
            if (count($nome_array) > 1):
                $r->dev_name = $nome_array[0] . " " . $nome_array[1];
            else:
                $r->dev_name = $nome_array[0];
            endif;

            //formular
            $r->total_total = ($projeto->pro_peso * $r->total_total) / 1000;
            $r->progresso = round(((intval($r->total_total) * 100) / $primeiro_colocado), 2);

        endforeach;
        $resposta->ranking = $ranking;
        $resposta->projeto = $projeto;
        echo json_encode($resposta);
    }

}
