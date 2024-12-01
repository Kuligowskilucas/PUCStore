<?php
include "../../../DB.php";
session_start();

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = $db->connect();

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: http://localhost/PUCStore/index.php?page=index");
            exit;
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "Email não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
