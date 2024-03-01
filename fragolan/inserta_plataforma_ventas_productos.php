<?
    $sql_plataforma_ventas_productos_master_inserta = "INSERT INTO plataforma_ventas_productos(id_dominio, producto, modelo, num_piezas, inventario_minimo, precio_venta, descuento, comision_plataforma, fijo_plataforma, id_campania, id_costo_envio, url_proveedor_1, url_proveedor_2, url_proveedor_3, url_proveedor_4, url_proveedor_5, url_proveedor_6, observaciones) "."VALUES
    ('$id_dominio','$producto', '$modelo', '$num_piezas', '$inventario_minimo', '$precio_venta', '$descuento', '$comision_plataforma', '$fijo_plataforma', '$id_campania', '$id_costo_envio', '$url_proveedor_1', '$url_proveedor_2', '$url_proveedor_3', '$url_proveedor_4', '$url_proveedor_5', '$url_proveedor_6', '$observaciones')";
    $result_plataforma_ventas_productos_master_inserta = mysql_query($sql_plataforma_ventas_productos_master_inserta);

?>
