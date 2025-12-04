<?php
include("conexao.php");

$login = $_POST["login"];
$senha = $_POST["password"];

if(empty($login) || empty($senha)){
    die("Preencha todos os campos");
}

$stmt = $connect->prepare("SELECT login FROM usuarios WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    die("Esse login já existe");
}
$stmt->close();

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $connect->prepare("INSERT INTO usuarios (login, password) VALUES (?, ?)");
$stmt->bind_param("ss", $login, $senhaHash);

if($stmt->execute()){
    echo "Usuário cadastrado com sucesso";
} else {
    echo "Erro ao cadastrar usuário";
}

$stmt->close();
$connect->close();
?>
