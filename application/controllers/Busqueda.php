<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 02/09/2019
 * Time: 01:54 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
    }

    function index()
    {
        echo $this->templates->render('public/busqueda');
    }
}