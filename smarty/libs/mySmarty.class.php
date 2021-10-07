<?php
require_once('Smarty.class.php');

class mySmarty extends Smarty
{
    function __construct()
    {
        parent::__construct();

        //set template dir
        $this->template_dir = "../views";
        //set compile dir
        $this->compile_dir = "../templates_c";
    }
}