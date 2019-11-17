<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 22/10/2019
 * Time: 03:25 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Propiedades  extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Busqueda_model');
        $this->load->model('Propiedad_model');
    }

    public function index()
    {
    }

}