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
        $this->load->model('Banners_model');
        $this->load->model('User_model');
    }

    function index()
    {
        $tipo_busqueda = $this->uri->segment(3);
        $data['tipo_busqueda'] = $tipo_busqueda;
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/busqueda', $data);
    }

    function get_municipio_departamento()
    {
        header("Access-Control-Allow-Origin: *");

        $departamento = $this->uri->segment(3);
        //pasamos variablea al modelo
        $departamentos = $this->Busqueda_model->get_municipios_departamento($departamento);
        //imprimimos en formato json el resultado
        if ($departamentos) {
            echo json_encode($departamentos->result_array());
        }

    }

    function get_zonas_municipio()
    {
        header("Access-Control-Allow-Origin: *");

        $municipio = $this->uri->segment(3);
        //pasamos variablea al modelo
        $departamentos = $this->Busqueda_model->get_zonas_municipio($municipio);
        //imprimimos en formato json el resultado
        if ($departamentos) {
            echo json_encode($departamentos->result_array());
        }
    }

}
    