<?php
include "../../../DB.php";
session_start();

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $conn = $db->connect();

    if (!$conn) {
        die("Erro ao conectar com o banco de dados.");
    }

    $query = "SELECT * FROM administrador WHERE email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        var_dump($user);

        if (password_verify($password, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: http://localhost/PUCStore/index.php?page=painel/listarProduto");
            exit;
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "Email não encontrado.";
        var_dump($email);
    }

    $stmt->close();
    $conn->close();
}
?>
