<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page === 'logout') {
    session_start(); // Inicia a sessão
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destroi a sessão ativa
    header("Location: index.php?page=login"); // Redireciona para a página de login
    exit(); // Garante que o script será encerrado
}
$pagePath = "templates/$page.php";

include_once "DB.php";

use App\DB; // Usando o namespace

$db = new DB(); 
$conn = $db->connect();

if (!file_exists($pagePath)) {
    $page = '404';
    $pagePath = "templates/404.php";
}
$baseURL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$db = new DB();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUCStore</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./assets/js/Swiper.js"></script>
    <script src="./components/modal/modal.js"></script>
    <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/css/output.css">

</head>

<body>
    <header>
        <?php include 'components/header.php'; ?>
    </header>

    <main id="main-content">
        <?php include $pagePath; ?>
    </main>

    <footer>
        <?php include 'components/footer.php'; ?>
    </footer>
</body>

</html>