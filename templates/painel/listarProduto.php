<?php
define('BASE_PATH', __DIR__ . '/../../');
include_once BASE_PATH . 'DB.php';
include_once BASE_PATH . "config.php";

use App\DB; 

$db = new DB(); 
$conn = $db->connect();
$conn = $db->connect();

$query = "SELECT id, nome, preco, quantidade, imagem FROM produtos";
$result = $conn->query($query);

verificaLoginAdmin();
?>
<div class="container mx-auto py-24">
    <h1 class="text-3xl font-bold text-center mb-8">Lista de Produtos</h1>
    <table class="table-auto w-full bg-white shadow-md rounded mb-8">
        <thead>
        <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Nome</th>
            <th class="px-4 py-2 border">Preço</th>
            <th class="px-4 py-2 border">Quantidade</th>
            <th class="px-4 py-2 border">Imagem</th>
            <th class="px-4 py-2 border">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2 text-center"><?= $row['id'] ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($row['nome']) ?></td>
                    <td class="border px-4 py-2 text-center">R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
                    <td class="border px-4 py-2 text-center"><?= $row['quantidade'] ?></td>
                    <td class="border px-4 py-2 text-center">
                        <?php if (!empty($row['imagem'])): ?>
                            <img src="<?= htmlspecialchars($row['imagem']) ?>" alt="Imagem do Produto" class="h-16 w-auto mx-auto">
                        <?php else: ?>
                            <span>Sem Imagem</span>
                        <?php endif; ?>
                    </td>
                    <td class="border px-4 py-2 text-center">
                        <a href="templates/painel/editarProduto.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:text-blue-700">Editar</a> |
                        <a href="templates/painel/deletarProduto.php?id=<?= $row['id'] ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center py-4">Nenhum produto cadastrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 mb-8" href="index.php?page=painel/cadastrarProduto">Cadastrar Produto</a>

</div>
<?php $conn->close(); ?>
