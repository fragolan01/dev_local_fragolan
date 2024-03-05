
SELECT id_syscom, stock, inv_min, status, id_syscom, EXTRACT(DAY FROM fecha) AS dia, EXTRACT(MONTH FROM fecha) AS mes, MAX(fecha) AS fecha FROM plataforma_ventas_temp WHERE status = 0 ORDER BY orden;



SELECT id_syscom, stock, inv_min, status, id_syscom,  MAX(fecha) AS fecha FROM plataforma_ventas_temp WHERE status = 0 ORDER BY orden;

SELECT id_syscom, stock, inv_min, status, id_syscom,  MAX(fecha) AS fecha FROM plataforma_ventas_temp WHERE status = 0 ORDER BY orden;

SELECT MAX(fecha) AS dia FROM plataforma_ventas_temp WHERE status=0 ORDER BY orden;




SELECT 
    id_syscom,
    stock,
    inv_min,
    status,
    dia,
    mes,
    fecha
FROM 
    plataforma_ventas_temp AS t1
WHERE
    t1.fecha = (
        SELECT MAX(t2.fecha)
        FROM tu_tabla AS t2
        WHERE t1.id_syscom = t2.id_syscom
    )
    AND status = 1
    AND dia = 5
    AND mes = 3;





SELECT id_syscom, stock, inv_min, status, fecha FROM plataforma_ventas_temp AS t1 WHERE t1.fecha = (SELECT MAX(t2.fecha) FROM plataforma_ventas_temp AS t2 WHERE t1.id_syscom = t2.id_syscom) AND status = 1;

/* consulta por fecha mas rciente la mera buena */
SELECT id_syscom, stock, inv_min, status, fecha, orden FROM plataforma_ventas_temp AS t1 WHERE t1.fecha = (SELECT MAX(t2.fecha) FROM plataforma_ventas_temp AS t2 WHERE t1.id_syscom = t2.id_syscom) AND status = 0 ORDER BY orden;




SELECT id_syscom, stock, inv_min, status, fecha, orden 
FROM plataforma_ventas_temp AS t1 
WHERE t1.fecha = (
    SELECT MAX(t2.fecha) 
    FROM plataforma_ventas_temp AS t2 
    WHERE t1.id_syscom = t2.id_syscom
) 
AND status = 0 
ORDER BY orden;
