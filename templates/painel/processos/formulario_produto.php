<?php
include "../../../DB.php";
include "../../../config.php";

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nome'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageTmp = $_FILES['image']['tmp_name']; 
        $imageName = basename($_FILES['image']['name']);
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type']; 

        $imagePath = UPDATES_DIR . $imageName;

        $imageURL = UPDATES_URL . $imageName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

        if (in_array($imageType, $allowedTypes)) {
            if ($imageSize <= 5 * 1024 * 1024) {
                if (move_uploaded_file($imageTmp, $imagePath)) {
                    echo "Imagem carregada com sucesso!<br>";
                } else {
                    echo "Erro ao mover a imagem para o diretório de uploads.<br>";
                    exit;
                }
            } else {
                echo "A imagem é muito grande. O tamanho máximo permitido é 5MB.<br>";
                exit;
            }
        } else {
            echo "Somente imagens .jpg, .jpeg, .png e .webp são permitidas.<br>";
            exit;
        }
    } else {
        echo "Por favor, selecione uma imagem para o produto.<br>";
        exit;
    }

    $conn = $db->connect();
    $query = "INSERT INTO produtos (nome, preco, quantidade, imagem) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("sdss", $name, $price, $quantity, $imageURL);

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o produto: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    $conn->close();
}
?>
