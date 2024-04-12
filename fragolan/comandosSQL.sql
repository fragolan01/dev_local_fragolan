/* Modifica tablas */
ALTER TABLE plataforma_ventas_precio DROP COLUMN id_producto;
ALTER TABLE plataforma_ventas_temp add COLUMN id_syscom int;
ALTER TABLE plataforma_ventas_temp MODIFY COLUMN fecha timestamp;
ALTER TABLE plataforma_ventas_precio MODIFY fecha timestamp NOT NULL;

ALTER TABLE plataforma_ventas_temp MODIFY COLUMN precio  DEC(10,2);

ALTER TABLE plataforma_ventas_precio MODIFY COLUMN precio  DOUBLE;
ALTER TABLE plataforma_ventas_tipo_cambio MODIFY fecha timestamp NOT NULL;
ALTER TABLE plataforma_ventas_tipo_cambio MODIFY COLUMN normal  DEC(5,2);

ALTER TABLE plataforma_ventas_temp ADD COLUMN mxn_tot_venta DEC(10,10);
/* DELETE */
ALTER TABLE plataforma_ventas_temp DROP COLUMN mxn_tot_venta;
/* ADD COLUMN  */
ALTER TABLE plataforma_ventas_temp ADD COLUMN mxn_tot_venta DEC(10,6);




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


/* Consulta precio actual y precio dia anterior */
SELECT 
    t1.status, 
    t1.id_syscom, 
    t1.titulo, 
    t1.stock, 
    t1.inv_min, 
    t1.fecha, 
    t1.precio AS precio_hoy, 
    t1.orden,
    (SELECT fecha FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS fecha_anterior,
    (SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS precio_anterior
FROM (
    SELECT 
        status, 
        id_syscom, 
        titulo, 
        stock, 
        inv_min, 
        fecha, 
        precio, 
        orden,
        ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
    FROM plataforma_ventas_temp
) AS t1
WHERE t1.rn = 1
ORDER BY t1.orden;

/* Consulta Diferencia = Precio_hoy-precio_ayer  */
/* Black boox */

SELECT
    t1.orden,
    t1.fecha,
    t1.id_syscom,
    t1.titulo,
    t1.stock,
    t1.inv_min,
    t1.status,
    t1.precio AS precio_hoy,
    (SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS precio_anterior,
    t1.precio - COALESCE((SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1), 0) AS precio_difference
FROM (
    SELECT
        status,
        id_syscom,
        titulo,
        stock,
        inv_min,
        fecha,
        precio,
        orden,
        ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
    FROM plataforma_ventas_temp
) AS t1
WHERE t1.rn = 1
ORDER BY t1.orden


/* Inseciones */
SELECT status, id_syscom, titulo, stock, inv_min, fecha, precio, orden  
FROM plataforma_ventas_temp AS t1 WHERE t1.fecha = 
(SELECT MAX(t2.fecha) FROM plataforma_ventas_temp AS t2 WHERE t1.id_syscom = t2.id_syscom) 
ORDER BY orden

INSERT INTO plataforma_ventas_temp (id_syscom, precio) SELECT '194827', 2905.25 FROM dual WHERE NOT EXISTS (SELECT * FROM plataforma_ventas_temp WHERE id_syscom = '194827');

INSERT INTO plataforma_ventas_temp (id_syscom, precio, fecha) SELECT MAX(fecha) '93452' , 5.5; 

INSERT INTO plataforma_ventas_temp (id_syscom, precio, fecha) 
SELECT '93452', 5.5, MAX(fecha) FROM plataforma_ventas_temp;

INSERT INTO plataforma_ventas_temp (id_syscom, precio, fecha) 
SELECT '204626', 95.5, MAX(fecha) FROM plataforma_ventas_temp;


/* Modificando consulta */

SELECT 
    t1.status, 
    t1.id_syscom, 
    t1.titulo, 
    t1.stock, 
    t1.inv_min, 
    t1.fecha, 
    t1.precio AS precio_hoy, 
    t1.orden,
    (SELECT fecha FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS fecha_anterior,
    (SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS precio_anterior
FROM (
    SELECT 
        status, 
        id_syscom, 
        titulo, 
        stock, 
        inv_min, 
        fecha, 
        precio, 
        orden,
        ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
    FROM plataforma_ventas_temp
) AS t1
WHERE t1.rn = 1
ORDER BY t1.orden;
