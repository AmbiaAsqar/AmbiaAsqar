@extends('template.template')

@section('content')

    <!-- Hero Section -->
    <section class="md:pt-20 pt-0 relative pb-44 sm:pb-60 overflow-x-clip bg-cover bg-center lg:bg-top bg-[url('../public/images/hero-1.png')]">
      <div class="px-3 pb-14 md:py-16 z-10 relative">
        <div class="container max-w-6xl mx-auto">
          <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-8 md:col-span-10 lg:col-start-3 md:col-start-2">
              <div class="flex flex-col gap-3 md:gap-6 mt-16">
                <h1 class="text-white text-center text-xl font-bold leading-tight md:leading-normal md:text-3xl lg:text-[42px]"> Topup Game Terbaik di Indonesia, Bawa Permainanmu ke Level Berikutnya! </h1>
                <p class="text-white text-[10px] md:text-base text-center font-light lg:text-lg leading-relaxed"> Konter Game menyediakan layanan Top up game dan Reseller Voucher Game termurah dan terpercaya di Indonesia. </p>
              </div>
              <div class="relative mt-6" x-data="{count : 0}">
                <form action="https://kontergame.id/search" method="GET">
                  <div :class="count >= 1 && 'border border-yellow-primary'" class="flex focus-within:shadow-input-sm justify-between w-full py-1 md:py-2 md:pr-2 md:pl-6 md:rounded-2xl pr-1 pl-[10px] bg-slate-600 bg-opacity-40 rounded-xl shadow-inner backdrop-blur-[100px] text-white border border-transparent focus-within:border-yellow-primary ring-yellow-primary">
                    <input name="keyword" value x-ref="panjang" @keyup="count = $refs.panjang.value.length" type="text" placeholder="Cari atau masukkan nama game.." class="w-full bg-transparent ring-0 focus:ring-0 text-sm md:text-lg xl:text-lg focus:outline-none" />
                    <button class="gradient-yellow px-6 py-2 md:py-[10px] md:px-8 md:rounded-xl lg:text-xl text-center text-white font-medium text-sm rounded-[10px] md:text-base peer active:scale-95 hover:ring-2 transition-all hover:ring-offset-5 hover:ring-yellow-primary/30"> Cari </button>
                  </div>
                </form>
                <div class="w-full h-full absolute top-0 -z-10 rounded-xl overflow-hidden md:rounded-2xl">
                  <img src="fonts/input-acc.svg" class="h-full absolute top-0 right-0 blur-sm" alt />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="absolute top-full right-1/2 translate-x-1/2 -translate-y-1/2 z-10">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
             
            @foreach($kategori as $category)    
            @if($category->kode == "mobile-legends" || $category->kode == "free-fire" || $category->kode == "genshin-impact"||$category->kode == "pubg-mobile-indonesia" || $category->kode == "Youtube-Premium")
            <div class="swiper-slide rounded-2xl md:rounded-3xl lg:rounded-[36px]">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-[36px]">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-[36px] bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="overflow-hidden rounded-t-2xl">
                    <img src="{{ preg_replace('/assets/', 'assets_old', $category->thumbnail, 1)  }}" class="w-full" style="width: 350px; height: 210px; object-fit: cover" alt />
                    {{--<img src="{{ preg_replace('/assets/', 'assets_old', $category->thumbnail, 1)  }}" style="height: 3rem" class="md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />--}}
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-sm text-white font-semibold leading-relaxed sm:text-xl">
                      <a href="{{url('/order')}}/{{$category->kode}}">{{ $category->nama }}</a>
                    </h2>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <div class="flex justify-between items-center">
                      <span class="text-sm text-white opacity-60 font-light sm:text-lg">{{ $category->sub_nama }}</span>
                      <span class="text-white bg-yellow-linear font-normal px-2 text-xs rounded-full sm:text-sm">Terlaris</span>
                    </div>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-[#5761DA] w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            
          </div>
        </div>
      </div>
      <div class="w-full h-full bg-[#11143A]/70 absolute top-0 right-0 backdrop-blur-md"></div>
      <div class="h-80 w-full bg-gradient-to-t from-[#1A1E3F] to-transparent absolute bottom-0 right-0"></div>
      <img src="assets/images/gem%20%283%29.png" class="absolute top-12 left-12 h-12 md:h-24 md:top-20 md:left-24" alt />
      <img src="assets/images/gem%20%282%29.png" class="absolute right-12 md:right-24 top-1/3" alt />
      <img src="assets/images/gem.png" class="absolute -right-10 md:-right-5 blur-lg h-32 md:h-52 top-1/2" alt />
      <div class="w-[576px] h-[576px] bg-yellow-primary blur-[200px] absolute -top-[400px] -left-[400px]"></div>
    </section>
    <!-- Product -->
    <section class="pt-40 md:pt-52 relative overflow-x-hidden" x-data="{isActive : 'semua' }" id="product">
      <img src="assets/images/crystal.png" class="h-20 md:h-40 absolute md:top-60 top-28 md:left-4 left-10" alt />
      <img src="assets/images/Polygon.png" class="blur-[70px] -right-10 top-1/2 -translate-y-1/2 absolute md:h-80 h-60" alt />
      <div class="h-96 w-96 bg-[#5761DA] rounded-full absolute top-42 blur-[150px] -left-32"></div>
      <div class="container max-w-6xl mx-auto">
        <div class="grid grid-cols-12">
          <div class="col-span-12 justify-center flex">
            <div class="p-3 bg-blue mt-10 sm:shadow-inner-lg flex md:inline-flex gap-2 flex-nowrap overflow-x-scroll snap snap-mandatory scroll-hide backdrop-blur-xl md:rounded-[20px]">
              <div id="li-all" @click="isActive = 'semua'" :class="isActive == 'semua' ? 'text-yellow-primary bg-[#11143A]' : 'text-white  bg-transparent'" class="snap-start flex gap-1 items-center transition p-[10px] px-[10px] rounded-lg cursor-pointer justify-center">
                <div class="flex items-center justify-center px-1">
                  <ion-icon name="apps-outline" class="text-base"></ion-icon>
                </div>
                <span class="text-sm font-medium sm:text-base md:text-xl">Semua</span>
              </div>
              <div @click="isActive = 'topup-games'" :class="isActive == 'topup-games' ? 'text-yellow-primary bg-[#11143A]' : 'text-white  bg-transparent'" class="flex gap-1 items-center transition p-[10px] px-[25px] rounded-lg cursor-pointer justify-center">
                <div class="flex items-center justify-center px-1">
                  <ion-icon src="https://kontergame.id/assets/images/category/1689120132_1e97e1c1910578a72567.svg" class="text-base"></ion-icon>
                </div>
                <span class="text-sm font-medium sm:text-base md:text-xl shrink-0">Topup Games</span>
              </div>
              <div @click="isActive = 'voucher-game'" :class="isActive == 'voucher-game' ? 'text-yellow-primary bg-[#11143A]' : 'text-white  bg-transparent'" class="flex gap-1 items-center transition p-[10px] px-[25px] rounded-lg cursor-pointer justify-center">
                <div class="flex items-center justify-center px-1">
                  <ion-icon src="https://kontergame.id/assets/images/category/1689120233_519a329d2fee3a5f3f8f.svg" class="text-base"></ion-icon>
                </div>
                <span class="text-sm font-medium sm:text-base md:text-xl shrink-0">Voucher Game</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container gap-8 sm:gap-16 flex flex-col max-w-6xl mx-auto px-3 py-6 sm:py-20">
        <div x-show="isActive == 'semua' || isActive == 'topup-games' " x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-50" class="grid grid-cols-12 gap-2 md:gap-5 transform transition-all">
          <div class="col-span-12">
            <h2 class="text-yellow-primary/70 mb-5 font-bold leading-none text-2xl md:text-3xl lg:text-4xl relative z-10"> Topup Games </h2>
          </div>
           
          
          @foreach($kategori as $category)
          @if($category->tipe == "game")
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="{{url('/order')}}/{{$category->kode}}" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="{{ preg_replace('/assets/', 'assets_old', $category->thumbnail, 1)  }}" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="assets/images/ff.png" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">{{ $category->nama }}</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none">{{ $category->sub_nama }}</span>
              </div>
            </a>
          </div>
          @endif
          @endforeach 
          
        </div>
        <div x-show="isActive == 'semua' || isActive == 'voucher-game' " x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-50" class="grid grid-cols-12 gap-2 md:gap-5 transform transition-all">
          <div class="col-span-12">
            <h2 class="text-yellow-primary/70 mb-5 font-bold leading-none text-2xl md:text-3xl lg:text-4xl relative z-10"> Voucher Game </h2>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/voucher-google-play" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/googleplay.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">Voucher Google Play</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/minecraft" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/minecraft.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">Minecraft</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/unipin-voucher" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/unpin.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">UniPin Voucher</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/steam-wallet" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/steam.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">Steam Wallet</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/garena" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/garena.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">Garena</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
          <div class="col-span-4 sm:col-span-3 md:col-span-2">
            <a href="https://kontergame.id/id/roblox" class="block overflow-hidden rounded-2xl md:rounded-3xl relative cursor-pointer group">
              <img src="assets/images/roblox.png" class="w-full group-hover:scale-110 transition-all group-hover:rotate-6" alt />
              <img src="icon.html" class="h-5 md:h-7 xl:h-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:scale-50 transition-all group-hover:top-4 group-hover:left-8 group-hover:opacity-75" alt />
              <div class="h-1 w-full absolute bottom-0 translate-y-full group-hover:translate-y-0 transition-all bg-yellow-primary"></div>
              <div class="flex flex-col p-2 sm:p-3 lg:p-3 xl:p-4 bg-gradient-to-r from-white/10 to-dark-blue/10 backdrop-blur-sm absolute bottom-0 group-hover:translate-y-0 translate-y-full w-full transition-all gap-1 sm:gap-0">
                <span class="text-white font-medium text-sm sm:text-base leading-none">Roblox</span>
                <span class="text-white/50 text-[10px] sm:text-xs font-light leading-none"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Rating -->
    <section class="bg-[#11143A] relative">
      <img src="fonts/polygon-2.svg" class="h-20 md:h-32 absolute bottom-full translate-y-1/2 right-4" alt />
      <div class="container mx-auto px-3 py-6 sm:py-20">
        <div class="col-span-12 pt-5">
          <h1 class="text-white text-xl font-bold leading-normal md:text-3xl text-center lg:text-4xl lg:leading-relaxed"> Rating dan Reviews </h1>
        </div>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <!-- Swiper 1 -->
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> 3 Detik masuk </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******29045 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-08-14 15:37:25 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> cepet bgt mantul </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******27776 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-08-10 10:00:56 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> cepet aman damai bang </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******85234 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-07-14 12:58:23 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> manteppp bgttt </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******85233 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-07-14 12:58:23 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> Recomend banget topup disini </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******85232 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-07-14 12:34:43 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> prosesnya cepet banget </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******85231 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-07-14 12:34:12 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
            <div class="swiper-slide rounded-xl md:rounded-xl lg:rounded-xl">
              <div class="overflow-hidden relative rounded-2xl md:rounded-3xl lg:rounded-xl">
                <div class="p-4 backdrop-blur-3xl rounded-2xl md:rounded-3xl lg:rounded-xl bg-blue-2/70 shadow-inner-lg flex flex-col gap-3">
                  <div class="flex flex-col gap-1">
                    <h2 class="text-md text-white text-center font-semibold leading-relaxed sm:text-xl"> mantap bos </h2>
                    <div class="flex gap-2 p-2 justify-center">
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                      <div>
                        <label class="bg-transparent p-1 sm:p-2 md:p-3 shadow-small rounded-full flex gap-2 flex-col backdrop-blur border border-white/10">
                          <img src="assets/images/star.png" class="w-10 md:w-12" alt />
                        </label>
                      </div>
                    </div>
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> TXO23******85230 </span>
                    <hr class="inline-block my-1 opacity-20 bg-white" />
                    <span class="text-xs text-white text-center opacity-60 font-light sm:text-lg"> 2023-05-25 18:48:44 </span>
                  </div>
                </div>
                <div class="absolute -bottom-12 -right-12 -z-50">
                  <div class="bg-yellow-primary w-64 blur-xl rounded-full aspect-square"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog -->
    <section class="py-10 md:py-40 relative">
      <div class="bg-no-repeat bg-top bg-contain absolute top-0 w-full opacity-20 h-full -z-10">
        <img src="assets/images/TE.png" class="bg-no-repeat bg-top bg-contain absolute top-0 w-full opacity-20 h-full -z-10" />
      </div>
      <div class="container max-w-6xl mx-auto px-2">
        <div class="grid grid-cols-12 items-center">
          <div class="col-span-12">
            <div class="flex flex-col gap-2 relative">
              <img src="fonts/brush.svg" class="sm:w-10 w-6 absolute top-0 sm:right-20 md:right-36 right-2" alt />
              <p class="text-sm md:text-lg lg:text-xl leading-none text-center text-yellow-primary font-semibold"> Tren dan Kabar Terkini </p>
              <h1 class="text-white text-xl font-bold leading-snug md:text-3xl text-center lg:text-4xl lg:leading-none w-9/12 mx-auto"> Temukan Semua Informasinya di Blog Kami! </h1>
              <p class="text-sm md:text-base font-light lg:text-lg leading-normal text-center text-white/70 mt-1"> "Selain TopUp kamu bisa mendapatkan inforamsi Tren dan Kabar Terkini!" </p>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 bg-[#22254B]/70 shadow-small backdrop-blur rounded-[30px] p-4 my-4 md:p-6 md:gap-6 gap-4">
          <a href="https://kontergame.id/blog/profile-una" class="col-span-2 row-span-2 rounded-2xl overflow-hidden cursor-pointer group">
            <div class="aspect-square bg-cover bg-center w-full h-full relative">
              <img src="assets/images/blog-square.jpg" class="aspect-square bg-cover bg-center w-full h-full relative" />
              <div class="absolute w-full h-full top-0 right-0 blog-bg flex flex-col justify-between sm:p-6 p-3">
                <div>
                  <span class="text-white rounded-full px-4 py-2 bg-[#202348]/50 group-hover:bg-[#202348]/70 transition text-xs sm:text-sm"> 30 July 2023 </span>
                </div>
                <div>
                  <h1 class="text-white text-lg sm:text-2xl line-clamp-2 font-medium"> Profil, Biodata dan Fakta EVOS Una, BA Esports </h1>
                  <span class="text-white/80 font-light text-sm line-clamp-1 sm:line-clamp-2">EVOS Esports menjadi terkenal bukan hanya keberhasilannya bertahan dalam kancah dunia esports dan menuntun beberapa tim esports mereka dalam memenangkan pertandingan. Hal ini juga dikarenakan EVOS Esports memiliki banyak brand ambassador yang cantik dan menggemaskan seperti salah satu sosok cantik dan imut yang menjadi perbincangan ramai di TikTok yaitu EVOS Una, kini menjadi Brand Ambassador dari tim EVOS Esports. Gadis cantik yang memiliki banyak penggemar ini, mungkin sering kalian temui di media sosial, tetapi jika kalian belum mengenal dekat dengan sosok EVOS Una, kali ini Dunia Games sudah menyiapkan beberapa informasi mengenai profil, biodata, umur, hingga pacar dari Una EVOS Esports beserta beberapa informasi lainnya dari Una yang dapat kalian simak melalui artikel berikut ini.</span>
                </div>
              </div>
            </div>
          </a>
          <a href="https://kontergame.id/blog/3-hal-sepele-namun-fatal-ketika-dapat-wiped-out-di-mobile-legends" class="col-span-1 rounded-2xl overflow-hidden cursor-pointer group">
            <div class="aspect-square bg-cover bg-center w-full h-full relative">
              <img src="assets/images/blog-square.jpg" class="aspect-square bg-cover bg-center w-full h-full relative" />
              <div class="absolute w-full h-full top-0 right-0 blog-bg flex flex-col justify-between p-2 sm:p-4">
                <div>
                  <span class="text-white rounded-full px-2 py-1 bg-[#202348]/50 group-hover:bg-[#202348]/70 transition text-xs"> 30 July 2023 </span>
                </div>
                <div>
                  <h1 class="text-white text-sm sm:text-base leading-none line-clamp-2 font-medium"> 3 Hal Sepele Namun Fatal Ketika Dapat Wiped Out Di Mobile Legends </h1>
                  <span class="text-white/80 font-light text-xs line-clamp-1 sm:line-clamp-2">
                    <p> Wiped Out merupakan salah satu istilah di game Mobile Legends dimana seluruh tim lawan terbunuh dalam waktu yang bersamaan. Biasanya situasi ini akan terjadi ketika kamu bersama tim menang dari War. <br /> Sayangnya, momentum ini terkadang tidak dimanfaatkan dengan baik oleh para pemain Mobile Legends dimana mereka masih saja melakukan hal sepele namun bisa berakibat fatal. Hal terburuknya adalah tim lawan bisa melakukan epic comback dimana keadaan permainan akan terbalik. <br /> Agar kamu tidak terjebak dalam kondisi tersebut, kamu wajib untuk mengetahui 3 hal sepele namun fatal ketika mendapatkan Wiped Out di Mobile Legends berikut ini: </p>
                    <p> Farming <br /> Yang pertama dan sering dilakukan adalah Farming. Ketika mendapatkan Wiped Out harusnya langsung berinisiatif untuk bermain objektif seperti push turret seluruh lane ataupun mengambil Lord. Sebagian pemain terkadang masih sibuk farming teruma para jungler dan goldlner. Farming sendiri memang penting namun jauh lebih penting untuk ambil objektif agar permainan bisa kamu menangkan. </p>
                    <p> Tidak Ambil Lord <br /> Selanjutnya adalah tidak mengambil Lord. Hal ini sangat konyol karena kalian membuang kesempatan emas untuk menguasai jalannya pertandingan bahkan kamu bisa menyelesaikannya. Lord merupakan objektif yang wajib banget kamu ambil jika berhasil dapatkan Wiped Out. Namun Lord ini juga bisa kamu abaikan jika waktu respawn hero lawan masih lama. Jadi lebih baik langsung hancurkan base lawan. </p>
                    <p> Tidak Push Turret <br /> Nah ini kesalahan yang paling umum dilakukan yaitu tidak push Turret sama sekali. Padahal, kesempatan untuk mendapatkan Turret sangatlah besar. Kamu bisa push secara bersamaan di satu lane yang sama untuk mendapatkan banyak Turret. Bahkan kamu bisa akhiri permainan dengan cara push Turret. <br /> Nah itu dia 3 kesalahan sepele namun fatal bagi para pemain Mobile Legends ketika mendapatkan momentum Wiped Out. Semoga informasi ini bermanfaat untuk kalian ya gamers. </p>
                  </span>
                </div>
              </div>
            </div>
          </a>
          <a href="https://kontergame.id/blog/3-hal-sepele-namun-fatal-ketika-dapat-wiped-out-di-mobile-legends" class="col-span-1 rounded-2xl overflow-hidden cursor-pointer group">
            <div class="aspect-square bg-cover bg-center w-full h-full relative">
              <img src="assets/images/blog-square.jpg" class="aspect-square bg-cover bg-center w-full h-full relative" />
              <div class="absolute w-full h-full top-0 right-0 blog-bg flex flex-col justify-between p-2 sm:p-4">
                <div>
                  <span class="text-white rounded-full px-2 py-1 bg-[#202348]/50 group-hover:bg-[#202348]/70 transition text-xs"> 30 July 2023 </span>
                </div>
                <div>
                  <h1 class="text-white text-sm sm:text-base leading-none line-clamp-2 font-medium"> 3 Rekomendasi Hero Mid Lane Andalan di Mobile Legends </h1>
                  <span class="text-white/80 font-light text-xs line-clamp-1 sm:line-clamp-2">
                    <p> Mid Lane merupakan posisi yang paling strategis karena posisi ini berada di tengah-tengah peta dan merupakan posisi yang paling dekat dengan lane lainnya, seperti Top lane, Bottom lane, Turtle, Buff, dan Junge. Posisi tersebut memungkinkan player untuk roam ke lane lain dengan mudah dan cepat. Namun, disisi lain, posisi yang strategis ini justru membuat Mid lane sebagai posisi yang juga sangat sibuk untuk para player karena hero di posisi ini memiliki tugas yang sangat penting selain mengurus lane nya sendiri, juga harus membantu war teman satu tim yang berada di lane lain yang dekat. Maka dari itu, penting untuk mengetahui karakter hero apa saja yang bisa diandalkan untuk menguasai lane ini. Simak 5 rekomendasi karakter hero Mid lane yang bisa diandalkan berikut ini: </p>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
    <!-- FAQ -->
    <section class="py-20 md:py-28 px-2 bg-cover bg-no-repeat md:bg-left bg-center min-h-screen bg-[url('../public/images/hero-2.png')] relative">
      <div class="container mx-auto max-w-6xl relative z-10">
        <div class="w-1/3 aspect-square rounded-full bg-yellow-primary/50 blur-[75px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="grid grid-cols-12 gap-1 place-content-center">
          <div class="col-span-12 mb-5 md:mb-8">
            <h1 class="text-white text-xl font-bold leading-normal md:text-3xl text-center lg:text-4xl lg:leading-relaxed"> Frequently Asked Questions (FAQ) </h1>
          </div>
          <div class="col-span-12 md:col-span-8 md:col-start-3 text-white" x-data="{ reportsOpen: false }">
            <div :class="!reportsOpen ? 'rounded-[20px]' : 'rounded-t-[20px] shadow-inset-yellow'" class="delay-300 shadow-inset-yellowtransition-all bg-darkblue/70 p-6 cursor-pointer flex justify-between items-center backdrop-blur-md" @click="reportsOpen = !reportsOpen">
              <span class="font-medium text-white/80 text-xs leading-normal md:text-base">Kenapa harus topup di kontergame</span>
              <span :class="reportsOpen ? 'rotate-90' : '' " class="text-white text-lg transition-all">
                <ion-icon name="caret-forward-circle-outline"></ion-icon>
              </span>
            </div>
            <div class="bg-[#11143A]/80 backdrop-blur-md rounded-b-[20px] transition-all duration-300 ease-in-out" x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
              <span class="text-xs font-light leading-normal text-white md:text-base p-6 inline-block">
                <p> Kamu dapat menemukan beragam pilihan jenis produk game populer. Mulai dari mobile game, PC game hingga konsol. Kamu juga dapat menemunkan berbagai produk digital seperti redeem code voucher dan aplikasi, paket pulsa hingga top up layanan langganan aplikasi. </p>
              </span>
            </div>
          </div>
          <div class="col-span-12 md:col-span-8 md:col-start-3 text-white" x-data="{ reportsOpen: false }">
            <div :class="!reportsOpen ? 'rounded-[20px]' : 'rounded-t-[20px] shadow-inset-yellow'" class="delay-300 shadow-inset-yellowtransition-all bg-darkblue/70 p-6 cursor-pointer flex justify-between items-center backdrop-blur-md" @click="reportsOpen = !reportsOpen">
              <span class="font-medium text-white/80 text-xs leading-normal md:text-base">Kenapa harus topup di kontergame</span>
              <span :class="reportsOpen ? 'rotate-90' : '' " class="text-white text-lg transition-all">
                <ion-icon name="caret-forward-circle-outline"></ion-icon>
              </span>
            </div>
            <div class="bg-[#11143A]/80 backdrop-blur-md rounded-b-[20px] transition-all duration-300 ease-in-out" x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
              <span class="text-xs font-light leading-normal text-white md:text-base p-6 inline-block">
                <p> Kamu dapat menemukan beragam pilihan jenis produk game populer. Mulai dari mobile game, PC game hingga konsol. Kamu juga dapat menemunkan berbagai produk digital seperti redeem code voucher dan aplikasi, paket pulsa hingga top up layanan langganan aplikasi. </p>
              </span>
            </div>
          </div>
          <div class="col-span-12 md:col-span-8 md:col-start-3 text-white" x-data="{ reportsOpen: false }">
            <div :class="!reportsOpen ? 'rounded-[20px]' : 'rounded-t-[20px] shadow-inset-yellow'" class="delay-300 shadow-inset-yellowtransition-all bg-darkblue/70 p-6 cursor-pointer flex justify-between items-center backdrop-blur-md" @click="reportsOpen = !reportsOpen">
              <span class="font-medium text-white/80 text-xs leading-normal md:text-base">Kenapa harus topup di kontergame</span>
              <span :class="reportsOpen ? 'rotate-90' : '' " class="text-white text-lg transition-all">
                <ion-icon name="caret-forward-circle-outline"></ion-icon>
              </span>
            </div>
            <div class="bg-[#11143A]/80 backdrop-blur-md rounded-b-[20px] transition-all duration-300 ease-in-out" x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
              <span class="text-xs font-light leading-normal text-white md:text-base p-6 inline-block">
                <p> Kamu dapat menemukan beragam pilihan jenis produk game populer. Mulai dari mobile game, PC game hingga konsol. Kamu juga dapat menemunkan berbagai produk digital seperti redeem code voucher dan aplikasi, paket pulsa hingga top up layanan langganan aplikasi. </p>
              </span>
            </div>
          </div>
          <div class="col-span-12 md:col-span-8 md:col-start-3 text-white" x-data="{ reportsOpen: false }">
            <div :class="!reportsOpen ? 'rounded-[20px]' : 'rounded-t-[20px] shadow-inset-yellow'" class="delay-300 shadow-inset-yellowtransition-all bg-darkblue/70 p-6 cursor-pointer flex justify-between items-center backdrop-blur-md" @click="reportsOpen = !reportsOpen">
              <span class="font-medium text-white/80 text-xs leading-normal md:text-base">Kenapa harus topup di kontergame</span>
              <span :class="reportsOpen ? 'rotate-90' : '' " class="text-white text-lg transition-all">
                <ion-icon name="caret-forward-circle-outline"></ion-icon>
              </span>
            </div>
            <div class="bg-[#11143A]/80 backdrop-blur-md rounded-b-[20px] transition-all duration-300 ease-in-out" x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
              <span class="text-xs font-light leading-normal text-white md:text-base p-6 inline-block">
                <p> Kamu dapat menemukan beragam pilihan jenis produk game populer. Mulai dari mobile game, PC game hingga konsol. Kamu juga dapat menemunkan berbagai produk digital seperti redeem code voucher dan aplikasi, paket pulsa hingga top up layanan langganan aplikasi. </p>
              </span>
            </div>
          </div>
          <div class="col-span-12 md:col-span-8 md:col-start-3 text-white" x-data="{ reportsOpen: false }">
            <div :class="!reportsOpen ? 'rounded-[20px]' : 'rounded-t-[20px] shadow-inset-yellow'" class="delay-300 shadow-inset-yellowtransition-all bg-darkblue/70 p-6 cursor-pointer flex justify-between items-center backdrop-blur-md" @click="reportsOpen = !reportsOpen">
              <span class="font-medium text-white/80 text-xs leading-normal md:text-base">Kenapa harus topup di kontergame</span>
              <span :class="reportsOpen ? 'rotate-90' : '' " class="text-white text-lg transition-all">
                <ion-icon name="caret-forward-circle-outline"></ion-icon>
              </span>
            </div>
            <div class="bg-[#11143A]/80 backdrop-blur-md rounded-b-[20px] transition-all duration-300 ease-in-out" x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
              <span class="text-xs font-light leading-normal text-white md:text-base p-6 inline-block">
                <p> Kamu dapat menemukan beragam pilihan jenis produk game populer. Mulai dari mobile game, PC game hingga konsol. Kamu juga dapat menemunkan berbagai produk digital seperti redeem code voucher dan aplikasi, paket pulsa hingga top up layanan langganan aplikasi. </p>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full h-full bg-gradient-to-l from-[#11143A] to-transparent absolute top-0 right-0"></div>
    </section>
    <!-- Contact -->
    <section class="py-20 md:py-32 overflow-x-hidden relative" id="kontak">
      <div class="container mx-auto max-w-6xl relative">
        <div class="grid grid-cols-12">
          <div class="col-span-12 md:col-span-10 md:col-start-2 sm:p-24 md:rounded-[30px] bg-[#11143A]/70 py-16 relative px-2">
            <img src="assets/images/gold.png" class="lg:h-72 md:h-52 h-40 absolute top-0 right-0 translate-x-1/2 -translate-y-1/2" alt />
            <img src="assets/images/crystal.png" class="h-20 md:h-40 absolute bottom-0 md:-left-10 left-0" alt />
            <h1 class="text-white text-xl font-bold leading-normal md:text-3xl text-center lg:leading-relaxed relative z-10"> Kami Siap Membantu Anda Mencapai Puncak! </h1>
            <p class="text-white text-[10px] md:text-base font-light lg:text-lg leading-relaxed text-center"> Tim support kami siap membantu Anda dari pukul <span class="font-bold">9 pagi</span> hingga <span class="font-bold">10 malam, 7 hari seminggu. </span>
            </p>
            <form action method="POST">
              <div class="flex gap-5 flex-col mt-10">
                <div x-data="{count : 0}" :class="count >= 1 ? 'border-yellow-primary' : 'border-transparent'" class="input-container border">
                  <input x-ref="panjang" @keyup="count = $refs.panjang.value.length" type="text" class="input-element uppercase appearance-none peer" name="name" placeholder=" " />
                  <label class="input-label">Nama Lengkap</label>
                </div>
                <div x-data="{count : 0}" :class="count >= 1 ? 'border-yellow-primary' : 'border-transparent'" class="input-container border">
                  <input x-ref="panjang" @keyup="count = $refs.panjang.value.length" type="text" class="input-element uppercase appearance-none peer" name="wa" placeholder=" " />
                  <label class="input-label">No. WhatsApp</label>
                </div>
                <div x-data="{count : 0}" :class="count >= 1 ? 'border-yellow-primary' : 'border-transparent'" class="input-container border">
                  <textarea placeholder=" " x-ref="panjang" @keyup="count = $refs.panjang.value.length" class="input-element appearance-none peer" name="message" id rows="3"></textarea>
                  <label class="input-label">Pesan</label>
                </div>
                <button class="btn-yellow flex-none w-40 self-end" type="submit" name="tombol" value="submit"> Kirim Pesan </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
@endsection