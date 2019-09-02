<?php

include ('class/Conexao.php');
include ('class/Usuario.class.php');

$usuario = new Usuario();

$logout = $usuario->logout();

