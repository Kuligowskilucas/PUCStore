/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",               // Arquivos PHP na raiz do projeto
    "./components/**/*.php", // Componentes PHP
    "./templates/**/*.php",  // Templates PHP
    "./assets/js/**/*.js"    // Se você tiver arquivos JS
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
