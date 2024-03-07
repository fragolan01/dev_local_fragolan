<?php

// Archivo .txt
$archivo = 'lista_ids.txt';
// Abrir el archivo en modo lectura
$manejador = fopen($archivo, 'r',FILE_IGNORE_NEW_LINES);

// Token de autenticación
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIn0.eyJhdWQiOiJ5ZmQwS1g4U1REYUtPZEJ0cHB2UG4wSWVFeUdiVW1CVCIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIiwiaWF0IjoxNzA2NTUxMzA3LCJuYmYiOjE3MDY1NTEzMDcsImV4cCI6MTczODA4NzMwNiwic3ViIjoiIiwic2NvcGVzIjpbXX0.jhALtrRj_tkgNVj6CZxuEAnWxG6qpUMeOrXZvRbLU7B5prHrc-zPmn4lLcaEDDgfWRTXHEyQrN1nRpO8EQLuBug1kUJm-mwCkPhFMb4U6c7u_S4O0WWB4bNrRv_CQpz1Vdvic1pIJB5PDurPrzG2KbHlzfogdeYWolCKFShqPH5eehoJ0MwJ5AlL83AqpFhqzeprjB0K9eGJMx3a5jc8fYZxQm7jgh1uNk4LfaapuMos23IWczeC_1uQ3Y1XW1yuYaHXY5f9N5RA_IfBULEQ-ya8UL7Bem1ntWRegx1oIQ2M1sGz5hsdyiepI313K61rGa9khk_wI9bmwBwHxca4X_sIMT_sdJ9yOVzgXMRFfG-QlvhNWK-4xDldbo52uYwxu094cwTFZijk9NmNQq-WfPNyHEzmBrL7lSmuPVSqokggA0LjvHPnXmYCz30NxonC-zSgVp_SEBcF7rw0qo5oKe7VDj0GmPHeNV9T1n8IfFo7LaALHfyw4KAwivecMh9XY5GC_IYBLWrjAwqystUW2uiVS660t7mDqvfKonFjgjZyVuakVU4MDBXOJEzF9FVahBUc_MqXVvWbiYWDtVCnzj6rwiaXzLplEFnH4ntsCveizJmcQCF-hPRKHKprEJQFfN7E1TK3kWM0Mfei_URjiklr1J0lR6NmsSvF-q165mE";
// url tipo de cambio


// Establece el límite de tiempo a 300 segundos (5 minutos)
set_time_limit(300); 

// Opciones de contexto para la solicitud HTTP
$options = array(
    'http' => array(
        'header'  => "Authorization: Bearer $token\r\n",
        'method'  => 'GET'
    )
);

// Tamaño del lote
$batch_size = 10; // Tamaño del lote para cada solicitud

// Inicializar un array para almacenar los datos de todas las solicitudes
$all_data = array();

// Total de datos que se espera recibir (este valor debe calcularse de acuerdo a tu API)
$total_expected_data = 107;


// Verificar si el archivo se abrió correctamente
if ($manejador) {
    // Leer el archivo línea por línea
    while (($linea = fgets($manejador)) !== false) {
        // Dividir la línea en tres partes usando el tabulador como delimitador
        $partes = explode("\t", $linea);
        
        // Verificar si hay dos partes (orden y producto_id)
        if (count($partes) == 3) {
            // Extraer los primeros 5 dígitos de cada número
            $orden = substr($partes[0], 0, 5);
            // $producto_id = substr($partes[1], 0, 6);
            $producto_id = trim($partes[1]);
            $ìnv_minimo = trim($partes[2]);

            // Construye la URL de la API con el producto_id actual
            $api_url = "https://developers.syscom.mx/api/v1/productos/".'67464';


            // Realizar solicitudes en lotes hasta que se reciba todo el conjunto de datos
            for ($offset = 0; $offset < $total_expected_data; $offset += $batch_size) {
                // Ajustar el tamaño del lote si es necesario para no exceder el total esperado
                $remaining_data = $total_expected_data - $offset;
                $current_batch_size = min($batch_size, $remaining_data);

                // Construir la URL con parámetros de paginación
                $url_with_pagination = $api_url . "?offset=$offset&limit=$current_batch_size";

                // Realizar la solicitud HTTP
                $response = file_get_contents($url_with_pagination, false, stream_context_create($options));

                // Verificar si la solicitud fue exitosa
                if ($response !== false) {
                    // Decodificar el JSON de la respuesta y agregarlo al array de datos
                    $data = json_decode($response, true);

                    // Verificar si la decodificación fue exitosa
                    if ($data !== null) {
                        // Agregar los datos al array de datos
                        $all_data = array_merge($all_data, $data);
                    } else {
                        // Manejar el caso en que la decodificación falla
                        echo "Error: No se pudo decodificar la respuesta JSON.";
                    }

                } else {
                    // Manejar el caso en que la solicitud falla
                    echo "Error al realizar la solicitud para el lote de datos comenzando en el índice $offset.";
                    // break; // Para detener el bucle si una solicitud falla
                }

            }
        }
    }


   // Mostrar los resultados en el navegador
   echo "<table border='1'>";
   echo "<tr><th>Orden</th><th>Producto ID</th><th>Inventario Mínimo</th></tr>";
   foreach ($all_data as $dato) {
       echo "<tr>";
    //    echo "<td>{$dato['orden']}</td>";
       echo "<td>{$dato['producto_id']}</td>";
    //    echo "<td>{$dato['inventario_minimo']}</td>";
       echo "</tr>";
   }
   echo "</table>";

  
} else {
    // Si no se puede abrir el archivo, mostrar un mensaje de error
    echo "Error: No se pudo abrir el archivo.\n";
    // Ahora $all_data contiene todos los datos recuperados de la API
    var_dump($all_data);       
}

?>
