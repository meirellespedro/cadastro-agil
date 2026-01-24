<?php
include_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

// Criptografar senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Verificar se já existe usuário com esse email
$sql = "SELECT id FROM usuarios WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Esse email já existe";
    exit;
}

$stmt->close();

// Inserir novo usuário
$sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, $senha_hash);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "ERRO AO INSERIR";
}

$stmt->close();
$con->close();
?>
