<?php
// Ruta del archivo .txt
$archivo = 'lista_ids.txt';

// Abrir el archivo en modo lectura
$manejador = fopen($archivo, 'r');

// Verificar si el archivo se abrió correctamente
if ($manejador) {
    // Leer el archivo línea por línea
    while (($linea = fgets($manejador)) !== false) {
        // Dividir la línea en dos partes usando el tabulador como delimitador
        $partes = explode("\t", $linea);
        
        // Verificar si hay dos partes (número1 y número2)
        if (count($partes) == 2) {
            // Extraer los primeros 5 dígitos de cada número
            $primeros_digitos_numero1 = substr($partes[0], 0, 5);
            $primeros_digitos_numero2 = substr($partes[1], 0, 5);
            
            // Mostrar los primeros 5 dígitos de cada número
            echo "$primeros_digitos_numero1\n";
            echo " $primeros_digitos_numero2\n";
            echo '<br>';

        } else {
            // Si la línea no tiene dos partes, mostrar un mensaje de error
            echo "Error: La línea no tiene el formato esperado.\n";
        }
    }
    
    // Cerrar el archivo
    fclose($manejador);
} else {
    // Si no se puede abrir el archivo, mostrar un mensaje de error
    echo "Error: No se pudo abrir el archivo.\n";
}
?>
