<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

//session_start();
array_splice($_SESSION["carrito"], $indice, 1);
//header("Location: ./vender.php?status=3");
echo "<script>window.location.href = 'index.php?action=vender?status=3'</script>";
?>