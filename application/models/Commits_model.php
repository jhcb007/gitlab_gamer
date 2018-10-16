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

    function get_ultimo_commit($pro_codigo)
    {
        $sql = "select
                max(c.com_data) as ultimo_commit
                from commits c
                where c.pro_codigo = {$pro_codigo}";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function set($dados, $pro_codigo)
    {
        $this->db->where('com_codigo', $dados->id);
        $q = $this->db->get($this->tabela);

        if ($q->num_rows() > 0) {
            return;
        } else {
            $data = array(
                'com_codigo' => $dados->id,
                'pro_codigo' => $pro_codigo,
                'dev_email' => $dados->committer_email,
                'com_title' => $dados->title,
                'com_message' => $dados->message,
                'com_data' => $dados->committed_date,
                'com_additions' => $dados->stats->additions,
                'com_deletions' => $dados->stats->deletions,
                'com_total' => $dados->stats->total
            );
            return ($this->db->insert($this->tabela, $data));
        }
    }
}