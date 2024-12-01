<div class="bg-gray-800 text-white py-4">
    <div class="max-w-[1200px] mx-auto px-4 flex items-center justify-between flex-row">
        <!-- Navegação -->
        <nav class="flex items-center justify-center flex-row gap-24">
            <a href="index.php?page=index" class="w-7 text-x2 font-bold">
                <img src="assets/icons/apple.svg" alt="Logo I Puc" class="w-8 h-8">
            </a>
            <a href="index.php?page=products" class="text-x2 font-bold">Produtos</a>
            <a href="index.php?page=aboutUs" class="text-x2 font-bold">Sobre nós</a>
        </nav>

        <!-- Login/Usuário -->
        <div class="flex flex-row gap-8 items-center">
            <?php
            require_once 'config.php'; // Substitua pelo caminho correto do arquivo que contém verificaLoginUsuario

            $usuario = verificaLoginUsuario(); // Função que verifica o login do usuário

            if ($usuario): ?>
                <!-- Caso o usuário esteja logado -->
                <span class="text-x2 font-bold"><?php echo htmlspecialchars($usuario['email']); ?></span>
                <a class="bg-red-500 text-white font-bold py-2 px-4 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300" href="index.php?page=logout">Logout</a>
            <?php else: ?>
                <!-- Caso o usuário não esteja logado -->
                <a href="index.php?page=cadastro" class="text-x2 font-bold">Sign up</a>
                <a class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300" href="index.php?page=login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>
