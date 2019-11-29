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
    public function filtro(){
        $modo='';
        $departamento='';
        $municipio='';
        $zona='';
        $precio_min='';
        $precio_max='';


        //get filtros por url
        //modo
        $modo = $this->uri->segment(3);
        if ($modo == null) {
            // echo 'no hay tipo';
            $modo = 'TODOS';
            $sesion_modo = 'TODOS';
        } else {
            $sesion_modo = $this->uri->segment(3);
        }
        $departamento = strtoupper($departamento);
        echo $departamento;

        //departamento
        $departamento = $this->uri->segment(4);
        if ($departamento == null) {
            // echo 'no hay tipo';
            $departamento = 'TODOS';
            $sesion_departamento = 'TODOS';
        } else {
            $sesion_departamento = $this->uri->segment(4);
        }
        $departamento = strtoupper($departamento);
        echo $departamento;

        $filtros=array(
            'modo'=>$modo,
            'departamento'=>$departamento,
            'municipio'=>$municipio,
            'zona'=>$zona,
        );

        $data['sin_banner'] = 1;
        $data['propiedades_filtro'] = $this->Propiedad_model->resultado_filtro($filtros);

        echo $this->templates->render('public/resultado_filtro', $data);

    }

}