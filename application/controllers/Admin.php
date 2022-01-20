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
        $this->load->model('Banners_model');
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
        $data['propiedades_activas'] = $this->Propiedad_model->numero_propiedades_activas();
        $data['propiedades_pendientes'] = $this->Propiedad_model->numero_propiedades_pendientes();
        $data['menu'] = 'si';
        echo $this->templates->render('admin/home', $data);
    }

    /** propiedades**/
    public function asignar_propiedad()
    {
        $datos_casa_draft = array(
            'plan_propiedad' => 'vip',
            'user_id_propiedad' => $this->ion_auth->get_user_id(),
        );
        $porpiedad_id = $this->Propiedad_model->asignar_casa_dfraft($datos_casa_draft);
        /*$datos_de_pago = array(
            'user_id' => $this->ion_auth->get_user_id(),
            'propiedad_id' => $porpiedad_id,
            'plan_anuncio' => $plan,
            'monto_pago' => '0',
            'direccion_pago' => '-',
            'fecha_de_pago' => '-',
            'hora_pago' => '-',
            'pauta_fb_pago' =>'-',
            'manta_pago' => '-',
        );*/
        // print_contenido($datos_de_pago);

        //$this->User_model->guardar_pago($datos_de_pago);

        redirect(base_url() . 'User/subir_propiedad_t/' . $porpiedad_id);
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
            'tamano_terreno_propiedad' => $this->input->post('tamano_terreno_propiedad'),
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
            'cable_internet_propiedad' => $this->input->post('cable_internet_propiedad'),
            'comentario_propiedad' => $this->input->post('comentario_propiedad')
        );
        //guardar propiedad
        $propiedad_id = $this->Propiedad_model->guardar_propiedad($datos_propiedad);
        if ($propiedad_id) {
            redirect(base_url() . 'admin/subir_fotos/' . $propiedad_id);
        }
        //redirect a lista de propiedades
    }

    public function subir_fotos()
    {
        //comprobar logeo
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        //comprobar que se paso el id de la propiedad
        if (!$this->uri->segment(3)) {
            redirect(base_url() . 'admin/propiedades_pendientes');
        }

        $propiedad_id = $this->uri->segment(3);
        $data['propiedad_id'] = $propiedad_id;
        //datos de la propiedad
        $data['propiedad'] = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
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
        $datos_de_propiedad = $this->Propiedad_model->get_propiedad_by_id_subir($propiedad_id);
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

    public function borrar_imagen()
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

    public function procesar_foto()
    {
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

    public function propiedades()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

        $data['menu'] = 'si';
        $data['propiedades_pendientes'] = $this->Propiedad_model->get_propiedades_activas();
        echo $this->templates->render('admin/lista_propiedades', $data);
    }

    public function propiedades_pendientes()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

        $data['menu'] = 'si';
        $data['propiedades_pendientes'] = $this->Propiedad_model->get_propiedades_pendientes();
        echo $this->templates->render('admin/lista_propiedades_pendientes', $data);
    }

    public function propiedades_de_baja()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

        $data['menu'] = 'si';
        $data['propiedades_pendientes'] = $this->Propiedad_model->get_propiedades_de_baja();
        echo $this->templates->render('admin/lista_propiedades_de_baja', $data);
    }

    public function revisar_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        if (!$this->uri->segment(3)) {
            redirect(base_url() . 'admin/propiedades_pendientes');
        } else {

        }
        $propiedad_id = $this->uri->segment(3);
        $data['asesores'] = $this->ion_auth->users()->result();
        $data['propiedad'] = $this->Propiedad_model->get_propiedad_by_id_subir($propiedad_id);
        $data['fotos_propiedad'] = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        echo $this->templates->render('admin/revisar_propiedad', $data);

    }

    public function aprobar_propiedad()
    {
        $propiedad_id = $this->uri->segment(3);
        $this->Propiedad_model->aprobar_propiedad($propiedad_id);
        redirect(base_url() . 'admin');
    }

    public function baja_propiedad()
    {
        $propiedad_id = $this->uri->segment(3);
        $this->Propiedad_model->baja_propiedad($propiedad_id);
        redirect(base_url() . 'admin/propiedades');
    }

    public function editar_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        if (!$this->uri->segment(3)) {
            redirect(base_url() . 'admin/propiedades_pendientes');
        } else {

        }
        $data['menu'] = 'si';
        $propiedad_id = $this->uri->segment(3);
        $data['propiedad'] = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);
        $data['fotos_propiedad'] = $this->Propiedad_model->get_fotos_de_propiedad_by_id($propiedad_id);
        $data['departamentos'] = $this->Busqueda_model->get_departamentos();
        echo $this->templates->render('admin/editar_propiedad', $data);
    }

    public function actualizar_propiedad()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        //print_contenido($_POST);

        $user_id = $this->ion_auth->get_user_id();
        $datos_propiedad = array(
            'id_propiedad' => $this->input->post('id_propiedad'),
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
            'cable_internet_propiedad' => $this->input->post('cable_internet_propiedad'),
            'comentario_propiedad' => $this->input->post('comentario_propiedad')
        );
        //actualizar propiedad
        $this->Propiedad_model->actualizar_propiedad($datos_propiedad);
        $propiedad_id = $datos_propiedad['id_propiedad'];


        if ($this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'admin/editar_propiedad/' . $propiedad_id);
        } else {
            redirect(base_url() . 'User/perfil');
        }

    }

    public function asignar_asesor_propiedad()
    {
        print_contenido($_POST);

        $datos_propiedad = array(
            'id_asesor' => $this->input->post('id_asesor'),
            'id_propiedad' => $this->input->post('id_propiedad'),
        );
        //actualizar propiedad
        $this->Propiedad_model->asignar_asesor($datos_propiedad);
    }

    public function generar_pdf()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        if (!$this->uri->segment(3)) {
            redirect(base_url() . 'admin/propiedades');
        } else {

        }
        $propiedad_id = $this->uri->segment(3);
        $propiedad = $this->Propiedad_model->get_propiedad_by_id($propiedad_id);


        if ($propiedad) {
            $propiedad = $propiedad->row();
        } else {
            redirect(base_url() . 'admin/propiedades');
        }
        // print_contenido($propiedad);

        $propuesta_no = '';
        $codigo_propiedad = $propiedad->Id_propiedad;
        $moneda_propiedad = $propiedad->moneda_propiedad;
        $valor_propiedad = $propiedad->precio_propiedad;
        $fecha = '';
        /**
        datos de cliente a quien mandar la informacion
		 **/
        $nombre_cliente = 'Alexandro Cáseres-';
        $correo_cliente = 'caceres.gt@gmail.com';
        $telefono_cliente = '55381539';



        $tipo_inmueble = $propiedad->tipo_propiedad;
        $tipo_negociacion = $propiedad->tipo_vendedor;
        $ubicacion = $propiedad->direccion_propiedad . ', ' . id_departamento_a_nombre($propiedad->id_departamento) . ', ' . id_municipio_a_nombre($propiedad->id_municipio) . ' Zona ' . $propiedad->id_zona;
        $departamento = id_departamento_a_nombre($propiedad->id_departamento);
        $banos_completos = $propiedad->baños_completos_propiedad;
        $banos_visitas = $propiedad->baño_visita_propiedad;
        $sala = $propiedad->sala_propiedad;
        $agua_potable = $propiedad->agua_propiedad;
        $parqueo = $propiedad->parqueo_propiedad;
        $cocina = $propiedad->cocina_propiedad;
        $niveles = $propiedad->niveles_porpiedad;
        $balcon = $propiedad->balcon_propiedad;
        //$cancha_fut=$propiedad->sala_propiedad;
        //$juegos_infantiles=$propiedad->sala_propiedad;
        //$camaras_seguridad=$propiedad->sala_propiedad;
        //$walkiing_closet=$propiedad->sala_propiedad;
        //$amenidades=$propiedad->sala_propiedad;
        $mantenimiento = $propiedad->sala_propiedad;
        $comedor = $propiedad->comedor_propiedad;
        $lavanderia = $propiedad->lavanderia_propiedad;
        $habitaciones = $propiedad->habitaciones_propiedad;
        $sala_familiar = $propiedad->sala_famiiar_propiedad;
        $cuarto_servicio = $propiedad->cuarto_servicio_propiedad;
        $pergola = $propiedad->pergola_propiedad;
        $garita_seguridad = $propiedad->garita_control_propiedad;
        $seguridad_privada = $propiedad->seguridad_privada_propiedad;
        $observaciones = $propiedad->comentario_propiedad;
        $gp_contacto = $propiedad->nombre_contacto_propiedad;
        $telefono = $propiedad->telefono;
        $correo = $propiedad->correo_contacto;

        //generar pdf
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('GP Compras');
        $pdf->SetTitle('Pedido ');
        $pdf->SetSubject('Solicitud de pago por planilla');
        $pdf->SetKeywords('GP compras');
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 061', PDF_HEADER_STRING);
        // set header and footer fonts
        //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
        //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor

        // ---------------------------------------------------------
        // set font
        //$pdf->SetFont('helvetica', '', 10);
        // add a page
        $pdf->AddPage();
        /* NOTE:
         * *********************************************************
         * You can load external XHTML using :
         *
         * $html = file_get_contents('/path/to/your/file.html');
         *
         * External CSS files will be automatically loaded.
         * Sometimes you need to fix the path of the external CSS.
         * *********************************************************
         */
        // define some HTML content with style
        $html = '<style>
        .t-center,h1{text-align:center}#cuadro_firma,.datos_productos table,.datos_productos td,.datos_productos th{border:1px solid #000}.w-100{width:100%}.w-90{width:90%}.w-80{width:80%}.w-70{width:70%}.w-60{width:60%}.w-50{width:50%}.w-40{width:40%}.w-30{width:30%}.w-20{width:20%}.w-10{width:10%}.forma_pdf{width:800px;background:#f7f4f3;font-family:Arial}.forma_pdf_container{margin:10px auto;width:97%}.titulo{color:#f19800;font-size:24px;font-weight:700;padding-top:11px;display:block}#logo{height:auto;width:180px}h1{font-size:30px}.datos_cliente{margin-bottom:20px}table{border-collapse:separate!important;border-spacing:0!important;padding:5px}.datos_productos{margin:10px auto}.tl-d{text-align:right}#entrega{margin:40px auto}#cuadro_firma{width:300px;height:160px}
</style>';
        $html .= '<div class="forma_pdf" style=" width: 800px; background: #f7f4f3;     font-family: Arial;">';
        $html .= '<div id="table_container">';


		$html .= '<table style="width: 100%;" border="1">';
		$html .= '<tbody>';
		$html .= '<tr><td colspan="2" style="text-align: center;padding: 0.5cm 0cm;"><a href="https://gpcasas.net">GPCASA.NET</a></td></tr>';
		$html .= '<tr><td rowspan="4"><div id="img_wraper" style="width: 14cm; height: 10cm;overflow: hidden;"><img src="https://gpcasas.net//web/propiedades_pic/156.jpg" style="width: 14cm;"></div></td><td class="t_header"><b>PROPUESTA</b>005</td></tr>';
		$html .= '<tr><td class="t_header"><b>CODIGO</b>156</td></tr>';
		$html .= '<tr><td class="t_header"><b>VALOR</b>$750.00</td></tr>';
		$html .= '<tr><td class="t_header"><b>FECHA</b>2/12/2021</td></tr>';
		$html .= '</table>';
		$html .= '</tbody>';
		$html .= '<table>';

        $html .= '<table>';
		$html .= '<tr>';
		$html .= '<td>Cliente:</td>';
		$html .= '<td>'.$nombre_cliente.'</td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td>Correo</td>';
		$html .= '<td>'.$correo_cliente.'</td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td>Telefono</td>';
		$html .= '<td>'.$telefono_cliente.'</td>';
		$html .= '</tr>';
		$html .= '</table>';
        $html .= '';
        $html .= '';
        $html .= '</div>';




// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // reset pointer to the last page
        $pdf->lastPage();
        // ---------------------------------------------------------
        //Close and output PDF document
        //$apdf = $pdf->Output('/home2/gpautos/gpcompras-/pdf/solicitud_planilla/solicitud_pedido_'.$pedido_id.'.pdf', 'F');
        //$this->email->attach('/home2/gpautos/gpcompras-/pdf/solicitud_planilla/solicitud_pedido_'.$pedido_id.'.pdf');
        //$pdf->Output('laura pausini', 'I');

        //============================================================
        // END OF FILE
        //============================================================

//Close and output PDF document
        $pdf->Output('example_039.pdf', 'I');


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
    }*/


    //banners
    public function banners()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }

    }

    public function banners_inactivos()
    {
    }

    public function crear_banner()
    {
    }

    public function guardar_banner()
    {
    }

    public function desactivar_banner()
    {
    }

    public function crear_banner_header()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        $data['titulo'] = 'Crear Banner Header';

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        echo $this->templates->render('admin/admin_crear_banner_header', $data);
    }

    public function guardar_banner_header()
    {
        // print_contenido($_POST);

        $titulo = $this->input->post('titulo');

        $nombre_imagen = str_replace(' ', '_', $titulo);

        $config['upload_path'] = './ui/public/images/banners';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $nombre_imagen;
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('imagen')) {
            $error = array('error' => $this->upload->display_errors());
            print_contenido($error);
            //$this->load->view('upload_form', $error);
        } else {
            $post_data = array(
                'titulo' => $titulo,
                'link' => $this->input->post('link'),
                'imagen' => $nombre_imagen,
                'area' => $this->input->post('area'),
                'vencimiento' => $this->input->post('vencimiento'),
                'estado' => $this->input->post('estado'),
            );


            //print_r($post_data);

            $this->Banners_model->crear_banners_header($post_data);
            redirect(base_url() . 'admin/banners_header/');
        }


    }

    public function banners_header()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'User/login');
        }
        if (!$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect(base_url() . 'User/perfil');
        }
        $data['banners'] = $this->Banners_model->banners_header();
        echo $this->templates->render('admin/admin_banners_header', $data);
    }

    public function editar_banner_header()
    {
        //id banner
        $data['id_banner'] = $this->uri->segment(3);
        $data['banner_data'] = $this->Banners_model->banner_header_data($data['id_banner']);
        echo $this->templates->render('admin/admin_editar_banner_header', $data);
    }

    public function actualizar_banner_header()
    {
        /* echo '<pre>';
         print_r($_POST);
         echo '</pre>';
         exit();*/
        $post_data = array(
            'id' => $this->input->post('id'),
            'titulo' => $this->input->post('titulo'),
            'link' => $this->input->post('link'),
            'imagen' => $this->input->post('imagen'),
            'area' => $this->input->post('area'),
            'vencimiento' => $this->input->post('vencimiento'),
            'estado' => $this->input->post('estado'),
        );
        //print_r($post_data);

        $this->Banners_model->actualizar_banners_header($post_data);
        redirect(base_url() . 'admin/banners_header/');
    }

    public function actualizar_banner()
    {
        $post_data = array(
            'id' => $this->input->post('id'),
            'titulo' => $this->input->post('titulo'),
            'link' => $this->input->post('link'),
            'imagen' => $this->input->post('imagen'),
            'area' => $this->input->post('area'),
            'vencimiento' => $this->input->post('vencimiento'),
            'estado' => $this->input->post('estado'),
        );
        //print_r($post_data);

        $this->Banners_model->actualizar_banners($post_data);
        redirect(base_url() . 'admin/banners/');
    }


}
