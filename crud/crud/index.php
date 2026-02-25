<?php
    require __DIR__ . '/includes/funciones.php';
    $resultado = obtener_usuarios();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="build/css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema CRUD de Usuarios</h1>
    </header>
    <nav>
        <a href="agregar.php">Agregar Usuario</a>
        <a href="#" id="btn-editar" class="nav-disabled" onclick="accionNav(event, 'editar.php')">Editar Usuario</a>
        <a href="#" id="btn-eliminar" class="nav-disabled" onclick="accionNav(event, 'eliminar.php')">Eliminar Usuario</a>
    </nav>

    <p id="hint" style="text-align:center; color:#888; margin: 10px 0; font-size:0.9rem;">
        Haz clic en una fila para seleccionar un usuario
    </p>

    <div class="container">
        <table id="tabla-usuarios">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
            </tr>
            <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr class="fila-usuario" data-id="<?php echo $fila['id']; ?>">
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['ciudad']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
        let idSeleccionado = null;

        // Click en fila
        document.querySelectorAll('.fila-usuario').forEach(function(fila) {
            fila.addEventListener('click', function() {
                // Quitar selección anterior
                document.querySelectorAll('.fila-usuario').forEach(f => f.classList.remove('seleccionada'));

                // Seleccionar esta fila
                this.classList.add('seleccionada');
                idSeleccionado = this.getAttribute('data-id');

                // Activar botones del nav
                document.getElementById('btn-editar').classList.remove('nav-disabled');
                document.getElementById('btn-eliminar').classList.remove('nav-disabled');

                // Actualizar hint
                document.getElementById('hint').textContent = 'Usuario ID ' + idSeleccionado + ' seleccionado — ahora elige Editar o Eliminar';
            });
        });

        function accionNav(e, pagina) {
            e.preventDefault();
            if (!idSeleccionado) {
                alert('Primero haz clic en una fila para seleccionar un usuario.');
                return;
            }
            if (pagina === 'eliminar.php') {
                if (!confirm('¿Estás seguro de eliminar este usuario?')) return;
            }
            window.location.href = pagina + '?id=' + idSeleccionado;
        }
    </script>
</body>
</html>
