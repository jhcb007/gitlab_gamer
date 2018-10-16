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

    public function list_projetos($ativo = 'S')
    {
        $sql = "select
                *
                from projects p
                where p.pro_ativo = '{$ativo}'";
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