<?php
if(!isset($_POST["total"])) exit;


//session_start();


$total = $_POST["total"];


$venta = DatosProd::terminarVenta("ventas", $total);



$venta = DatosProd::getVenta();


$idVenta = $venta === false ? 1 : $venta->id;

$productosVendidos = DatosProd::productosVendidos($total, $idVenta);

$existencia = DatosProd::existencia($total, $idVenta);

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

echo "<script>window.location.href = 'index.php?action=ventas&status=1'</script>";
?>