<div class="container mx-auto py-24">
  <h1 class="text-3xl font-bold text-center mb-8">Cadastro de Produto</h1>
  <form>
    <div class="mb-4">
      <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagem</label>
      <input type="file" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">   

    </div>
    <div class="mb-4">
      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>   

      <input type="text" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none   
 focus:shadow-outline" placeholder="Nome do produto">
    </div>
    <div class="mb-4">
      <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Preço</label>
      <input type="number" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none   
 focus:shadow-outline" placeholder="Preço do produto">
    </div>
    <div class="mb-4">
      <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantidade em Estoque</label>
      <input type="number" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"   
 placeholder="Quantidade em estoque">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">   

        Cadastrar
      </button>
    </div>
  </form>
</div>