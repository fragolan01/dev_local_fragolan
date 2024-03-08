<?php

// Archivo .txt
$archivo = 'lista_ids.txt';

// Abrir el archivo en modo lectura
$manejador = fopen($archivo, 'r');

// Establecer el límite de tiempo a 8 minutos
set_time_limit(480);

// Inicializar el contador en 1
$cont = 1;

// Definir la frecuencia de serie en segundos (1 minuto)
$frecuencia_serie = 60;

// Verificar si el archivo se abrió correctamente
if ($manejador) {

    // Leer el archivo línea por línea
    while (($linea = fgets($manejador)) !== false) {

        // Dividir la línea en tres partes usando el tabulador como delimitador
        $partes = explode("\t", $linea);
        
        // Verificar si hay tres partes (orden y producto_id)
        if (count($partes) == 3) {
            // Extraer los primeros 5 dígitos de cada número
            $orden = substr($partes[0], 0, 5);
            
            // Verificar si la serie coincide con el contador actual
            if ($orden[0] == $cont) {
                echo date('h:i:s -> ') . $orden . "<br>";
            } else {
                // Si la serie no coincide, avanzar al siguiente contador y esperar
                $cont++;
                sleep($frecuencia_serie);
                echo date('h:i:s -> ') . $orden . "<br>";
            }
            
            // Reiniciar el contador si llega al 8
            if ($cont > 8) {
                $cont = 1;
            }
        }
    }
    // Cerrar el archivo
    fclose($manejador);

} else {
    // Si no se puede abrir el archivo, mostrar un mensaje de error
    echo "Error: No se pudo abrir el archivo.\n";
}

?>
