<?php
require __DIR__ . '/includes/funciones.php';

// Si se envía el formulario, actualizar
if ($_POST) {
    editar_usuario($_POST);
}

// Obtener el usuario por ID (GET o POST)
$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}
$usuario = obtener_usuario($id);
if (!$usuario) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Usuario</title>
<link rel="stylesheet" href="build/css/styles.css">
</head>
<body>

<nav>
<a href="index.php">Inicio</a>
</nav>

<div class="container">
    <h2>Editar Usuario</h2>
    <form method="POST" id="formEditar" novalidate>
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <input name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        <span class="error" id="error-nombre"></span>

        <input name="apellido" id="apellido" placeholder="Apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
        <span class="error" id="error-apellido"></span>

        <input name="email" id="email" type="email" placeholder="Email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        <span class="error" id="error-email"></span>

        <input name="telefono" id="telefono" placeholder="Teléfono (10 dígitos)" value="<?php echo htmlspecialchars($usuario['telefono']); ?>">
        <span class="error" id="error-telefono"></span>

        <input name="direccion" placeholder="Dirección" value="<?php echo htmlspecialchars($usuario['direccion']); ?>">
        <input name="ciudad" placeholder="Ciudad" value="<?php echo htmlspecialchars($usuario['ciudad']); ?>">
        <input name="pais" placeholder="País" value="<?php echo htmlspecialchars($usuario['pais']); ?>">
        <input type="date" name="fecha" value="<?php echo $usuario['fecha_nacimiento']; ?>">

        <select name="genero">
            <option value="">-- Selecciona Género --</option>
            <option <?php echo ($usuario['genero'] === 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option <?php echo ($usuario['genero'] === 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
</div>

<script>
    document.getElementById('formEditar').addEventListener('submit', function(e) {
        let valido = true;

        document.querySelectorAll('.error').forEach(el => el.textContent = '');

        const nombre = document.getElementById('nombre').value.trim();
        const apellido = document.getElementById('apellido').value.trim();
        const email = document.getElementById('email').value.trim();
        const telefono = document.getElementById('telefono').value.trim();

        if (nombre === '') {
            document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
            valido = false;
        }

        if (apellido === '') {
            document.getElementById('error-apellido').textContent = 'El apellido es obligatorio.';
            valido = false;
        }

        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            document.getElementById('error-email').textContent = 'El email es obligatorio.';
            valido = false;
        } else if (!regexEmail.test(email)) {
            document.getElementById('error-email').textContent = 'Ingresa un email válido.';
            valido = false;
        }

        if (telefono !== '' && !/^\d{10}$/.test(telefono)) {
            document.getElementById('error-telefono').textContent = 'El teléfono debe tener 10 dígitos numéricos.';
            valido = false;
        }

        if (!valido) {
            e.preventDefault();
        }
    });
</script>

</body>
</html>
