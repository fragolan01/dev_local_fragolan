/* Modifica tablas */
ALTER TABLE plataforma_ventas_precio DROP COLUMN id_producto;
ALTER TABLE plataforma_ventas_temp add COLUMN id_syscom int;
ALTER TABLE plataforma_ventas_temp MODIFY COLUMN fecha timestamp;
ALTER TABLE plataforma_ventas_precio MODIFY fecha timestamp NOT NULL ;
ALTER TABLE plataforma_ventas_temp MODIFY COLUMN precio  DEC(10,2);
ALTER TABLE plataforma_ventas_precio MODIFY COLUMN precio  DOUBLE;



/* Select */
SELECT FORMAT((SELECT precio FROM plataforma_ventas_temp LIMIT 1), 2);

SELECT '204626', 288.03
FROM dual
WHERE NOT EXISTS (
    SELECT * FROM plataforma_ventas_temp WHERE id_syscom = '204626'
);

/* Actualiza */
UPDATE plataforma_ventas_temp SET precio = 26.03 WHERE id_syscom = '204626';
UPDATE plataforma_ventas_temp SET precio = 26.33 WHERE id_syscom = '204626';

/* Inset */
INSERT INTO plataforma_ventas_temp (id_syscom, precio)
INSERT INTO plataforma_ventas_temp (id_syscom, precio) SELECT '194827', 2905.25 FROM dual WHERE NOT EXISTS (SELECT * FROM plataforma_ventas_temp WHERE id_syscom = '194827');
INSERT INTO plataforma_ventas_precio (id_syscom, precio) SELECT '194827', 2905.25 FROM dual WHERE NOT EXISTS (SELECT * FROM plataforma_ventas_temp WHERE id_syscom = '194827');




$sql = "INSERT INTO plataforma_ventas_temp (id_dominio, id_syscom, orden, fecha, stock, precio, inv_min, status, titulo) 
        VALUES ('$id_dominio', '$int_producto_id', '$int_orden', NOW(), '$int_stock','$float_precio_descuento','$int_inv_minimo', '$status', '$data_text')"
        

$sql = "SELECT status, id_syscom, titulo, stock, inv_min, fecha, (precio - (precio * 0.04)) AS precio_con_descuento, orden  
        FROM plataforma_ventas_temp AS t1 WHERE t1.fecha = 
        (SELECT MAX(t2.fecha) FROM plataforma_ventas_temp AS t2 WHERE t1.id_syscom = t2.id_syscom) 
        ORDER BY orden";

($float_precio_descuento-($precio_descuento * $descuento))


// Calcular el descuento
$precio_con_descuento = $float_precio_descuento - ($precio_descuento * $descuento);

// Imprimir el resultado
echo "Precio con descuento: " . $precio_con_descuento;
