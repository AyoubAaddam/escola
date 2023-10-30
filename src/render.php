<?php 

function render(string $template, array $data = []): string {
    if (isset($data)) {
        extract($data, EXTR_OVERWRITE);
    }
    // Inicializar buffer de salida
    ob_start();
    require 'src/views/' . $template . '.tpl.php';

    // Limpiar y devolver buffer de salida
    return ob_get_clean();
}

?>