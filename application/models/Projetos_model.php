<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 11/10/2018
 * Time: 20:26
 */

class Projetos_model extends CI_Model
{
    private $tabela = "projects";

    function __construct()
    {
        parent::__construct();
    }

    public function get($ent_codigo, $all = false)
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

    public function set($dados)
    {
        $this->db->where('pro_codigo', $dados->id);
        $q = $this->db->get($this->tabela);
        if ($q->num_rows() > 0) {
            return;
        } else {
            $data = array(
                'pro_codigo' => soNumeros($dados->id),
                'pro_name' => $dados->name,
                'pro_visibility' => $dados->visibility,
                'pro_data' => $dados->created_at
            );
            $this->db->set('pro_codigo', $dados->id);
            return ($this->db->insert($this->tabela, $data));
        }
    }

    public function ativo($dados)
    {
        $data = array(
            'pro_ativo' => $dados->pro_ativo
        );
        $this->db->where('pro_codigo', $dados->pro_codigo);
        return ($this->db->update($this->tabela, $data));
    }
}