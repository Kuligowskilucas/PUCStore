<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pagePath = "templates/$page.php";

include_once "DB.php";

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