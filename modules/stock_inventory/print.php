<?php
session_start();
ob_start();

require '../../vendor/autoload.php'; // Ajusta la ruta si es necesario
require_once "../../config/database.php";

use Dompdf\Dompdf;
use Dompdf\Options;

include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");
$no = 1;

// Realiza la consulta a la base de datos
$query = mysqli_query($mysqli, "SELECT codigo, nombre, precio_compra, precio_venta, unidad, stock FROM medicamentos ORDER BY nombre ASC")
                                or die('Error '.mysqli_error($mysqli));
$count = mysqli_num_rows($query);

// Configuración de Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true); // Para permitir cargar recursos externos
$dompdf = new Dompdf($options);

// Generar el contenido HTML
$html = '
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>INFORME DE STOCK DE PRODDUCTOS</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           STOCK DE PRODUCTOS
        </div>
        <hr><br>
        <div id="isi">
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>CODIGO</th>
                        <th>MEDICAMENTO</th>
                        <th>PRECIO DE COMPRA</th>
                        <th>PRECIO DE VENTA</th>
                        <th>STOCK</th>
                        <th>UNIDAD</th>
                    </tr>
                </thead>
                <tbody>';
                
while ($data = mysqli_fetch_assoc($query)) {
    $precio_compra = format_rupiah($data['precio_compra']);
    $precio_venta = format_rupiah($data['precio_venta']);
    $html .= "<tr>
                <td>$no</td>
                <td>{$data['codigo']}</td>
                <td>{$data['nombre']}</td>
                <td>$. $precio_compra</td>
                <td>$. $precio_venta</td>
                <td>{$data['stock']}</td>
                <td>{$data['unidad']}</td>
              </tr>";
    $no++;
}

$html .= '        </tbody>
            </table>
        </div>
    </body>
</html>';

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño del papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("INFORME_DE_STOCK.pdf", array("Attachment" => 0)); // Cambia a 1 para descargar el archivo

ob_end_flush();
?>
