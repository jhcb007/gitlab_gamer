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

    public function list_ranking($pro_codigo)
    {
        $sql = "select
                d.dev_name,
                d.dev_avatar,
                sum(c.com_additions) as total_additions,
                sum(c.com_deletions) as total_deletions,
                sum(c.com_total) as total_total
                from commits c
                join devs d on d.dev_email = c.dev_email
                where c.pro_codigo = {$pro_codigo}
                group by d.dev_name, d.dev_avatar
                order by total_total desc";
        $query = $this->db->query($sql);
        return $query->result_object();
    }

    public function get_projeto($pro_codigo)
    {
        $sql = "select
                *
                from projects p
                where p.pro_codigo = {$pro_codigo}";
        $query = $this->db->query($sql);
        return $query->row();
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
            $data = array(
                'pro_peso' => $dados->pro_peso,
                'pro_ativo' => $dados->pro_ativo
            );
            $this->db->where('pro_codigo', $dados->id);
            return ($this->db->update($this->tabela, $data));
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