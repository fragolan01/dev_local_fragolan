<?php
// Ruta del archivo de texto
$ruta_archivo = 'lista_ids.txt';
$id_dominio=9999;

set_time_limit(300); // Establece el límite de tiempo a 300 segundos (5 minutos)


// Comprueba si el archivo existe
if (file_exists($ruta_archivo)) {
    // Lee el contenido del archivo y lo guarda en un array
    $numeros = file($ruta_archivo, FILE_IGNORE_NEW_LINES);

    // Token de autenticación
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIn0.eyJhdWQiOiJ5ZmQwS1g4U1REYUtPZEJ0cHB2UG4wSWVFeUdiVW1CVCIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIiwiaWF0IjoxNzA2NTUxMzA3LCJuYmYiOjE3MDY1NTEzMDcsImV4cCI6MTczODA4NzMwNiwic3ViIjoiIiwic2NvcGVzIjpbXX0.jhALtrRj_tkgNVj6CZxuEAnWxG6qpUMeOrXZvRbLU7B5prHrc-zPmn4lLcaEDDgfWRTXHEyQrN1nRpO8EQLuBug1kUJm-mwCkPhFMb4U6c7u_S4O0WWB4bNrRv_CQpz1Vdvic1pIJB5PDurPrzG2KbHlzfogdeYWolCKFShqPH5eehoJ0MwJ5AlL83AqpFhqzeprjB0K9eGJMx3a5jc8fYZxQm7jgh1uNk4LfaapuMos23IWczeC_1uQ3Y1XW1yuYaHXY5f9N5RA_IfBULEQ-ya8UL7Bem1ntWRegx1oIQ2M1sGz5hsdyiepI313K61rGa9khk_wI9bmwBwHxca4X_sIMT_sdJ9yOVzgXMRFfG-QlvhNWK-4xDldbo52uYwxu094cwTFZijk9NmNQq-WfPNyHEzmBrL7lSmuPVSqokggA0LjvHPnXmYCz30NxonC-zSgVp_SEBcF7rw0qo5oKe7VDj0GmPHeNV9T1n8IfFo7LaALHfyw4KAwivecMh9XY5GC_IYBLWrjAwqystUW2uiVS660t7mDqvfKonFjgjZyVuakVU4MDBXOJEzF9FVahBUc_MqXVvWbiYWDtVCnzj6rwiaXzLplEFnH4ntsCveizJmcQCF-hPRKHKprEJQFfN7E1TK3kWM0Mfei_URjiklr1J0lR6NmsSvF-q165mE";

    // Configurar opciones para la solicitud HTTP
    $options = array(
        'http' => array(
            'header'  => "Authorization: Bearer $token\r\n",
            'method'  => 'GET'
        )
    );

    // Crear contexto de flujo
    $context = stream_context_create($options);

    // Itera sobre el array y realiza la consulta a la API con cada número
    foreach ($numeros as $numero) {
        // Construye la URL de la API con el número actual
        $api_url = "https://developers.syscom.mx/api/v1/productos/".$numero;

        // Realiza la consulta a la API con el token de autenticación
        $response = file_get_contents($api_url, false, $context);

        // Verificar si la consulta fue exitosa
        if ($response === FALSE) {
            // Manejar el error si la consulta falla
            echo "Error al consultar la API SYSCOM para el número $producto_id<br>";
        } else {
            // Procesa los datos recibidos (en este ejemplo asumimos que la respuesta es en JSON)
            $data = json_decode($response, true);
            
                      
        }

        // Decodificar el JSON en un array asociativo
        $array = json_decode($response, true);
        $precios = $array['precios'];
                            
        if (is_array($precios) && array_key_exists('precio_descuento', $precios)) {
            // Guarda el precio_descuento para imprimirlo al final
            $precio_descuento = $precios['precio_descuento'];
        } else {
            echo "No se pudo acceder al precio de descuento.<br>";
        }

        // Verifica si la decodificación tuvo éxito
        if ($data === null) {
            echo 'Error al decodificar el JSON para el número $numero<br>';
        } else {
            // Accede a los datos y muestra la información
            echo "Producto_id: ".$data['producto_id']."<br>";
            echo "Stock: ".$data['total_existencia']."<br>";
            // Imprime el precio_descuento si está disponible
            if (isset($precio_descuento)) {
                echo "PRECIO: " . $precio_descuento . "<br>";
            }
            echo "<br>";
      
            
        }
}
} else {
    echo "El archivo no existe.";
}
?>
