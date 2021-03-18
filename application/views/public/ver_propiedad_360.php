<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 2/12/2019
 * Time: 16:34
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$this->layout('public/public_master', array(
    'sin_banner' => $sin_banner,
));
if ($propiedad) {
    $propiedad = $propiedad->row();
}
?>

<?php $this->start('css_p') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
<style>
    #panorama {
        width: 600px;
        height: 400px;
    }
</style>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div id="panorama"></div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
<script>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "https://gpcasas.net/web/360_v/360_v.jpg"
    });
</script>
<?php $this->stop() ?>

