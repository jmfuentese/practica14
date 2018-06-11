<?php

$idP = $_GET["idProducto"];

$res = DatosProd::deleteProductModel("productos", $idP);

if ($res){
    echo "<script>alert('Producto eliminado')</script>";
    echo "<script>window.location.href = 'index.php?action=inventario'</script>";
}else{
    echo "<script>alert('Ocurrio un problema')</script>";
    echo "<script>window.location.href = 'index.php?action=inventario'</script>";
}


?>