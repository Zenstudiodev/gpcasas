<?php
//generar pdf
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GP Compras');
$pdf->SetTitle('Informacion de propiedad -GP casas ');
$pdf->SetSubject('Solicitud de pago por planilla');
$pdf->SetKeywords('GP compras');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
// remove default footer
$pdf->setPrintFooter(false);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set bacground image
// set bacground image
//$img_file = K_PATH_IMAGES.'image_demo.jpg';
$img_file = '/home2/gpautos/gpcasas/ui/public/images/pdf/fondo_info_pdf.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


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
$html .= '<div class="forma_pdf" style=" width: 800px; background: #9e2f0b; padding-top:5cm;     font-family: Arial;">';
$html .= '<div id="table_container" style="">';
$html .= '<table style="width: 100%; background: #9e2f0b;" border="1">';
$html .= '<tbody>';
$html .= '<tr><td colspan="2" style="text-align: center;padding: 0.5cm 0cm;"><a href="https://gpcasas.net">GPCASA.NET</a></td></tr>';
$html .= '<tr><td rowspan="4"><div id="img_wraper" style="width: 14cm; height: 10cm;overflow: hidden;"><img src="' . $imagen_propiedad . '"style="width: 14cm;"></div></td><td class="t_header"><b>PROPUESTA</b>005</td></tr>';
$html .= '<tr><td class="t_header"><b>CODIGO</b>156</td></tr>';
$html .= '<tr><td class="t_header"><b>VALOR</b>$750.00</td></tr>';
$html .= '<tr><td class="t_header"><b>FECHA</b>2/12/2021</td></tr>';
$html .= '</table>';
$html .= '</tbody>';
$html .= '<table>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<td>Cliente:</td>';
$html .= '<td>' . $nombre_cliente . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Correo</td>';
$html .= '<td>' . $correo_cliente . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Telefono</td>';
$html .= '<td>' . $telefono_cliente . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>Tipo de inmueble: ' . $tipo_inmueble . '</td>';
$html .= '<td>Tipo de Negociación: ' . $tipo_negociacion . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="2">Ubicación: ' . $ubicacion . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="2">Departamento: ' . $departamento . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>Baños completos: ' . $banos_completos . '</td>';
$html .= '<td>Comedor: ' . $comedor . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Baño visitas: ' . $banos_visitas . '</td>';
$html .= '<td>Lavanderia: ' . $lavanderia . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td>Sala: ' . $sala . '</td>';
$html .= '<td>Habitaciones: ' . $habitaciones . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Agua potable: ' . $agua_potable . '</td>';
$html .= '<td>Sala Familiar: ' . $sala_familiar . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Parqueo: ' . $parqueo . '</td>';
$html .= '<td>Cuarto de Servicio: ' . $cuarto_servicio . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Cocina: ' . $cocina . '</td>';
$html .= '<td>Walking Closet: </td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Niveles: ' . $niveles . '</td>';
$html .= '<td>Pérgola: ' . $pergola . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Balcon: ' . $balcon . '</td>';
$html .= '<td>Garita de Seguridad: ' . $garita_seguridad . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Cancha de Fut: </td>';
$html .= '<td>Amenidades: </td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Juegos Infantiles: </td>';
$html .= '<td>Seguridad privada: ' . $seguridad_privada . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Camaras de seguridad: ' . $banos_completos . '</td>';
$html .= '<td>Mantenimiento: ' . $mantenimiento . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>Observaciones: </td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>' . $observaciones . '</td>';
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
$pdf->Output('example_051.pdf', 'I');
