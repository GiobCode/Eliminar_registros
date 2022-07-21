<?php 

include("conexion_bs.php");

if(isset($_GET['search']))
{

    $id = $_GET['search'];

    $elim = $miPDO->prepare("DELETE FROM habitaciones where id_habitacion = '$id';");
    $elim->execute();
    $elim_r = $miPDO->prepare("DELETE FROM servicios where id_habitacion = '$id';");
    $elim_r->execute();

    header("Location:habitaciones.php");
}
?>
