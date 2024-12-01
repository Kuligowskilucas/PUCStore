<?php
include_once "../../DB.php";
verificaLogin();
$db = new DB();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['price'];
    $quantidade = $_POST['quantity'];

    $query = "UPDATE produtos SET nome = ?, preco = ?, quantidade = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdii", $nome, $preco, $quantidade, $id);

    if ($stmt->execute()) {
        header("Location: http://localhost/PUCStore/index.php?page=painel/listarProduto");
        exit;
    } else {
        echo "Erro ao atualizar o produto: " . $stmt->error;
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Produto não encontrado.");
}

$produto = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <title>Editar Produto</title>
</head>
<body>
<div class="container mx-auto py-24">
    <h1 class="text-3xl font-bold text-center mb-8">Editar Produto</h1>
    <form action="editarProduto.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Preço</label>
            <input type="number" name="price" id="price" step="0.01" value="<?= $produto['preco'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantidade</label>
            <input type="number" name="quantity" id="quantity" value="<?= $produto['quantidade'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar</button>
        </div>
    </form>
</div>
</body>
</html>
