<?php

$idC = $_GET["idCategoria"];

$res = DatosProd::deleteCategoryModel("categoria", $idC);

if ($res){
    echo "<script>alert('Categoria eliminada')</script>";
    echo "<script>window.location.href = 'index.php?action=categorias'</script>";
}else{
    echo "<script>alert('Ocurrio un problema')</script>";
    echo "<script>window.location.href = 'index.php?action=categorias'</script>";
}


?>