<?php
// Ruta del archivo de texto
$ruta_archivo = 'lista_ids.txt';

// Comprueba si el archivo existe
if (file_exists($ruta_archivo)) {
    // Lee el contenido del archivo y lo guarda en un array
    $numeros = file($ruta_archivo, FILE_IGNORE_NEW_LINES);

    // Itera sobre el array y muestra cada número en el navegador
    foreach ($numeros as $numero) {
        echo $numero . "<br>";
    }
} else {
    echo "El archivo no existe.";
}
?>
