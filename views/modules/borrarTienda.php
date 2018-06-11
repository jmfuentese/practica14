<?php

$idT = $_GET["idTienda"];

$res = DatosProd::deleteStoreModel("tienda", $idT);

if ($res){
    echo "<script>alert('Tienda eliminada')</script>";
    echo "<script>window.location.href = 'index.php?action=tiendas'</script>";
}else{
    echo "<script>alert('Ocurrio un problema')</script>";
    echo "<script>window.location.href = 'index.php?action=tiendas'</script>";
}


?>