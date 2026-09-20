<?php
// Cargar el archivo de datos usando una ruta absoluta segura
require_once __DIR__ . '/dades.php';

// Definir constante del nombre de la biblioteca
if (!defined('NOM_BIBLIOTECA')) {
    define('NOM_BIBLIOTECA', 'La Biblioteca de DAW');
}

// Variables de conteo
$llibresLlegits = 0;
$llibresNoLlegits = 0;
$sumaValoracions = 0;

// Verificar que la variable $biblioteca exista antes de usarla
if (isset($biblioteca) && is_array($biblioteca)) {
    foreach ($biblioteca as $llibre) {
        if (!empty($llibre['llegit'])) {
            $llibresLlegits++;
            $sumaValoracions += $llibre['valoracio'];
        } else {
            $llibresNoLlegits++;
        }
    }
}

// Cálculo de la valoración media
$valoracioMitjana = ($llibresLlegits > 0) ? round($sumaValoracions / $llibresLlegits, 1) : 0;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Tasca 1 B1 613</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .header { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .stats { margin: 15px 0; font-weight: bold; background: #e8f5e9; padding: 10px; border-radius: 4px; }
        .btn { display: inline-block; padding: 8px 15px; background: #0f9d58; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px; }
        .debug-box { background: #282c34; color: #abb2bf; padding: 15px; border-radius: 6px; margin-top: 25px; }
    </style>
</head>
<body>

    <div class="header">
        <small>Tasca 1 B1 613</small>
        <h1><?php echo NOM_BIBLIOTECA; ?></h1>

        <div class="stats">
            Llibres llegits: <?php echo $llibresLlegits; ?> | 
            No llegits: <?php echo $llibresNoLlegits; ?> | 
            Valoració mitjana: <?php echo $valoracioMitjana; ?>
        </div>

        <div>
            <a href="llista.php" class="btn">Llista de llibres</a>
            <a href="taula.php" class="btn">Taula de llibres</a>
        </div>
    </div>

    <?php if (isset($biblioteca[0])): ?>
    <div class="debug-box">
        <h3 style="color:white; margin-top:0;">Depuració (var_dump):</h3>
        <pre><?php var_dump($biblioteca[0]); ?></pre>
    </div>
    <?php endif; ?>

</body>
</html>
