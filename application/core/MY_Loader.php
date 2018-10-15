<?php

/*
 * Fuse
 *
 * A simple open source ticket management system. 
 *
 * @package		Fuse
 * @author		Vivek. V
 * @link		http://getvivekv.bitbucket.org/Fuse
 * @link		http://www.vivekv.com
 */

/**
 * Template loader class. This custom loader class overrides CI_Loader
 */
class MY_Loader extends CI_Loader
{

    function __construct()
    {
        parent::__construct();
    }

    public function angular($template_name, $vars = array(), $return = FALSE)
    {

        $template = 'templates/';
        $conteudo = $this->view($template . '/' . $template_name, $vars, $return);

        if ($return) {
            return $conteudo; // view as controller
        }
    }

}
