<?php

$servername = "localhost"; // Servidor de base de datos
$username = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$database = "fragcom_develop"; // base de datos

// Conexion abase de datos
$conn = new mysqli($servername, $username, $password, $database);
// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Token de autenticación
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIn0.eyJhdWQiOiJ5ZmQwS1g4U1REYUtPZEJ0cHB2UG4wSWVFeUdiVW1CVCIsImp0aSI6IjM1NmU3OTkwNmJkYjJjYWNhYTJjMWM5MjZmZGNjM2M4ZmEzNzQ4ZGY0Y2VjZWUxOGQzMWFlY2Q3MWViODJmMjFmMWY3ZDBhMGJlZDk1NzkxIiwiaWF0IjoxNzA2NTUxMzA3LCJuYmYiOjE3MDY1NTEzMDcsImV4cCI6MTczODA4NzMwNiwic3ViIjoiIiwic2NvcGVzIjpbXX0.jhALtrRj_tkgNVj6CZxuEAnWxG6qpUMeOrXZvRbLU7B5prHrc-zPmn4lLcaEDDgfWRTXHEyQrN1nRpO8EQLuBug1kUJm-mwCkPhFMb4U6c7u_S4O0WWB4bNrRv_CQpz1Vdvic1pIJB5PDurPrzG2KbHlzfogdeYWolCKFShqPH5eehoJ0MwJ5AlL83AqpFhqzeprjB0K9eGJMx3a5jc8fYZxQm7jgh1uNk4LfaapuMos23IWczeC_1uQ3Y1XW1yuYaHXY5f9N5RA_IfBULEQ-ya8UL7Bem1ntWRegx1oIQ2M1sGz5hsdyiepI313K61rGa9khk_wI9bmwBwHxca4X_sIMT_sdJ9yOVzgXMRFfG-QlvhNWK-4xDldbo52uYwxu094cwTFZijk9NmNQq-WfPNyHEzmBrL7lSmuPVSqokggA0LjvHPnXmYCz30NxonC-zSgVp_SEBcF7rw0qo5oKe7VDj0GmPHeNV9T1n8IfFo7LaALHfyw4KAwivecMh9XY5GC_IYBLWrjAwqystUW2uiVS660t7mDqvfKonFjgjZyVuakVU4MDBXOJEzF9FVahBUc_MqXVvWbiYWDtVCnzj6rwiaXzLplEFnH4ntsCveizJmcQCF-hPRKHKprEJQFfN7E1TK3kWM0Mfei_URjiklr1J0lR6NmsSvF-q165mE";

//Dominio
$id_dominio=9999;

// Fecha
date_default_timezone_set('America/Mexico_city');
$fecha = $fecha = new DateTime();

// url tipo de cambio
$tipo_de_cambio = "https://developers.syscom.mx/api/v1/tipocambio";

// Configurar opciones para la solicitud HTTP
$options = array(
    'http' => array(
        'header'  => "Authorization: Bearer $token\r\n",
        'method'  => 'GET'
    )
);

// Crear contexto de flujo
$context = stream_context_create($options);
$response_tc = file_get_contents($tipo_de_cambio, false, $context);

// Verificar si la consulta fue exitosa
if ($response_tc === FALSE) {
    // Manejar el error si la consulta falla
    $result = array('error' => 'Error al consultar la API SYSCOM');
} else {
    // Procesar los datos recibidos
    $data = json_decode($response_tc, true);

    // Verificar si la decodificación tuvo éxito
    if ($data === null) {
        die('Error al decodificar el JSON');
    }

    // Acceder a los datos
    echo "TIPO DE CAMBIO: ".$data['normal']."<br><br> ";
    $float_tc = floatval($data['normal']);

    // Insertando datos en tabla plataforma_ventas_temp
    $sql = "INSERT INTO plataforma_ventas_tipo_cambio (id_dominio, fecha, normal) 
                 VALUES ('$id_dominio', NOW(), '$float_tc')";

    if ($conn->query($sql) === TRUE) {
        // Si la interceccion fue exitosa  
        $conn->commit();
        echo "Tipo de cambio insertado correctamente.";
    } else {
        // Si falla la inserción en plataforma_ventas_precio, hacer rollback
        $conn->rollback();
        echo "Error al insertar tipo de cambio plataforma_ventas_tipo_de_cambio: " . $conn->error;
    }

}


?>
