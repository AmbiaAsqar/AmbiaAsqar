<!-- Dekstop Nav -->
    <nav class="fixed top-0 w-full z-50 py-10 transition-all bg-transparent border-white/0 hidden md:block">
      <div class="container mx-auto max-w-6xl">
        <div class="flex justify-between items-center">
          <div>
            <a href="https://kontergame.id">
              <img src="https://kontergame.id/assets/logo/KGdark (1).svg" class="h-10" alt />
            </a>
          </div>
          <div class="flex gap-8">
            <a href="https://kontergame.id" class="text-white font-light text-base text-yellow-primary hover:text-yellow-primary transition">Beranda</a>
            <a href="https://kontergame.id/#product" class="text-white font-light text-base hover:text-yellow-primary transition">Product</a>
            <a href="https://kontergame.id/transaksi" class="text-white font-light text-base hover:text-yellow-primary transition">Lacak Pesanan</a>
            <a href="https://kontergame.id/kalkulator" class="text-white font-light text-base hover:text-yellow-primary transition">Kalkulator</a>
          </div>
          <div class="flex gap-3">
            <a href="https://kontergame.id/account/auth/login" class="btn-yellow">Masuk</a>
            <a href="https://kontergame.id/account/auth/register" class="btn-white">Daftar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Molbile Nav -->
    <div x-data="{isMore : false}" class="md:hidden fixed bottom-0 w-full z-50 p-4 pb-5 bg-darkblue/50 backdrop-blur-md border-t border-white/20 flex justify-between">
      <a href="https://kontergame.id" class="flex flex-col items-center justify-center text-yellow-primary text-white gap-1">
        <ion-icon name="home-outline" class="text-2xl"></ion-icon>
        <span class="font-light text-xs sm:text-base">Beranda</span>
      </a>
      <a href="https://kontergame.id/#product" class="flex flex-col items-center justify-center text-white gap-1">
        <ion-icon name="game-controller-outline" class="text-2xl"></ion-icon>
        <span class="font-light text-xs sm:text-base">Produk</span>
      </a>
      <a href="https://kontergame.id/transaksi" class="flex flex-col items-center justify-center text-white gap-1">
        <ion-icon name="reader" class="text-2xl"></ion-icon>
        <span class="font-light text-xs sm:text-base">Riwayat</span>
      </a>
      <a href="https://kontergame.id/#kontak" class="flex flex-col items-center justify-center text-white gap-1">
        <ion-icon name="chatbubble-outline" class="text-2xl"></ion-icon>
        <span class="font-light text-xs sm:text-base">Kontak</span>
      </a>
      <button @click="isMore=!isMore" class="flex flex-col items-center justify-center text-white gap-1">
        <ion-icon name="grid-outline" class="text-2xl"></ion-icon>
        <span class="font-light text-xs sm:text-base">Lainnya</span>
      </button>
      <div x-show="isMore" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="flex gap-3 absolute justify-center right-0 left-0 bottom-20 p-4 bg-darkblue/50 backdrop-blur-md">
        <a href="https://kontergame.id/account/auth/login" class="btn-yellow w-full items-center flex gap-3 justify-center">Masuk <ion-icon name="log-in-outline" class="text-xl"></ion-icon>
        </a>
        <a href="https://kontergame.id/account/auth/register" class="btn-white w-full items-center flex gap-3 justify-center">Daftar <ion-icon name="finger-print-outline" clas="text-xl"></ion-icon>
        </a>
      </div>
    </div>