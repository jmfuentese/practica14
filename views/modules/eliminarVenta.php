<?php

$idT = $_GET["idVenta"];

$res = DatosProd::deleteSsaleModel("ventas", $idT);

if ($res){
    echo "<script>alert('Venta eliminada')</script>";
    echo "<script>window.location.href = 'index.php?action=ventas'</script>";
}else{
    echo "<script>alert('Ocurrio un problema')</script>";
    echo "<script>window.location.href = 'index.php?action=ventas'</script>";
}


?>