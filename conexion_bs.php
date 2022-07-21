<?php
   $hostDB = '127.0.0.1';
   $nombreDB = 'bs_system_hotel';
   $usuarioDB = 'root';
   $contrasenyaDB = '';
   
   $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";

   if(!$hostPDO)
   {
        echo "Error al realizar la conexion".mysql_connect_error();
   }

   $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
?>
