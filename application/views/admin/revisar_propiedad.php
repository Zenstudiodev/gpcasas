<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 28/10/2019
 * Time: 07:26 PM
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

    <?php if ($propiedad) {
        $propiedad = $propiedad->row();
        ?>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="2"><h2>Datos de propiedad</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Tipo de propiedad</th>
                        <td><?php echo $propiedad->tipo_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Dirección</th>
                        <td><?php echo $propiedad->direccion_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Departamento</th>
                        <td><?php echo id_departamento_a_nombre($propiedad->id_departamento); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Municipio</th>
                        <td><?php echo id_municipio_a_nombre($propiedad->id_municipio); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Zona</th>
                        <td><?php echo $propiedad->id_zona; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tamaño del terreno</th>
                        <td><?php echo $propiedad->tamaño_terreno_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de medida</th>
                        <td><?php echo $propiedad->tipo_medida_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Medida Construccion</th>
                        <td><?php echo $propiedad->medida_construccion_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Medida Construccion</th>
                        <td><?php echo $propiedad->medida_construccion_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Habitaciones</th>
                        <td><?php echo $propiedad->habitaciones_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Baños completos</th>
                        <td><?php echo $propiedad->baños_completos_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Baño de visitas</th>
                        <td><?php echo $propiedad->baño_visita_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Balcón</th>
                        <td><?php echo $propiedad->balcon_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Niveles</th>
                        <td><?php echo $propiedad->niveles_porpiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cocina</th>
                        <td><?php echo $propiedad->niveles_porpiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Desayunador</th>
                        <td><?php echo $propiedad->desayunador_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Línea blanca</th>
                        <td><?php echo $propiedad->lineablanca_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Amueblada</th>
                        <td><?php echo $propiedad->amueblada_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cuarto de servicio</th>
                        <td><?php echo $propiedad->cuarto_servicio_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cuarto de seguridad</th>
                        <td><?php echo $propiedad->cuarto_seguridad_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Lavandería</th>
                        <td><?php echo $propiedad->lavanderia_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Gas propano</th>
                        <td><?php echo $propiedad->gas_propano_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Calentador de agua</th>
                        <td><?php echo $propiedad->calentador_agua_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Garage</th>
                        <td><?php echo $propiedad->garage_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">parqueo propiedad</th>
                        <td><?php echo $propiedad->parqueo_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Parqueo visitas</th>
                        <td><?php echo $propiedad->parqueo_visitas_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Seguridad Privada</th>
                        <td><?php echo $propiedad->seguridad_privada_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Garita de control</th>
                        <td><?php echo $propiedad->garita_control_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sala</th>
                        <td><?php echo $propiedad->sala_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sala de reuniones</th>
                        <td><?php echo $propiedad->sala_reuniones_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Comedor</th>
                        <td><?php echo $propiedad->comedor_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Gradas</th>
                        <td><?php echo $propiedad->gradas_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Bodega interior</th>
                        <td><?php echo $propiedad->bodega_interior_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Pergola</th>
                        <td><?php echo $propiedad->pergola_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Menaje</th>
                        <td><?php echo $propiedad->menaje_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre Condominio</th>
                        <td><?php echo $propiedad->nombre_condominio_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sala familiar</th>
                        <td><?php echo $propiedad->sala_famiiar_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sala de juegos</th>
                        <td><?php echo $propiedad->sala_juegos_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Chimenea</th>
                        <td><?php echo $propiedad->chimenea_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Piscina</th>
                        <td><?php echo $propiedad->piscina_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Agua</th>
                        <td><?php echo $propiedad->agua_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">luz</th>
                        <td><?php echo $propiedad->luz_propiedad; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cable internet</th>
                        <td><?php echo $propiedad->cable_internet_propiedad; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <?php
                if ($fotos_propiedad) {
                    ?>
                    <div class="row">
                        <?php foreach ($fotos_propiedad->result() as $imagen) { ?>
                            <div class="col-md-4">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <i class="fas fa-file-image"></i>

                                        <h3 class="box-title"><?php echo $imagen->nombre_imagen ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <img class="img-fluid pad img_subida"
                                             src="<?php echo base_url() . '/web/propiedades_pic/' . $imagen->nombre_imagen; ?>"
                                             alt="Photo">
                                        <a href="<?php echo base_url() . 'admin/borrar_imagen/' . $imagen->imagen_id . '/' . $propiedad->Id_propiedad; ?>"
                                           class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                        </a>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                <?php } ?>

            </div>
        </div>
        <div class="row">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-secondary" href="<?php echo base_url().'admin/propiedades_pendientes/'?>">Regresar</a>
                <a type="button" class="btn btn-secondary" href="<?php echo base_url().'admin/aprobar_propiedad/'.$propiedad->Id_propiedad?>">Aprobar</a>
            </div>
        </div>
    <?php } ?>
</div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>

</script>
<?php $this->stop() ?>
