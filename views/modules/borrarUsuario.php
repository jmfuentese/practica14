<?php

$idU = $_GET["idUsuario"];

$res = DatosProd::deleteUserModel("users", $idU);

if ($res){
    echo "<script>alert('Usuario eliminado')</script>";
    echo "<script>window.location.href = 'index.php?action=usuarios'</script>";
}else{
    echo "<script>alert('Ocurrio un problema')</script>";
    echo "<script>window.location.href = 'index.php?action=usuarios'</script>";
}


?>