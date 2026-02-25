<?php
require __DIR__ . '/includes/funciones.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

// Si confirmaron con POST, eliminar
if ($_POST && isset($_POST['confirmar'])) {
    eliminar_usuario($_POST['id']);
}

// Si viene por GET con confirmación directa (desde el confirm() de JS en index)
// En index.php el confirm es JS, si acepta sigue el link hacia aquí con GET
// Entonces eliminamos directamente al cargar la página con GET
eliminar_usuario($id);
