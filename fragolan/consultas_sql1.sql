select * from plataforma_ventas_temp where status=0;

select * from plataforma_ventas_temp where status=0 and DATE_ADD("2024-03-05") AS fecha;

SELECT MONTH(fecha), DAY(fecha) FROM plataforma_ventas_temp;

SELECT MONTH(fecha), DAY(fecha), YEAR(fecha) FROM plataforma_ventas_temp;

SELECT 3, 5, YEAR(fecha), id_syscom FROM plataforma_ventas_temp where status=0;


 SELECT 3, 5, id_syscom FROM plataforma_ventas_temp where status=0 ORDER BY orden;

  SELECT 03, 05, id_syscom FROM plataforma_ventas_temp where status=0 ORDER BY orden unique orden;


  SELECT id_syscom FROM plataforma_ventas_temp WHERE status = 0 ORDER BY orden;


SELECT 
    id_syscom,
    EXTRACT(DAY FROM fecha_columna) AS dia,
    EXTRACT(MONTH FROM fecha_columna) AS mes,
    fecha_columna
FROM 
    plataforma_ventas_temp
WHERE 
    status = 0
ORDER BY 
    orden;




/* consulta por fechas */
SELECT id_syscom, EXTRACT(DAY FROM fecha) AS dia, EXTRACT(MONTH FROM fecha) AS mes, fecha FROM plataforma_ventas_temp WHERE status = 0 AND EXTRACT(DAY FROM fecha) = 5 AND EXTRACT(MONTH FROM fecha) = 3 ORDER BY orden;




SELECT status, EXTRACT(DAY FROM fecha) AS dia, EXTRACT(MONTH FROM fecha) AS mes, fecha FROM plataforma_ventas_temp WHERE id_syscom = 196541 AND EXTRACT(DAY FROM fecha) = 5 AND EXTRACT(MONTH FROM fecha) = 3 ORDER BY orden;



 SELECT id_syscom, stock, inv_min, status, EXTRACT(DAY FROM fecha) AS dia, EXTRACT(MONTH FROM fecha) AS mes, fecha FROM plataforma_ventas_temp WHERE id_syscom = 194840 AND EXTRACT(DAY FROM fecha) = 5 AND EXTRACT(MONTH FROM fecha) = 3 ORDER BY orden;


| id_syscom | stock | inv_min | status | dia  | mes  | fecha               |
+-----------+-------+---------+--------+------+------+---------------------+
|    194840 |    62 |      25 |      1 |    5 |    3 | 2024-03-05 08:51:09


SELECT id_syscom, stock, inv_min, status, dia, mes, MAX(fecha) AS fecha_actualizada FROM plataforma_ventas_temp WHERE status = 0 AND dia = 5 AND mes = 3 GROUP BY id_syscom, stock, inv_min, status, dia, mes;



SELECT 
    id_syscom,
    stock,
    inv_min,
    status,
    dia,
    mes,
    MAX(fecha) AS fecha_actualizada
FROM 
    tu_tabla
WHERE 
    status = 1
    AND dia = 5
    AND mes = 3
GROUP BY
    id_syscom, stock, inv_min, status, dia, mes;



SELECT 
    id_syscom,
    stock,
    inv_min,
    status,
    dia,
    mes,
    fecha
FROM 
    tu_tabla AS t1
WHERE
    t1.fecha = (
        SELECT MAX(t2.fecha)
        FROM tu_tabla AS t2
        WHERE t1.id_syscom = t2.id_syscom
    )
    AND status = 1
    AND dia = 5
    AND mes = 3;



/* Seleccionando T.C fecha a ultima fecha */
SELECT fecha, normal 
FROM plataforma_ventas_tipo_cambio AS t1 
WHERE t1.fecha = (
    SELECT MAX(t1.fecha) 
    FROM plataforma_ventas_tipo_cambio AS t1 
);


SELECT fecha, normal FROM plataforma_ventas_tipo_cambio;