<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 30/09/2019
 * Time: 03:36 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('admin/master');
?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div id="admin_home">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Propiedades activas</h5>
                        <p class="card-text"><?php echo $propiedades_activas;?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Propiedades Pendientes</h5>
                        <p class="card-text"><?php echo $propiedades_pendientes;?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>
