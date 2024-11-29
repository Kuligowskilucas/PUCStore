<div class="container mx-auto py-52">
    <h1 class="text-3xl font-bold text-center mb-8">Faça sua conta na Apple</h1>
    <form action="templates/painel/processos/formulario_usuario.php" method="POST">
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none   
 focus:shadow-outline"  
                placeholder="Seu email">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
            <input type="password" name="password" id="password"  
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  
                placeholder="Sua senha">
        </div>
        <div class="mb-6">
            <label for="password_confirm" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
            <input type="password" name="password_confirm" id="password_confirm"  
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  
                placeholder="Sua senha">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  
                type="submit">
                Cadastrar
            </button>
        </div>
    </form>
</div>