<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 10/06/2020
 * Time: 4:44 PM
 */

class Empresa extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Busqueda_model');
        $this->load->model('Propiedad_model');
        $this->load->model('User_model');
    }
    function index(){}
    function contacto(){}
    function nosotros(){}
}