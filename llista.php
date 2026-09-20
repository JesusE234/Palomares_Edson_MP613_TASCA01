<?php
// Activar depuración de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Cargar los datos de forma segura
require_once __DIR__ . '/dades.php';

if (!defined('NOM_BIBLIOTECA')) {
    define('NOM_BIBLIOTECA', 'La Biblioteca de DAW');
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Llista de Llibres - <?php echo NOM_BIBLIOTECA; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; color: #333; }
        .btn-index { display: inline-block; padding: 10px 18px; background: #0f9d58; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-bottom: 25px; }
        .btn-index:hover { background: #0b8043; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.08); }
        .card h3 { color: #0f9d58; margin-top: 0; font-size: 1.2em; }
        .badge { display: inline-block; padding: 4px 10px; background: #e0f2f1; color: #00796b; border-radius: 4px; font-size: 0.85em; margin: 8px 0; font-weight: bold; }
        .read { color: #2e7d32; font-weight: bold; }
        .unread { color: #c62828; font-weight: bold; }
        .stars { color: #fbc02d; letter-spacing: 2px; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-index">Índex</a>

    <div class="grid">
        <?php if (isset($biblioteca) && is_array($biblioteca)): ?>
            <?php foreach ($biblioteca as $llibre): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($llibre['titol']); ?></h3>
                    <p><strong>Autor:</strong> <?php echo htmlspecialchars($llibre['autor']); ?></p>
                    <p><strong>Any:</strong> <?php echo $llibre['any']; ?></p>
                    <span class="badge"><?php echo htmlspecialchars($llibre['genere']); ?></span>
                    
                    <p class="<?php echo $llibre['llegit'] ? 'read' : 'unread'; ?>">
                        <?php echo $llibre['llegit'] ? 'Llegit' : 'No llegit'; ?>
                    </p>

                    <?php if ($llibre['llegit']): ?>
                        <p><strong>Valoració:</strong> 
                            <span class="stars">
                                <?php echo str_repeat('★', $llibre['valoracio']); ?>
                            </span>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</body>
</html>
