<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/ConBdMysql.php';
require_once PATH . 'modelos/modeloTickets/TicketsDAO.php';

session_start();
$ticketNuevo = $_SESSION['ticketNuevo'];

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 150]]);
$data .= '<img width = "100px" src = "../LogoGrandeW&B.png" style="margin: 0 50px;"/>';
$data .= '<h2 style="text-align:center">Bienvenido a EasyParking</h2>';


$buscarTicket = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$datosTicket = $buscarTicket -> seleccionarID(array($ticketNuevo));

$data .= '------------------------------------------';
$data .= '<h4 style= "margin: 0 35px">Datos del ticket</h4>';
$data .= '<p style="font-size:15px">Número Ticket: '.$datosTicket['registroEncontrado'][0] -> ticNumero.'</p>';
$data .= '<p>Placa del vehículo: '.$datosTicket['registroEncontrado'][0] -> vehNumero_Placa.'</p>';
$data .= '<p>Fecha: '.$datosTicket['registroEncontrado'][0] -> ticFecha.'</p>';
$data .= '<p>Hora Ingreso: '.$datosTicket['registroEncontrado'][0] -> ticHoraIngreso.'</p>';
$data .= '------------------------------------------';
$data .= '<p style="font-size:10px">Debera conserver este tiquete para la salida del vehículo, 
        si pierde el tiquete deberá presentar la tarjeta de propiedad y la identificación 
        de la persona que retira el vehículo, gracias.</p>';

echo "<pre>";
print_r($datosTicket['registroEncontrado']);
echo "</pre>";

$mpdf->WriteHTML($data);
ob_end_clean();
$mpdf->Output();

unset($_SESSION['ticketNuevo']);

?>