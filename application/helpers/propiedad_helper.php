<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 15/06/2020
 * Time: 6:59 PM
 */
function get_imgenes_propiedad_public($propiedad_id)
{
    $ci =& get_instance();
    $imagenes_propiedad = $ci->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
    return $imagenes_propiedad;
}
?>