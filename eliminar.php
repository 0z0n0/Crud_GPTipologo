<?php
if(!isset($_GET['codigo'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("DELETE from persona where codigo = ?; ");
$resultado = $sentencia->execute([$codigo]);

if ($resultado === TRUE) {
    header("Location: index.php?mensaje=eliminado");
} else {
    header("Location: index.php?mensaje=error");
    exit();
}
?>