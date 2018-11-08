<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 11/10/2018
 * Time: 20:26
 */

class Configuracao_model extends CI_Model
{
    private $tabela = "configuracao";

    function __construct()
    {
        parent::__construct();
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
}