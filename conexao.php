<?php
$host = "localhost";
$usuario = "root";
$senha = "1234";
$banco = "site_login";

$con = new mysqli($host, $usuario, $senha, $banco);
if ($con->connect_error){
    die("Erro de conexão:" . $con->connect_error);
}

?>