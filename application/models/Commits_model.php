<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 11/10/2018
 * Time: 20:26
 */

class Commits_model extends CI_Model
{
    var $usu_codigo;
    private $tabela = "commits";

    function __construct()
    {
        parent::__construct();
    }

    function get($ent_codigo, $all = false)
    {
        $sec_ativo = " and s.sec_ativo = 'S'";
        if ($all):
            $sec_ativo = "";
        endif;
        $sql = "select
                s.sec_codigo,
                s.sec_nome,
                s.sec_ativo,
                s.sec_order
                from {$this->tabela} s 
                where s.ent_codigo = {$ent_codigo} {$sec_ativo}
                order by s.sec_ativo desc, s.sec_order, s.sec_nome";
        $query = $this->db->query($sql);
        return $query->result_object();
    }

    function set($dados,$pro_codigo)
    {
        $data = array(
            'com_codigo' => $dados->id,
            'pro_codigo' => $pro_codigo,
            'dev_name' => $dados->author_name,
            'com_data' => $dados->created_at,
            'com_title' => $dados->title,
            'com_message' => $dados->message
        );
        return ($this->db->replace($this->tabela, $data));
    }

    function put($dados)
    {
        $data = array(
            'com_codigo' => $dados->com_codigo,
            'pro_codigo' => $dados->pro_codigo,
            'dev_name' => $dados->dev_name,
            'com_data' => $dados->com_data,
            'com_additions' => $dados->com_additions,
            'com_deletions' => $dados->com_deletions,
            'com_total' => $dados->com_total
        );
        $this->db->where('com_codigo', $dados->com_codigo);
        return ($this->db->update($this->tabela, $data));
    }
}