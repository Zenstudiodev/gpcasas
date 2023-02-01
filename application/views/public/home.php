<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 21/01/2018
 * Time: 2:12 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master',
    array(
        'header_banners' => $header_banners
    )
);
?>


<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<div id="home_tiles">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-6 col-sm-6 col-md-2 aqua_bg home_tile  align-self-center">
                <a href="<?php echo base_url() ?>Busqueda/index/">
                    <span class="home_tile_icon"><i class="fas fa-truck-loading"></i></span>
                    <h2>Renta</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 naranja_bg home_tile">
                <a href="<?php echo base_url() ?>Busqueda/index/venta">
                    <span class="home_tile_icon"><i class="fas fa-sign"></i></span>
                    <h2>Venta</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 negro_gb home_tile">
                <a href="<?php echo base_url() ?>user/seleccionar_plan/">
                    <span class="home_tile_icon"><i class="fa fa-map-marker"></i></span>
                    <h2>Anunciate</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 azul_bg home_tile">
                <a href="<?php echo base_url() ?>home/credito/">
                    <span class="home_tile_icon"><i class="fas fa-hand-holding-usd"></i></span>
                    <h2>Crédito</h2>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 verde_bg home_tile">
                <span class="home_tile_icon">
                    <i class="fas fa-tape"></i>
                </span>
                <h2>Remodelación <small>Próximamente</small></h2>

            </div>
            <div class="col-6 col-sm-6 col-md-2 gris_bg home_tile">

                <a href="<?php echo base_url() ?>/productos/categoria/1">
                <span class="home_tile_icon"><i class="fas fa-shopping-cart"></i></span>
                <h2>Tienda <br><small>Próximamente</small></h2>
                </a>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>
    let deferredPrompt;
    const addBtn = document.querySelector('.add-button');
    addBtn.style.display = 'none';

    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        // Update UI to notify the user they can add to home screen
        addBtn.style.display = 'block';

        addBtn.addEventListener('click', (e) => {
            // hide our user interface that shows our A2HS button
            addBtn.style.display = 'none';
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                } else {
                    console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
            });
        });
    });
</script>
<?php $this->stop() ?>

