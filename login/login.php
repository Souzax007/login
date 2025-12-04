<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login      = isset($_POST['login']) ? trim($_POST['login']) : null;
    $password   = isset($_POST['password']) ? trim($_POST['password']) : null;

    if (empty($login)) {
        echo 'Por favor, preencha o campo de login';
        exit;
    }

    if (empty($password)) {
        echo 'Por favor, preencha o campo de senha';
        exit;
    }

    // Usando prepared statement para segurança
    $stmt = $connect->prepare("SELECT `login`, `password` FROM `usuarios` WHERE `login` = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Usuário não encontrado";
        exit;
    }

    $data = $result->fetch_assoc();

    if (password_verify($password, $data['password'])) {
        echo "Logado com sucesso!";
    } else {
        echo "Senha incorreta!";
        exit;
    }

    $stmt->close();
    $connect->close();
}
?>
