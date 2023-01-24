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
        $this->load->model('User_model');
    }

    public function index()
    {
    }
    public function filtro(){
        $tipo='';
        $moneda='';
        $presupuesto='';
        $modo='';
        $departamento='';
        $municipio='';
        $zona='';
        $precio_min='';
        $precio_max='';
        $presupuesto_q ='';
        $presupuesto_d ='';


        //get filtros por url

        //tipo
        $tipo = $this->uri->segment(3);
        if ($tipo == null) {
            echo 'no hay tipo';
            $tipo = 'TODOS';
            $sesion_tipo = 'TODOS';
        } else {
            $sesion_tipo = $this->uri->segment(3);
            //echo 'hay tipo- '.$sesion_tipo;
        }
        //modo
        $modo = $this->uri->segment(4);
        if ($modo == null) {
             echo 'no hay modo';
            $modo = 'TODOS';
            $sesion_modo = 'TODOS';
        } else {
            $sesion_modo = $this->uri->segment(4);
            //echo 'hay modo- '.$sesion_modo;
        }
        //moneda
        $moneda = $this->uri->segment(5);
        if ($moneda == null) {
            echo 'no hay moneda';
            $moneda = 'TODOS';
            $sesion_moneda = 'TODOS';
        } else {
            $sesion_moneda = $this->uri->segment(5);
            //echo 'hay moneda-'.$sesion_moneda;
        }
        //presupuesto
        $presupuesto = $this->uri->segment(6);
        if ($presupuesto == null) {
            echo 'no hay presupuesto';
            $presupuesto = 'TODOS';
            $sesion_presupuesto = 'TODOS';
        } else {
            $sesion_presupuesto = $this->uri->segment(6);
           // echo 'hay presupuesto -'.$sesion_presupuesto;
        }

        //departamento
        $departamento = $this->uri->segment(7);
        if ($departamento == null) {
            echo 'no hay departamento';
            $departamento = 'TODOS';
            $sesion_departamento = 'TODOS';
        } else {
            $sesion_departamento = $this->uri->segment(7);
           // echo 'hay departamento -'.$sesion_departamento;
        }
        $departamento = strtoupper($departamento);
        //municipio
        $municipio = $this->uri->segment(8);
        if ($municipio == null) {
            echo 'no hay municipio';
            $municipio = 'TODOS';
            $sesion_municipio = 'TODOS';
        } else {
            $sesion_municipio = $this->uri->segment(8);
           // echo 'hay municipio -'.$sesion_municipio;
        }
        $municipio = strtoupper($municipio);

        //zona
        $zona = $this->uri->segment(9);
        if ($zona == null) {
            echo 'no hay zona';
            $zona = 'TODOS';
            $sesion_zona = 'TODOS';
        } else {
            $sesion_zona = $this->uri->segment(9);
            //echo 'hay zona -'.$sesion_zona;
        }
        $zona = strtoupper($zona);

        if($moneda == 'd'){
            $presupuesto_d = $presupuesto;
            $presupuesto_q = $presupuesto * 8.00;
            //echo  $presupuesto_d.'-'.$presupuesto_q;
        }
        if($moneda == 'Q'){
            $presupuesto_d = $presupuesto / 8.00;
            $presupuesto_q = $presupuesto;
           // echo  $presupuesto_d.'-'.$presupuesto_q;
        }
        $data['presupuesto_d'] = $presupuesto_d;
        $data['presupuesto_q'] = $presupuesto_q;


        $filtros=array(
            'tipo'=>$tipo,
            'moneda'=>$moneda,
            'presupuesto'=>$presupuesto,
            'presupuesto_q'=>$presupuesto_q,
            'presupuesto_d'=>$presupuesto_d,
            'modo'=>$modo,
            'departamento'=>$departamento,
            'municipio'=>$municipio,
            'zona'=>$zona,
        );
        //print_contenido($filtros);

        $data['sin_banner'] = 1;
        $data['propiedades_filtro'] = $this->Propiedad_model->resultado_filtro($filtros);
        //print_contenido($data['propiedades_filtro']->result());

        $data['smoneda'] = $moneda;
        echo $this->templates->render('public/resultado_filtro', $data);

    }
    public function ver(){

        $propiedad_id= $this->uri->segment(3);
        $data['propiedad'] = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $data['sin_banner'] = 1;

        echo $this->templates->render('public/ver_propiedad',$data);


    }
    public function v_360(){
        echo $this->templates->render('public/ver_propiedad_360');
}
}