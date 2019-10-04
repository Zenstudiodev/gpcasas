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
        $this->load->model('Busqueda_model');
    }

    function index()
    {
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('public/busqueda', $data);
    }

    function get_municipio_departamento(){
        header("Access-Control-Allow-Origin: *");

        $departamento = $this->uri->segment(3);
        //pasamos variablea al modelo
        $departamentos = $this->Busqueda_model->get_municipios_departamento($departamento);
        //imprimimos en formato json el resultado
        if($departamentos) {
            echo json_encode($departamentos->result_array());
        }

    }
    function get_zonas_municipio(){
        header("Access-Control-Allow-Origin: *");

        $municipio = $this->uri->segment(3);
        //pasamos variablea al modelo
        $departamentos = $this->Busqueda_model->get_zonas_municipio($municipio);
        //imprimimos en formato json el resultado
        if($departamentos) {
            echo json_encode($departamentos->result_array());
        }
    }
}