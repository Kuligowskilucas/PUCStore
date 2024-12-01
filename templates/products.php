<section class="flex flex-col items-center bg-gray-100 py-12">
    <!-- Vídeo -->
    <video class="w-full max-w-5xl rounded-lg shadow-lg mb-12" autoplay muted loop loading="lazy" src="assets/videos/iphone_video.mp4"></video>

    <!-- Área de Produtos -->
    <div class="w-full max-w-6xl px-6">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12">Nossos Produtos</h2>

        <!-- Slider Container -->
        <div class="swiper-container relative">
            <div class="swiper-wrapper">
                <?php
                require_once 'DB.php';

                use App\DB;

                $db = new DB();
                $conn = $db->connect();

                // Consulta para buscar produtos
                $sql = "SELECT nome, imagem, preco, quantidade FROM produtos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='swiper-slide'>
                            <div class='container mx-auto px-6 px-6 flex flex-col bg-gray-50 shadow-lg rounded-lg transform transition hover:scale-105 flex-wrap'>
                                <!-- Imagem -->
                                <div class='mt-2 w-full h-64 object-contain rounded-t-lg flex items-center justify-center overflow-hidden'>
                                    <img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "' class='h-full object-contain'>
                                </div>
                                
                                <!-- Detalhes -->
                                <div class='p-6 text-center'>
                                    <h3 class='text-xl font-bold text-gray-900 mb-2'>" . $row['nome'] . "</h3>
                                    <p class='text-gray-500 text-lg mb-4'>R$ " . number_format($row['preco'], 2, ',', '.') . "</p>
                                    <p class='text-sm text-gray-400 mb-4'>Estoque: " . $row['quantidade'] . "</p>
                                    <a href='index.php?page=products' class='inline-block bg-black text-white px-6 py-2 rounded-full shadow-md hover:bg-gray-800 transition'>
                                        Ver Mais
                                    </a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p class='text-center text-gray-500'>Nenhum produto encontrado 😭</p>";
                }
                $conn->close();
                ?>
            </div>

            <!-- Pagination Buttons -->
            <div class="text-black">
                <div class="swiper-button-prev bg-gray-400 text-black p-3"></div>
                <div class="swiper-button-next bg-gray-400 text-black p-3"></div>
            </div>
        </div>
    </div>
    <br>
</section>