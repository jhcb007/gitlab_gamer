<?php

class Projects_model extends CI_Model
{
    var $url_base = "projects";

    function __construct()
    {
        parent::__construct();
    }

    public function list_projects()
    {
        $filters = array(
            'order_by' => 'name',
            'sort' => 'asc',
            'statistics' => 'true'
        );
        return servidor_http($this->url_base, $filters);
    }

    public function get_project($id)
    {
        $filters = array(
            'statistics' => 'true'
        );
        return servidor_http($this->url_base . "/{$id}", $filters);
    }

    public function list_projects_users($id)
    {
        $url = "{$this->url_base}/{$id}/users";
        return servidor_http($url);
    }

    public function list_projects_repositor_contributors($id)
    {
        $url = "{$this->url_base}/{$id}/repository/contributors";
        $filters = array(
            'order_by' => 'commits',
            'sort' => 'desc'
        );
        return servidor_http($url, $filters);
    }

    public function list_projects_commits($id)
    {
        $url = "{$this->url_base}/{$id}/repository/commits";
        $filters = array(
            'per_page' => 100
        );
        return servidor_http($url, $filters);
    }

    public function list_projects_repositor($id, $path = null)
    {
        $url = "{$this->url_base}/{$id}/repository/tree";
        $filters = array();
        if (!empty($path)):
            $filters['path'] = $path;
        endif;
        return servidor_http($url, $filters);
    }
}
