<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/ConBdMysql.php';
require_once PATH . 'modelos/modeloTickets/TicketsDAO.php';

session_start();
$ticketNuevo = $_SESSION['ticketCerrado'];

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 150]]);
$data .= '<img width = "100px" src = "../LogoGrandeW&B.png" style="margin: 0 50px;"/>';
$data .= '<h2 style="text-align:center">Recibo de Pago</h2>';


$buscarTicket = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$datosTicket = $buscarTicket -> seleccionarID(array($ticketNuevo));


$data .= '------------------------------------------';
$data .= '<h4 style= "margin: 0 35px 10px">Datos del ticket</h4>';
$data .= '<p style="margin: 5px 0">Número Ticket: '.$datosTicket['registroEncontrado'][0] -> ticNumero.'</p>';
$data .= '<p style="margin: 5px 0">Placa del vehículo: '.$datosTicket['registroEncontrado'][0] -> vehNumero_Placa.'</p>';
$data .= '<p style="margin: 5px 0">Fecha: '.$datosTicket['registroEncontrado'][0] -> ticFecha.'</p>';
$data .= '<p style="margin: 5px 0">Hora Ingreso: '.$datosTicket['registroEncontrado'][0] -> ticHoraIngreso.'</p>';
$data .= '<p style="margin: 5px 0">Hora Salida: '.$datosTicket['registroEncontrado'][0] -> ticHoraSalida.'</p>';
$data .= '<p style="margin: 5px 0">Valor Pagado: $'.$datosTicket['registroEncontrado'][0] -> ticValorFinal.'</p>';
$data .= '------------------------------------------';
$data .= '<h2 style="text-align:center">¡Gracias por su visita!</h2>';

echo "<pre>";
print_r($datosTicket['registroEncontrado']);
echo "</pre>";

$mpdf->WriteHTML($data);
ob_end_clean();
$mpdf->Output();

unset($_SESSION['ticketCerrado']);

?>