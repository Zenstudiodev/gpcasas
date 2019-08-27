<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 21/01/2018
 * Time: 2:12 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master');
?>


<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div id="home_tiles">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col aqua_bg home_tile  align-self-center">
                <span class="home_tile">-</span>
                <h2>Alquiler</h2>
            </div>
            <div class="col naranja_bg home_tile">
                <span class="home_tile">-</span>
                <h2>Compra</h2>
            </div>
            <div class="col azul_bg home_tile">
                <span class="home_tile">-</span>
                <h2>Crédito</h2>
            </div>
            <div class="col verde_bg home_tile">
                <span class="home_tile">-</span>
                <h2>Remodelación</h2>
            </div>
            <div class="col gris_bg home_tile">
                <span class="home_tile">-</span>
                <h2>Accesorios</h2>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>

