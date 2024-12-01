<?php
include_once "../../DB.php";
include_once "../../config.php";
verificaLogin();
$db = new DB();
$conn = $db->connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: http://localhost/PUCStore/index.php?page=painel/listarProduto");
        exit;
    } else {
        echo "Erro ao excluir o produto: " . $stmt->error;
    }
} else {
    echo "ID do produto não informado.";
}
?>
