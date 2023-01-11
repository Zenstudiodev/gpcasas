<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 10/01/2023
 * Time: 12:45
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('admin/master',
    array(
        'menu' => $menu
    ));
?>
<?php $this->start('css_p') ?>
    <link href="/node_modules/datatables/media/css/jquery.dataTables.min.css"
          rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div class="container-fluid">
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
                <a class="nav-link active" href="<?php echo base_url() ?>admin/propiedades">Activas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>admin/propiedades_pendientes">Pendientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>admin/propiedades_de_baja">De baja</a>
            </li>
        </ul>
        <h2>Propiedades activas</h2>
        <?php if ($propiedades_pendientes) { ?>
            <div class="table-responsive">
                <table class="table" id="propiedades">
                    <thead>
                    <tr>
                        <th>Coódigo propiedad</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Titulo</th>
                        <th>Direccion</th>
                        <th>Fecha creación</th>
                        <th>Asesor</th>
                        <th>Asiagnar asesor</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Coódigo propiedad</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Titulo</th>
                        <th>Direccion</th>
                        <th>Fecha creación</th>
                        <th>Asesor</th>
                        <th>Asiagnar asesor</th>
                    </tr>
                    </tfoot>
                    <?php foreach ($propiedades_pendientes->result() as $propiedad) { ?>
                        <tr>

                            <td><?php echo $propiedad->Id_propiedad; ?></td>
                            <td><?php echo $propiedad->tipo_propiedad; ?></td>
                            <td><?php echo $propiedad->estado_propiedad; ?></td>
                            <td><?php echo $propiedad->titulo_propiedad; ?></td>
                            <td><?php echo $propiedad->direccion_propiedad; ?></td>
                            <td><?php echo $propiedad->fecha_creacion_propiedad; ?></td>
                            <td>
                                <select class="form-control asesor_select"
                                        name="asesor<?php echo $propiedad->Id_propiedad ?>"
                                        id="asesor<?php echo $propiedad->Id_propiedad ?>"
                                        seguimiento="<?php echo $propiedad->Id_propiedad ?>">
                                    <option></option>
                                    <?php foreach ($asesores as $asesor) { ?>
                                        <option value="<?php echo $asesor->id ?>" <?php if ($asesor->id == $propiedad->propiedad_asesor_id) {
                                            echo 'selected';
                                        } ?> ><?php echo $asesor->first_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit"
                                        id="asignar_btn_<?php echo $asesor->id ?>"
                                        class="asignar_btn btn btn-primary "
                                        porpiedad_id="<?php echo $propiedad->Id_propiedad; ?>">Asignar
                                </button>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else {
            echo 'no hay propiedades';
        } ?>
    </div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <script src="/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>

    <script>
        var propiedad_id;
        var asesor_id;

        $(".asignar_btn").click(function () {
            propiedad_id = $(this).attr("porpiedad_id");
            asesor_id = $(this).parent().parent().find('.asesor_select').val();
            console.log(propiedad_id);
            console.log(asesor_id);

            form_data = {
                Id_propiedad: propiedad_id,
                propiedad_asesor_id: asesor_id,
            };
            console.log(form_data);

            $.ajax({
                method: "POST",
                url: "<?php echo base_url()?>Admin/asignar_asesor",
                data: form_data
            }).done(function (msg)

            {
                console.log(msg);
            //    console.log("Data Saved: " + msg);
            });
            location.reload();
        });

        //propiedades
        $( document ).ready(function() {
            console.log( "ready!" );
            //$('#facturas').DataTable();
            // Setup - add a text input to each footer cell
            $('#propiedades tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Buscar ' + title + '" />');
            });

            // DataTable
            var table = $('#propiedades').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
            //$('#propiedades').DataTable();
        });

    </script>
<?php $this->stop() ?>