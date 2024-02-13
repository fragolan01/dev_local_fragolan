<?
$sql_plataforma_ventas_envios_master_inserta = "INSERT INTO plataforma_ventas_envios(id_dominio,id_proveedor,id_envio,nombre,costo, moneda) "."VALUES ('$id_dominio','$id_proveedor','$id_envio','$nombre','$costo','$moneda')";
$result_plataforma_ventas_envios_master_inserta = mysql_query($sql_plataforma_ventas_envios_master_inserta);
?>