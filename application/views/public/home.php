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
        <div class="row align-items-center justify-content-center">
            <div class="col-6 col-sm-6 col-md-2 aqua_bg home_tile  align-self-center">
               <a href="<?php echo base_url()?>Busqueda/">
                   <span class="home_tile_icon"><i class="fas fa-truck-loading"></i></span>
                   <h2>Alquiler</h2>
               </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 naranja_bg home_tile">
                <span class="home_tile_icon"><i class="fas fa-sign"></i></span>
                <h2>Compra</h2>
            </div>
            <div class="col-6 col-sm-6 col-md-2 azul_bg home_tile">
                <span class="home_tile_icon"><i class="fas fa-hand-holding-usd"></i></span>
                <h2>Crédito</h2>
            </div>
            <div class="col-6 col-sm-6 col-md-2 verde_bg home_tile">
                <span class="home_tile_icon">
                    <i class="fas fa-tape"></i>
                </span>
                <h2>Remodelación</h2>
            </div>
            <div class="col-6 col-sm-6 col-md-2 gris_bg home_tile">
                <span class="home_tile_icon"><i class="fas fa-shopping-cart"></i></span>
                <h2>Tienda</h2>
            </div>
            <div class="col-6 col-sm-6 col-md-2 negro_gb home_tile">
                <span class="home_tile_icon"><i class="fas fa-shopping-cart"></i></span>
                <h2>Anunciate</h2>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<?php $this->stop() ?>

