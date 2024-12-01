<?php 
include "../../../DB.php";
use App\DB; 

$db = new DB(); 
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        echo "As senhas não são iguais, tente novamente.";
        exit;
    }
    $conn = $db->connect();

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuario (email, senha) VALUES (?, ?)";
    $params = [$email, $passwordHash];
    $db->preparedQuery($query, "ss", $params);
}
?>
