<?

    require($laraiz."config.php");
    // echo "hola desde index.php OKOK ";

    // alv agrega la consulta de la API SYSCOM
    require($laraiz."crea_bd_fragolan_syscom.php");



    require($laraiz."plataforma_ventas_proveedores.php");

    // alv agrega plataforma ventas envios
    require($laraiz."plataforma_ventas_envios.php");

    // alv agrega plataforma ventas marcas
    require($laraiz."plataforma_ventas_marcas.php");

    // alv agrega plataforma ventas categos
    require($laraiz."plataforma_ventas_categos.php");

    // alv agrega plataforma ventas Sub categos
    require($laraiz."plataforma_ventas_sub_categos.php");

    // alv agrega plataforma ventas plataformas
    require($laraiz."plataforma_ventas_plataformas.php");

    // alv agrega plataforma ventas plataformasm publicidad
    require($laraiz."plataforma_ventas_plataformas_publicidad.php");

    // alv agrega plataforma_ventas_productos
    require($laraiz."plataforma_ventas_productos.php");

    // alv agrega plataforma_ventas_stock
    require($laraiz."plataforma_ventas_stock.php");

    // alv agrega plataforma_ventas_precio
    require($laraiz."plataforma_ventas_precio.php");

    // alv agrega plataforma_ventas_precio
    require($laraiz."plataforma_ventas_tipo_cambio.php");

    // alv agrega la consulta de la API SYSCOM
    require($laraiz."consulta_api.php");


    echo "<br><br><font size=1>Copyright: Fragolan LP 2024</font>";

?>cadenavars.php