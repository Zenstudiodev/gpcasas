<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 02/09/2019
 * Time: 01:56 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master');


//ubicacion
$ubicacion_select         = array(
    'name'     => 'ubicacion_propiedad',
    'id'       => 'ubicacion_propiedad',
    'class'    => ' browser-default form-control',
    'required' => 'required'
);
$ubicacion_select_options = array();/*
foreach ($tipos->result() as $tipo_carro)
{
    $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}*/


//tipo de propiedad
$tipo_propiedad_select         = array(
    'name'     => 'tipo_propiedad',
    'id'       => 'tipo_propiedad',
    'class'    => ' browser-default form-control',
    'required' => 'required'
);
$tipo_carro_select_options = array();
/*
foreach ($tipos->result() as $tipo_carro)
{
    $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}*/

//No habitaciones

//No baños

//precio min

//precio max

//min area

//max area


?>


<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<div class="container">
    <section id="cuadro_busqueda">
        <div class="row">
            <div class="col-10">
                <h2>Encuentra tu propiedad</h2>
            </div>
            <div class="col-2">
                <a>Renta</a>
                <a>Venta</a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-2">
                <a class="btn btn-success btn-lg">Buscar</a>
            </div>
        </div>
    </section>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>
