<?php

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "admin2";
$usuario->clave = password_hash("admin123", PASSWORD_DEFAULT);
$usuario->nombre = "Administrador";
$usuario->apellido = "";
$usuario->correo = "admin2@correo.com";
$usuario->insertar();

echo "Usuario insertado.";
?>