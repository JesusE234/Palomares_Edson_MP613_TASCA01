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
    <title>Taula de Llibres - <?php echo NOM_BIBLIOTECA; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; color: #333; }
        .btn-index { display: inline-block; padding: 10px 18px; background: #0f9d58; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-bottom: 25px; }
        .btn-index:hover { background: #0b8043; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.08); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; font-weight: bold; color: #555; }
        .read { color: #2e7d32; font-weight: bold; }
        .unread { color: #c62828; font-weight: bold; }
        .stars { color: #fbc02d; letter-spacing: 2px; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-index">Índex</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Títol</th>
                <th>Autor</th>
                <th>Any</th>
                <th>Gènere</th>
                <th>Llegit</th>
                <th>Valoració</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($biblioteca) && is_array($biblioteca)): ?>
                <?php foreach ($biblioteca as $llibre): ?>
                    <tr>
                        <td><?php echo $llibre['id']; ?></td>
                        <td><strong><?php echo htmlspecialchars($llibre['titol']); ?></strong></td>
                        <td><?php echo htmlspecialchars($llibre['autor']); ?></td>
                        <td><?php echo $llibre['any']; ?></td>
                        <td><?php echo htmlspecialchars($llibre['genere']); ?></td>
                        <td class="<?php echo $llibre['llegit'] ? 'read' : 'unread'; ?>">
                            <?php echo $llibre['llegit'] ? 'Llegit' : 'No llegit'; ?>
                        </td>
                        <td>
                            <?php if ($llibre['llegit']): ?>
                                <span class="stars"><?php echo str_repeat('★', $llibre['valoracio']); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
