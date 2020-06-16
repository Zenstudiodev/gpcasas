<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 30/09/2019
 * Time: 10:55 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Busqueda_model');
        $this->load->model('Propiedad_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');

        }
        $data['propiedades_activas']= $this->Propiedad_model->numero_propiedades_activas();
        $data['propiedades_pendientes']= $this->Propiedad_model->numero_propiedades_pendientes();
        $data['menu']= 'si';
        echo $this->templates->render('admin/home', $data);
    }
    public function subir_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('admin/subir_propiedad', $data);
    }
    public function guardar_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        //print_contenido($_POST);

        $user_id = $this->ion_auth->get_user_id();
        $datos_propiedad = array(
            'modo_propiedad' => $this->input->post('modo_propiedad'),
            'titulo_propiedad' => $this->input->post('titulo_propiedad'),
            'tipo_vendedor' => $this->input->post('tipo_vendedor'),
            'telefono' => $this->input->post('telefono'),
            'telefono_wp' => $this->input->post('telefono_wp'),
            'telefono2' => $this->input->post('telefono2'),
            'telefono2_wp' => $this->input->post('telefono2_wp'),
            'correo_contacto' => $this->input->post('correo_contacto'),
            'precio' => $this->input->post('precio'),
            'moneda_propiedad' => $this->input->post('moneda_propiedad'),
            'tipo_propiedad' => $this->input->post('tipo_propiedad'),
            'user_id_propiedad' => $user_id,
            'id_departamento' => $this->input->post('id_departamento'),
            'id_municipio' => $this->input->post('id_municipio'),
            'id_zona' => $this->input->post('id_zona'),
            'direccion_propiedad' => $this->input->post('direccion_propiedad'),
            'tamaño_terreno_propiedad' => $this->input->post('tamaño_terreno_propiedad'),
            'tipo_medida_propiedad' => $this->input->post('tipo_medida_propiedad'),
            'medida_construccion_propiedad' => $this->input->post('medida_construccion_propiedad'),
            'medida_oficina_propiedad' => $this->input->post('medida_oficina_propiedad'),
            'habitaciones_propiedad' => $this->input->post('habitaciones_propiedad'),
            'baños_completos_propiedad' => $this->input->post('baños_completos_propiedad'),
            'baño_visita_propiedad' => $this->input->post('baño_visita_propiedad'),
            'balcon_propiedad' => $this->input->post('balcon_propiedad'),
            'niveles_porpiedad' => $this->input->post('niveles_porpiedad'),
            'cocina_propiedad' => $this->input->post('cocina_propiedad'),
            'desayunador_propiedad' => $this->input->post('desayunador_propiedad'),
            'lineablanca_propiedad' => $this->input->post('lineablanca_propiedad'),
            'amueblada_propiedad' => $this->input->post('amueblada_propiedad'),
            'cuarto_servicio_propiedad' => $this->input->post('cuarto_servicio_propiedad'),
            'cuarto_seguridad_propiedad' => $this->input->post('cuarto_seguridad_propiedad'),
            'lavanderia_propiedad' => $this->input->post('lavanderia_propiedad'),
            'gas_propano_propiedad' => $this->input->post('gas_propano_propiedad'),
            'calentador_agua_propiedad' => $this->input->post('calentador_agua_propiedad'),
            'garage_propiedad' => $this->input->post('garage_propiedad'),
            'parqueo_propiedad' => $this->input->post('parqueo_propiedad'),
            'parqueo_visitas_propiedad' => $this->input->post('parqueo_visitas_propiedad'),
            'seguridad_privada_propiedad' => $this->input->post('seguridad_privada_propiedad'),
            'garita_control_propiedad' => $this->input->post('garita_control_propiedad'),
            'sala_propiedad' => $this->input->post('sala_propiedad'),
            'sala_reuniones_propiedad' => $this->input->post('sala_reuniones_propiedad'),
            'comedor_propiedad' => $this->input->post('comedor_propiedad'),
            'gradas_propiedad' => $this->input->post('gradas_propiedad'),
            'bodega_interior_propiedad' => $this->input->post('bodega_interior_propiedad'),
            'pergola_propiedad' => $this->input->post('pergola_propiedad'),
            'menaje_propiedad' => $this->input->post('menaje_propiedad'),
            'nombre_condominio_propiedad' => $this->input->post('nombre_condominio_propiedad'),
            'sala_famiiar_propiedad' => $this->input->post('sala_famiiar_propiedad'),
            'sala_juegos_propiedad' => $this->input->post('sala_juegos_propiedad'),
            'chimenea_propiedad' => $this->input->post('chimenea_propiedad'),
            'piscina_propiedad' => $this->input->post('piscina_propiedad'),
            'agua_propiedad' => $this->input->post('agua_propiedad'),
            'luz_propiedad' => $this->input->post('luz_propiedad'),
            'cable_internet_propiedad' => $this->input->post('cable_internet_propiedad')
        );
        //guardar propiedad
        $propiedad_id = $this->Propiedad_model->guardar_propiedad($datos_propiedad);
        if($propiedad_id){
            redirect(base_url().'admin/subir_fotos/'.$propiedad_id);
        }
        //redirect a lista de propiedades
    }
    public function subir_fotos(){
        //comprobar logeo
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        //comprobar que se paso el id de la propiedad
        if(!$this->uri->segment(3)){
            redirect(base_url().'admin/propiedades_pendientes');
        }

        $propiedad_id = $this->uri->segment(3);
        $data['propiedad_id'] =$propiedad_id;
        //datos de la propiedad
        $data['propiedad']= $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $data['fotos_propiedad'] = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        echo $this->templates->render('admin/subir_imagenes_propiedad', $data);

    }
    public function guardar_imagen()
    {
        // print_contenido($_FILES);
        //print_contenido($_GET);
        //obtenemos el id del producto desde una cabecera http enviada desde el dropzone
        //print_contenido($_SERVER);
        //print_contenido($_POST);
        $propiedad_id = $_GET['pid'];
        //$producto_id = $_SERVER['HTTP_PRODUCTO_ID'];
        //echo 'el id del producto es : ' . $producto_id;
        //obtenemos los datos del producto con el id de la cabecera
        $datos_de_propiedad = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $datos_de_propiedad = $datos_de_propiedad->row();

        //obtenemos el numero de imagenes desde el producto
        $numero_de_imagenes = $datos_de_propiedad->imagen;

        //generamos el nombre para la imagen que se va a subir
        //comprobamos si hay algun nombre en la tabla de imagenes
        $imagenes_propiedad = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        if ($imagenes_propiedad) {
            //si ya tiene imagenes y existe la primera
            if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $propiedad_id . '.jpg')) {
                $poner_nombre = false;
                $i = 1;//numero de conteo que aumenta para modificar el nombre de la imagen
                do { // comprbar los nombres mientras no se pueda poner el nombre
                    if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $propiedad_id . '_' . $i . '.jpg')) {
                        echo 'la imagen existe no ponerle asi';
                        $poner_nombre = false;
                    } else {
                        echo 'la imagen no se encuentra ponerle asi \n ';
                        $nombre_imagen = $propiedad_id . '_' . $i . '.jpg';
                        $poner_nombre = true;
                    }
                    $i = $i + 1;
                } while ($poner_nombre == false); //Loop minetras que no se pueda poner el nombre de la imagen
                echo $nombre_imagen;
            } else {
                //si no existe la primera imagen
                $nombre_imagen = $propiedad_id . '.jpg';
            }
        } else {
            //si no existen imagenes
            $nombre_imagen = $propiedad_id . '.jpg';
        }

        $tipo_imagen = $_FILES['imagen_propiedad']['type'];
        $tipo_imagen = explode("/", $tipo_imagen);
        $extension_imgen = $tipo_imagen[1]; // porción2

        //datos de imagen
        $datos_imagen = array(
            "propiedad_id" => $propiedad_id,
            "extencion" => $extension_imgen,
            "nombre_imagen" => $nombre_imagen
        );
        //guadramos el nombre generado de la imagen y la asignamos a producto
        $this->Propiedad_model->guardar_foto_tabla_fotos($datos_imagen);
        //print_r($datos_imagen);

        if (!empty($_FILES['imagen_propiedad']['name'])) { //si se envio un archivo
            $tipo_imagen = $_FILES['imagen_propiedad']['type'];
            echo '<p>' . $nombre_imagen . '</p>';
            echo '<p>' . $tipo_imagen . '</p>';

            $config['upload_path'] = './web/propiedades_pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $nombre_imagen;
            $config['overwrite'] = TRUE;
            //$config['max_size']      = 100;
            //$config['max_width']     = 1024;
            //$config['max_height']    = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagen_propiedad')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './web/propiedades_pic/' . $nombre_imagen;
                //$config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 800;
                //$config['height']       = 50;
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }


                $data = array('upload_data' => $this->upload->data());
                //$this->load->view('subir_documento', $data);
                echo $this->upload->data('file_name');
                echo $this->upload->data('file_size');
            }
        } else {

        }
    }
    function borrar_imagen()
    {

        //Id de imagen desde segmento URL
        $data['imagen_id'] = $this->uri->segment(3);
        //Id de producto desde segmento URL
        $data['prducto_id'] = $this->uri->segment(4);
        $imagen_id = $data['imagen_id'];
        $datos_imagen = $this->Propiedad_model->get_datos_imagen($imagen_id);
        if ($datos_imagen) {
            $datos_imagen = $datos_imagen->row();
            $nombre_imagen = $datos_imagen->nombre_imagen;

            //borrado de registro
            $this->Propiedad_model->borrar_registro_imagen($imagen_id);

            //borrado de imagen
            if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $nombre_imagen)) {
                //echo 'imagen existe';
                if (unlink('/home2/gpautos/gpcasas/web/propiedades_pic/' . $nombre_imagen)) {
                    $this->session->set_flashdata('mensaje', 'se borro la imagen');
                    redirect(base_url() . '/admin/subir_fotos/' . $data['prducto_id']);
                } else {
                    echo 'no se borro';
                }

            } else {

                //echo 'la imagen no existe';
            }


        } else {
            $this->session->set_flashdata('mensaje', 'imagen no existe');
            redirect(base_url() . '/admin/subir_fotos/' . $data['prducto_id']);

        }
    }


    /*public function borrar_imagen()
    {

        //Id de imagen desde segmento URL
        $id_propiedad = $data['imagen_id'] = $this->uri->segment(3);
        //Id de producto desde segmento URL
        $numero_foto = $data['prducto_id'] = $this->uri->segment(4);
        //borrado de imagen

        if (file_exists('/home2/gpautos/gpcasas/web/propiedades_pic/' . $id_propiedad . ' (' . $numero_foto . ').jpg')) {
            //echo 'imagen existe';
            if (unlink('/home2/gpautos/gpcasas/web/propiedades_pic/' . $id_propiedad . ' (' . $numero_foto . ').jpg')) {
                $this->session->set_flashdata('mensaje', 'se borro la imagen');
                redirect(base_url() . '/admin/revisar_propiedad/' . $id_propiedad);
            } else {
                echo 'no se borro';
            }
        } else {

            //echo 'la imagen no existe';
        }

    }
    */

    public function procesar_foto(){
        /* echo '<pre>';
                 print_r($_FILES);
                 echo '</pre>';
                 echo '<pre>';
                 print_r($_POST);
                 echo '</pre>';*/
        $image = file_get_contents($_FILES['imagen']['tmp_name']);
        $id_propiedad = $_POST['id_propiedad'];
        $numero_foto = $_POST['img_number'];

        file_put_contents('/home2/gpautos/gpcasas/web/propiedades_pic/' . $id_propiedad . ' (' . $numero_foto . ').jpg', $image);
    }
    public function propiedades(){

    }
    public function propiedades_pendientes(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

        $data['menu']= 'si';
        $data['propiedades_pendientes'] = $this->Propiedad_model->get_propiedades_pendientes();
        echo $this->templates->render('admin/lista_propiedades_pendientes', $data);
    }
    public function revisar_propiedad(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        if(!$this->uri->segment(3)){
            redirect(base_url().'admin/propiedades_pendientes');
        }else{

        }
        $propiedad_id = $this->uri->segment(3);
        $data['propiedad']= $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $data['fotos_propiedad'] = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        echo $this->templates->render('admin/revisar_propiedad', $data);

    }
    public function aprobar_propiedad(){
        $propiedad_id = $this->uri->segment(3);
        $this->Propiedad_model->aprobar_propiedad($propiedad_id);
        redirect(base_url().'admin');
    }
    public function baja_propiedad(){
        $propiedad_id = $this->uri->segment(3);
        $this->Propiedad_model->aprobar_propiedad($propiedad_id);
        redirect(base_url().'admin');
    }


}