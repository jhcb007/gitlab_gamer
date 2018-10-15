<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 11/10/2018
 * Time: 20:26
 */

class Devs_model extends CI_Model
{
    var $usu_codigo;
    private $tabela = "devs";

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


    function set($dados)
    {
        $this->db->where('dev_name', $dados->name);
        $q = $this->db->get($this->tabela);

        if ($q->num_rows() > 0) {
            return;
        } else {
            $data = array(
                'dev_name' => $dados->name,
                'dev_email' => $dados->email
            );
            $this->db->set('dev_name', $dados->name);
            return ($this->db->insert($this->tabela, $data));
        }
    }

}