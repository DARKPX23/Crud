<?php

/*
* Funcion de Obtener Usuarios
*/
function obtener_usuarios() {
    try {
        require 'database.php';
        $sql = "SELECT * FROM usuarios;";
        $consulta = mysqli_query($db, $sql);
        return $consulta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

/*
* Funcion de Obtener un Usuario por ID
*/
function obtener_usuario($id) {
    try {
        require 'database.php';
        $id = mysqli_real_escape_string($db, $id);
        $sql = "SELECT * FROM usuarios WHERE id = '$id';";
        $consulta = mysqli_query($db, $sql);
        return mysqli_fetch_assoc($consulta);
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

/*
* Funcion de Insertar Usuario
*/
function insertar_usuario($datos) {
    try {
        require 'database.php';
        $nombre    = mysqli_real_escape_string($db, $datos['nombre']);
        $apellido  = mysqli_real_escape_string($db, $datos['apellido']);
        $email     = mysqli_real_escape_string($db, $datos['email']);
        $telefono  = mysqli_real_escape_string($db, $datos['telefono']);
        $direccion = mysqli_real_escape_string($db, $datos['direccion']);
        $ciudad    = mysqli_real_escape_string($db, $datos['ciudad']);
        $pais      = mysqli_real_escape_string($db, $datos['pais']);
        $fecha     = mysqli_real_escape_string($db, $datos['fecha']);
        $genero    = mysqli_real_escape_string($db, $datos['genero']);

        $sql = "INSERT INTO usuarios(nombre, apellido, email, telefono, direccion, ciudad, pais, fecha_nacimiento, genero)
                VALUES ('$nombre','$apellido','$email','$telefono','$direccion','$ciudad','$pais','$fecha','$genero');";

        mysqli_query($db, $sql);
        header('Location: index.php');
        exit;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

/*
* Funcion de Editar Usuario
*/
function editar_usuario($datos) {
    try {
        require 'database.php';
        $id        = mysqli_real_escape_string($db, $datos['id']);
        $nombre    = mysqli_real_escape_string($db, $datos['nombre']);
        $apellido  = mysqli_real_escape_string($db, $datos['apellido']);
        $email     = mysqli_real_escape_string($db, $datos['email']);
        $telefono  = mysqli_real_escape_string($db, $datos['telefono']);
        $direccion = mysqli_real_escape_string($db, $datos['direccion']);
        $ciudad    = mysqli_real_escape_string($db, $datos['ciudad']);
        $pais      = mysqli_real_escape_string($db, $datos['pais']);
        $fecha     = mysqli_real_escape_string($db, $datos['fecha']);
        $genero    = mysqli_real_escape_string($db, $datos['genero']);

        $sql = "UPDATE usuarios SET
                    nombre='$nombre',
                    apellido='$apellido',
                    email='$email',
                    telefono='$telefono',
                    direccion='$direccion',
                    ciudad='$ciudad',
                    pais='$pais',
                    fecha_nacimiento='$fecha',
                    genero='$genero'
                WHERE id='$id';";

        mysqli_query($db, $sql);
        header('Location: index.php');
        exit;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

/*
* Funcion de Eliminar Usuario
*/
function eliminar_usuario($id) {
    try {
        require 'database.php';
        $id = mysqli_real_escape_string($db, $id);
        $sql = "DELETE FROM usuarios WHERE id='$id';";
        mysqli_query($db, $sql);
        header('Location: index.php');
        exit;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
