<?php
    require __DIR__ . '/includes/funciones.php';
    if ($_POST) {
        insertar_usuario($_POST);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="build/css/styles.css">
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
    </nav>
    <div class="container">
        <h2>Agregar Usuario</h2>
        <form method="POST" id="formAgregar" novalidate>
            <input name="nombre" id="nombre" placeholder="Nombre" required>
            <span class="error" id="error-nombre"></span>

            <input name="apellido" id="apellido" placeholder="Apellido" required>
            <span class="error" id="error-apellido"></span>

            <input name="email" id="email" type="email" placeholder="Email" required>
            <span class="error" id="error-email"></span>

            <input name="telefono" id="telefono" placeholder="Teléfono (10 dígitos)">
            <span class="error" id="error-telefono"></span>

            <input name="direccion" placeholder="Dirección">
            <input name="ciudad" placeholder="Ciudad">
            <input name="pais" placeholder="País">
            <input type="date" name="fecha">

            <select name="genero">
                <option value="">-- Selecciona Género --</option>
                <option>Masculino</option>
                <option>Femenino</option>
            </select>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script>
        document.getElementById('formAgregar').addEventListener('submit', function(e) {
            let valido = true;

            // Limpiar errores anteriores
            document.querySelectorAll('.error').forEach(el => el.textContent = '');

            const nombre = document.getElementById('nombre').value.trim();
            const apellido = document.getElementById('apellido').value.trim();
            const email = document.getElementById('email').value.trim();
            const telefono = document.getElementById('telefono').value.trim();

            // Validar Nombre
            if (nombre === '') {
                document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
                valido = false;
            }

            // Validar Apellido
            if (apellido === '') {
                document.getElementById('error-apellido').textContent = 'El apellido es obligatorio.';
                valido = false;
            }

            // Validar Email
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                document.getElementById('error-email').textContent = 'El email es obligatorio.';
                valido = false;
            } else if (!regexEmail.test(email)) {
                document.getElementById('error-email').textContent = 'Ingresa un email válido.';
                valido = false;
            }

            // Validar Teléfono (opcional, pero si se llena debe tener 10 dígitos)
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
