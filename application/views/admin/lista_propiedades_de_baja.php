<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 15/06/2020
 * Time: 7:45 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('admin/master',
    array(
        'menu' => $menu
    ));
?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="container">
    <?php if (isset($message)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $message; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url()?>admin/propiedades">Activas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>admin/propiedades_pendientes">Pendientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>admin/propiedades_de_baja">De baja</a>
        </li>
    </ul>
    <h2>Propiedades activas</h2>
    <?php if($propiedades_pendientes){ ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Coódigo propiedad</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Zona</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <?php foreach ($propiedades_pendientes->result() as $propiedad) {?>
                    <tr>
                        <td><?php echo $propiedad->Id_propiedad; ?></td>
                        <td><?php echo $propiedad->tipo_propiedad; ?></td>
                        <td><?php echo $propiedad->estado_propiedad; ?></td>
                        <td><?php echo id_departamento_a_nombre($propiedad->id_departamento); ?></td>
                        <td><?php echo id_municipio_a_nombre($propiedad->id_municipio); ?></td>
                        <td><?php echo $propiedad->id_zona; ?></td>
                        <td><?php echo $propiedad->fecha_creacion_propiedad; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-primary" href="<?php echo base_url().'admin/revisar_propiedad/'.$propiedad->Id_propiedad; ?>">Revisar</a>
                                <a type="button" class="btn btn-success" href="<?php echo base_url().'admin/aprobar_propiedad/'.$propiedad->Id_propiedad; ?>">Aprobar</a>
                                <a type="button" class="btn btn-danger" href="<?php echo base_url().'admin/baja_propiedad/'.$propiedad->Id_propiedad; ?>">Baja</a>
                            </div>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    <?php }else{
        echo 'no hay propiedades';
    } ?>
</div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>

</script>
<?php $this->stop() ?>
