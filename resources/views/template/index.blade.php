@extends('template.template')

@section('custom_style')


<style>
        .product .box{margin-bottom:52px}

        .ph-item{

            border: none;
            background-color: transparent;
            padding: 0px;
            margin-bottom: 0px;

        }

        .ph-picture{
            border-radius: 10px;
        }

        .ph-col-12{
            border-radius: 10px;
        }
        
        .carousel-indicators{
            margin-bottom: -1.5rem;
        }
        
        
        .carousel-indicators button.active{
            
            background-color: var(--warna_2) !important;
            height: 12px;
            width: 30px;
            display: inline-block;
            border-radius: 0.5rem !important;
            opacity: 1;

        }
        
        .carousel-indicators [data-bs-target] {
            box-sizing: content-box;
            flex: 0 1 auto;
            width: 12px; 
            height: 12px; 
            padding: 0;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: var(--warna_2) !important;
            background-clip: padding-box;
            border: 0;
            /*border-top: 10px solid transparent;*/
            /*border-bottom: 10px solid transparent;*/
            opacity: .5;
            transition: opacity .6s ease;
            border-radius: 100%; 
        }
        

.wrapper{
  width: 100%;
}
.wrapper nav{
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
}
.wrapper nav label{
  display: block;
  margin: 12px;
  padding: 5px;
  cursor: pointer;
  position: relative;
  z-index: 1;
  color: #818181;
  font-size: 16px;
  font-weight: bold;
  transition: all 0.3s ease;
  border-radius: 0.5rem;
}
.wrapper nav label:hover{
  color: var(--warna_2);
}

#game:checked ~ nav label.game,
#joki:checked ~ nav label.joki,
#pulsa:checked ~ nav label.pulsa,
#e-wallet:checked ~ nav label.e-wallet{
  color: #fff;
  background: var(--warna_2);
}
nav label{
 
}
nav label i{
 font-size: 35px;
}
nav label p{
 
 color: #000;
 font-size: 14px;
}

input[type="radio"]{
  display: none;
}

}
#game:checked ~ nav .slider{
  left: 0%;
}
#joki:checked ~ nav .slider{
  left: 16%;
}
#pulsa:checked ~ nav .slider{
  left: 31.5%;
}
#e-wallet:checked ~ nav .slider{
  left: 51%;
}
section .content{
  display: none;
  margin-top: 25px;
}
#game:checked ~ section .game,
#joki:checked ~ section .joki,
#pulsa:checked ~ section .pulsa,
#e-wallet:checked ~ section .e-wallet{
  display: block;
}
section .content .title{
  
}
section .content p{

}
.slider{
  position: absolute;
  height: 3px;
  width: 10%;
  margin-left: 14px;
  margin-bottom: 10px;
  background: var(--warna_2);
  bottom: 0;
}
.flash-sale p .timerFlash {
        display: inline-block;
        padding: 5px 16px;
        background: #AB0000;
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        letter-spacing: 2px;
        margin-left: 8px;
    }
    .flash-sale-card {
        height: 165px;
    }
    .flash-sale-card .text {
        padding: 10px !important;
    }
    .flash-sale-card h3 {
        font-size: 16px;
        top: 8px;
        left: 10px;
    }
    .flash-sale-card .price {
        font-size: 14px;
    }
</style>
<style>
.animate-shimmer {
    animation: shimmer 1.75s linear infinite
}

@keyframes  flicker {
    0%,19.999%,22%,62.999%,64%,64.999%,70%,to {
        opacity: .99;
        filter: drop-shadow(0 0 1px rgba(252,211,77)) drop-shadow(0 0 15px rgba(245,158,11)) drop-shadow(0 0 1px rgba(252,211,77))
    }

    20%,21.999%,63%,63.999%,65%,69.999% {
        opacity: .4;
        filter: none
    }
}

.animate-flicker {
    animation: flicker 3s linear infinite
}

@keyframes  spin {
    to {
        transform: rotate(1turn)
    }
}

.animate-spin {
    animation: spin 1s linear infinite
}
</style>

<style>
    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 80%;
        height: 100%;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
</style>

@endsection


@section('content')


        <ul class="circles d-block d-lg-none d-md-none px-0">
            <img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        
        <div class="content-body" style="">
            <div class="container"> 
                <form class="d-block d-md-none" onkeydown="return event.key != 'Enter';">
                    <input type="text" class="form-control search-input" placeholder="Cari Game Favoritmu">
                </form>
                <div class="mb-5">

                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                       
                            @foreach($banner as $data)
                            <div class="swiper-slide {{$loop->first ? 'active' : ''}}">
                                <img src="https://kontergame.id{{ $data->path }}" class="d-block w-100 rounded" />
                            </div>
                            @endforeach
                        
                            <div class="swiper-pagination"></div>  
                            </div>
                            
                        </div>
                    </div>
                    
                <div class="wrapper mt-5">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="icon-scroll row d-flex flex-row flex-nowrap overflow-scroll justify-content-between">

                                <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/mobile-game')}}'">
                                    <img src="assets/icons/game.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">Mobile Game</p>
                                </div>
                                
                                <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/pc-game')}}'">
                                    <img src="assets/icons/pc-game.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">PC Game</p>
                                </div>
                                
                                <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/streaming-app')}}'">
                                    <img src="assets/icons/streaming-app.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">Streaming App</p>
                                </div>
                                
                                    <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/kode-voucher')}}'">
                                    <img src="https://d1x91p7vw3vuq8.cloudfront.net/game_category/2022524/aztnkb84petpmj78haheiq.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">Voucher Game</p>
                                </div>
                                
                                <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/pulsa-utilitas')}}'">
                                    <img src="assets/icons/pulsa-utilitas.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">Pulsa & Utilitas</p>
                                </div>
                                
                                <div class="card border-0 shadow-0 bg-none" style="width: 5rem;" onclick="window.location='{{url('/c/jasa-joki')}}'">
                                    <img src="assets/icons/jasa-joki.svg" class="card-img-top mx-auto" style="background:var(--dark); width:2.5rem; border-radius:0.5rem;">
                                    <p class="card-text text-center pt-1" style="font-size:12px;">Jasa Joki ML</p>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-6 d-none d-md-block py-3 rounded" style="background: var(--lightdark)">
                            <div class="small fw-light mb-3">Cari Game Favoritmu</div>
                            <form onkeydown="return event.key != 'Enter';">
                                <input type="text" class="form-control search-input" style="margin-top: 0" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if($config->flash == "1")
        <section class="flash-sale">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                             <h3 class="mb-3" style="font-size: 1.2rem;">
                            <!--<i class="bi bi-lightning-charge-fill" style="color: var(--warna_2);"></i>-->
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="h-8 w-8 animate-flicker" height="1.2em" width="1.2em" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z" style="color: rgba(252,211,77);"></path></svg>
                           FLASH DEAL</h3>
                            <!-- <a href="#" class="link">Lihat Lebih Banyak</a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="buying-step-card dark">
                            <p>Berakhir Dalam<span class="timerFlash" id="timerFlash"></span></p>
                            <div class="fss owl-carousel">
                                @foreach($layanan as $layanan1)
                            
                            @if($layanan1->event == "1" OR $layanan1->event == "habis")
                                         <div class="item">
                                        <div class="flash-sale-card">
                                            <figure class="ratio ratio-1">
                                                <img src="{{ $layanan1->thumbnail_kategori  }}" alt="" />
                                            </figure>
                                            <h3>
                                                <a href="{{url('/order')}}/{{$layanan1->kode_kategori}}" style="cursor: pointer">{{ $layanan1->nama_kategori }}</a>
                                                <p style="font-size: 10px;">{{ $layanan1->layanan }}</p>
                                            </h3>
                                            <div class="text">
                                                <a href="{{url('/order')}}/{{$layanan1->kode_kategori}}" style="cursor: pointer">
                                                    <br>
                                                    <div class="old-price"><font size= "2" color="#FF0000">Rp {{ number_format($layanan1->harga_awal) }}</font></div>
                                                    <div class="price">Rp {{ number_format($layanan1->harga) }}</div>
                                                    @if($layanan1->event == "1")
                                                    <div class="bar"><span style="width: {{ $layanan1->sisa }}%;"></span></div>
                                                    <span>Tersisa {{ $layanan1->sisa }}</span>
                                                     @endif
                                                     @if($layanan1->event == "habis")
                                                    <div class="bar"><span style="width: {{ $layanan1->sisa }}%;"></span></div>
                                                    <span>{{ $layanan1->sisa }}</span>
                                                     @endif
                                                 </a>
                                            </div>
                                        </div>
                                    </div>
                 @endif
                                     
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!--FLASH SALE END-->
            <div class="skeleton-loader mt-5">
                <div class="container">
                
                @for($i=1;$i<=5;$i++)
                
                <div class="ph-item">
                    <div class="ph-col-12">
                        <div class="ph-picture"></div>
                        <div class="ph-row">
                            <div class="ph-col-12"></div>
                        </div>
                    </div>
                </div>
    
                @endfor
                </div>
                
            </div>
        
        {{--
        <div class="content-body-populer">
            <div class="container">
                <section class="px-2 item-skeleton-content d-none mt-5 mb-50" style="">
                <h4 class="mb-3" style="font-size: 1.2rem;"><i class="fa-solid fa-fire fa-beat-fade fa-lg" style="color: var(--warna_2);"></i> Paling Populer</h4>
                <div class="product row d-flex flex-row flex-nowrap overflow-scroll pt-4">
                    
                    @foreach($kategori as $category)
                    
                    @if($category->kode == "mobile-legends" || $category->kode == "free-fire" || $category->kode == "genshin-impact"||$category->kode == "pubg-mobile-indonesia" || $category->kode == "Youtube-Premium")
                    
                    <div class="col-4 col-md-2">
                        <a href="{{url('/order')}}/{{$category->kode}}" class="box">
                            <img class="shadow-lg" src="{{ $category->thumbnail  }}" alt="">
                            <span>{{ $category->sub_nama }}</span>
                            <p class="mb-0">{{ $category->nama }}</p>
                        </a>
                    </div>
                    
                    @endif
                             
                    @endforeach 
                      
                </div>
            </section>
            </div>
        </div>
        --}}
            
        <div class="content-body">
            <div class="container px-0">
                <section class="px-2 item-skeleton-content d-none" style="">
                    <h4 class="mb-3 mt-5" style="font-size: 1.2rem;">Top Up Games</h4>
                    <div class="product row pt-4">
                        
                        @foreach($kategori as $category)
                        
                        @if($category->tipe == "game")
                        
                        
                        <div class="col-md-2 col-4 col-g">
                            <div class="games-area">
                                <a href="{{url('/order')}}/{{$category->kode}}" class="product_list" style="background-image: url('{{ $category->thumbnail }}');">
                                    <div class="games-bg-blur">
                                        <h6>{{ $category->nama }}</h6>
                                        <span>{{ $category->sub_nama }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                                   
                        @endif
                                 
                        @endforeach             
                                
                    </div>
                </section>
                
                <section class="px-2 item-skeleton-content d-none" style="">
               <h4 class="mb-3 mt-5" style="font-size: 1.2rem;">Streaming App</h4>
                    <div class="product row pt-4">
                        
                        @foreach($kategori as $category)
                        
                        @if($category->tipe == "streaming-app")
                        
                        <div class="col-md-2 col-4 col-g">
                            <div class="games-area">
                                <a href="{{url('/order')}}/{{$category->kode}}" class="product_list" style="background-image: url('{{ $category->thumbnail }}');">
                                    <div class="games-bg-blur">
                                        <h6>{{ $category->nama }}</h6>
                                        <span>{{ $category->sub_nama }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                                   
                        @endif
                                 
                        @endforeach             
                                
                    </div>
                </section>
                
                <section class="px-2 item-skeleton-content d-none" style="">
                <h4 class="mb-3 mt-5" style="font-size: 1.2rem;">Voucher Game</h4>
                    <div class="product row pt-4">
                        
                        @foreach($kategori as $category)
                        
                        @if($category->tipe == "voucher")
                        
                        <div class="col-md-2 col-4 col-g">
                            <div class="games-area">
                                <a href="{{url('/order')}}/{{$category->kode}}" class="product_list" style="background-image: url('{{ $category->thumbnail }}');">
                                    <div class="games-bg-blur">
                                        <h6>{{ $category->nama }}</h6>
                                        <span>{{ $category->sub_nama }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                                   
                        @endif
                                 
                        @endforeach             
                                
                    </div>
                </section>
                
                <section class="px-2 item-skeleton-content d-none" style="">
                    <h4 class="mb-3 mt-5" style="font-size: 1.2rem;">Pulsa & Utilitas</h4>
                    <div class="product row pt-4">
                        
                        @foreach($kategori as $category)
                        
                        @if($category->tipe == "pulsa")
                        
                        <div class="col-md-2 col-4 col-g">
                            <div class="games-area">
                                <a href="{{url('/order')}}/{{$category->kode}}" class="product_list" style="background-image: url('{{ $category->thumbnail }}');">
                                    <div class="games-bg-blur">
                                        <h6>{{ $category->nama }}</h6>
                                        <span>{{ $category->sub_nama }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                                   
                        @endif
                                 
                        @endforeach             
                                
                    </div>
                </section>
                
                {{--
                <section class="px-2 item-skeleton-content d-none" style="">
               <h4 class="mb-3" style="font-size: 1.2rem;">Jasa Joki</h4>
                    <div class="product row pt-4">
                        
                        @foreach($kategori as $category)
                        
                        @if($category->tipe == "joki")
                        
                        <div class="col-md-2 col-4 col-g">
                            <div class="games-area">
                                <a href="{{url('/order')}}/{{$category->kode}}" class="product_list" style="background-image: url('{{ $category->thumbnail }}');">
                                    <div class="games-bg-blur">
                                        <h6>{{ $category->nama }}</h6>
                                        <span>{{ $category->sub_nama }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                                   
                        @endif
                                 
                        @endforeach             
                                
                    </div>
                </section>
                --}}
    
                <section class="px-2 resultsearch d-none mt-4" style="padding-bottom: 2rem;">
                    <h4 class="mb-2" style="font-size: 1rem;">Hasil Pencarian</h4><br>
                    <div class="product productresultsearch row">
                        
       
                                
                    </div>
                </section>
            </div>
        </div>
        
        <div class="lb"></div>
                <div class="content-body pb-5">
            <div class="footer text-center pt-4">
                <img src="{{url('')}}{{ !$config ? '' : $config->logo_footer }}" alt="" width="176px" class="mb-2">
                <div class="text-center py-1">
                    <p>{{ !$config ? '' : $config->deskripsi_web }}</p>
                </div>
                
                <div class="text-center py-3">
                    <b>Metode Pembayaran</b>
                </div>
                <div class="owl-carousel metode-top owl-theme mb-2">
                    @foreach($pay_method as $p)
                    <div class="item">
                        <div class="metode">
                            <img src="{{$p->images}}" alt="" height="30">
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center py-3">
                    <b>Berlangganan</b>
                </div>
                <div class="sosmed">
                    <a href="{{ !$config ? '' : $config->url_wa }}" target="_blank">
                        <img src="/assets/icons/social-whatsapp.svg" alt="">
                    </a>
                    <a href="{{ !$config ? '' : $config->url_fb }}" target="_blank">
                        <img src="/assets/icons/social-facebook.svg" alt="">
                    </a>
                    
                    <a href="{{ !$config ? '' : $config->url_ig }}" target="_blank">
                        <img src="/assets/icons/social-instagram.svg" alt="">
                    </a>
                 </div>
                <p class="pb-4 text-copyright">&copy; {{ ENV('APP_NAME') }} 2023 - All Right Reserved</p>
            </div>
        </div>
        
        <style type="text/css">
		        .containerFAB {
		            position: fixed;
		            z-index: 9;
		            bottom: 75px; 
		            width: 465px;
		        }
		        @media only screen and (max-width: 520px) {
			        .containerFAB {
			            position: fixed;
			            z-index: 9;
			            bottom: 75px; 
			            width: 97%;
			        }
				}
		        .areaFAB {
		            height: 48px;
		            width: 48px;
		            background: #07B53B;
		            border-radius: 10px;
		            text-align: center;
		            float: right;
		        }
		    </style>
		    <!-- FAB WHATSAPP -->
		    <div class="containerFAB d-block d-md-none">
		        <div class="areaFAB">
		            <a href="{{ !$config ? '' : $config->url_wa }}" class="text-decoration-none" target="_blank" rel="noopener">
		            	<i class="fab fa-whatsapp" style="color : #fff; font-size: 32px; padding: 6px;"></i>
		           	</a>                 
		        </div>                    
		    </div>

        <div class="menu-bottom px-2 d-block d-md-none">
            <div class="row">
                <div class="col-3">
                    <a href="{{url('/')}}" class="active">
                        <i class="mdi mdi-home"></i>
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{url('/cari')}}">
                        <i class="mdi mdi-history"></i>
                        <p>Riwayat</p>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{url('/daftar-harga')}}">
                        <i class="mdi mdi-view-list"></i>
                        <p>Harga</p>
                    </a>
                </div>
                
                <div class="col-3">
                     @if(Auth::check())
                    @if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold')
                    <a href="{{url('/user/dashboard')}}">
                        <i class="mdi mdi-account-circle"></i>
                        <p>Akun</p>
                    </a>
                    @else
                    <a href="{{url('/dashboard')}}">
                        <i class="mdi mdi-account-circle"></i>
                        <p>Akun</p>
                    </a>
                    @endif
                    @else
                    <a href="{{url('/login')}}">
                        <i class="mdi mdi-account-circle"></i>
                        <p>Akun</p>
                    </a>
                    @endif
                </div>
            </div>
        </div>
  
<!--  Modal content for the above example -->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pengumuman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src='{{ isset($popup->path) ? $popup->path : "" }}' width="100%" class="img-fluid">
                <span class="text-dark">{!! isset($popup->deskripsi) ? $popup->deskripsi : "<p class='text-center'>Selamat datang di ".ENV("APP_NAME")." Selamat berbelanja.</p>" !!}</span>
                <div class="row">
                    <div class="col-6 mt-2">
                        <label class="form-check-label float-start text-muted fw-dark" for="customCheck1">Jangan tampilkan lagi </label> 
                        <input type="checkbox" class="form-check-input" id="dontShow">
                    </div>
                    <div class="col-6 mt-1">
                        <button type="button" class="btn btn-dark float-end" data-bs-dismiss="modal" onclick="disablePopup()">Close</button>
                 



@push('custom_script')



<script type="text/javascript">
    var cookie = document.cookie.split("; ");

    if(cookie.length < 2){
        $(document).ready(function(){
            $("#popup").modal("show");
            
        })
    }
    
    function disablePopup(){
        var checkBox = document.getElementById("dontShow");
        var date = new Date();
        date.setTime(date.getTime()+(1*24*60*60*1000));
        
        if(checkBox.checked){
            document.cookie = "popup=0; expires="+ date.toGMTString();
        }
    }
            $('.metode-top').owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1000,
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:7
                    }
                }
            });
            $('.metode-bottom').owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1000,
                rtl: true,
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:7
                    }
                }
            });

            $(window).on('load',function(){
                setTimeout(() => {
                    $('.skeleton-loader').addClass('d-none');
                    $('.item-skeleton-content').removeClass('d-none');
                }, 1500);
            });
            
            var delay = (function () {
                var timer = 0;
                return function (callback, ms) {
                        clearTimeout(timer);
                        timer = setTimeout(callback, ms);
                    };
                })();
            
            $('.search-input').keyup(function(){
               const data = $(this).val();
               if (data.length < 1) {
                     $('.skeleton-loader').removeClass('d-none');
                     $('.resultsearch').addClass('d-none');
                     $('.productresultsearch').empty();
                     setTimeout(() => {
                        $('.skeleton-loader').addClass('d-none');
                        $('.item-skeleton-content').removeClass('d-none');
                    }, 1000);
                }else{
                    
                    delay(function () {

                                            $.ajax({
                                                url: "{{url('/cari/index')}}",
                                                method: "POST",
                                                data: {
                                                    data: data
                                                },
                                                beforeSend: function () {
                                                    $('.item-skeleton-content').addClass('d-none');
                                                    $('.skeleton-loader').removeClass('d-none');
                                                    $('.resultsearch').addClass('d-none');
                                                    $('.productresultsearch').empty();
                                                },
                                                success: function (res) {
                                                    
                                                    setTimeout(() => {
                                                        $('.skeleton-loader').addClass('d-none');
                                                        $('.resultsearch').removeClass('d-none');
                                                        $('.productresultsearch').append(res);
                                                    }, 1000);
                                                }
                                            })

                                        }, 1000);
                    
                }
               
            });
            
        </script>
</script>
<script type="text/javascript">
	var flashSaleEnd = "{{ !$config ? '' : $config->tanggal }} {{ !$config ? '' : $config->waktu }}";
	if (flashSaleEnd != "0") {
		var countDownDateFlash = new Date("{{ !$config ? '' : $config->tanggal }} {{ !$config ? '' : $config->waktu }}").getTime();
	} else {
		var countDownDateFlash = new Date().getTime();
	}
    
	$(document).ready(function(){                
        // Update the count down every 1 second
        if (flashSaleEnd != "0") {
	        var timerFlash = setInterval(function() {

	            // Get today's date and time
	            var nowFlash = new Date().getTime();
	                
	            // Find the distance between now and the count down date
	            var distanceFlash = countDownDateFlash - nowFlash;
	                
	            // Time calculations for days, hours, minutes and seconds
	  			var daysFlash = Math.floor(distanceFlash / (1000 * 60 * 60 * 24));
	            var hoursFlash = Math.floor((distanceFlash % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	            var minutesFlash = Math.floor((distanceFlash % (1000 * 60 * 60)) / (1000 * 60));
	            var secondsFlash = Math.floor((distanceFlash % (1000 * 60)) / 1000);
	                
	            // Output the result in an element with id="demo"
	            if (daysFlash == 0) {
	            	var lgth = hoursFlash.toString().length;
	            	if (lgth > 1) {
	            		hoursFlash = hoursFlash;
	            	} else {
	            		hoursFlash = "0"+hoursFlash;
	            	}
	            	var lgthtimes = minutesFlash.toString().length;
	            	if (lgthtimes > 1) {
	            		minutesFlash = minutesFlash;
	            	} else {
	            		minutesFlash = "0"+minutesFlash;
	            	}
	            	var lgthtimesSecond = secondsFlash.toString().length;
	            	if (lgthtimesSecond > 1) {
	            		secondsFlash = secondsFlash;
	            	} else {
	            		secondsFlash = "0"+secondsFlash;
	            	}
	            	document.getElementById("timerFlash").innerHTML = hoursFlash + ":" + minutesFlash + ":" + secondsFlash;
	            } else if (hoursFlash == 0) {
	            	var lgthtimes = minutesFlash.toString().length;
	            	if (lgthtimes > 1) {
	            		minutesFlash = minutesFlash;
	            	} else {
	            		minutesFlash = "0"+minutesFlash;
	            	}
	            	var lgthtimesSecond = secondsFlash.toString().length;
	            	if (lgthtimesSecond > 1) {
	            		secondsFlash = secondsFlash;
	            	} else {
	            		secondsFlash = "0"+secondsFlash;
	            	}
	            	document.getElementById("timerFlash").innerHTML = minutesFlash + ":" + secondsFlash;
	            } else {
	            	var lgth = hoursFlash.toString().length;
	            	if (lgth > 1) {
	            		hoursFlash = hoursFlash;
	            	} else {
	            		hoursFlash = "0"+hoursFlash;
	            	}
	            	var lgthtimes = minutesFlash.toString().length;
	            	if (lgthtimes > 1) {
	            		minutesFlash = minutesFlash;
	            	} else {
	            		minutesFlash = "0"+minutesFlash;
	            	}
	            	var lgthtimesSecond = secondsFlash.toString().length;
	            	if (lgthtimesSecond > 1) {
	            		secondsFlash = secondsFlash;
	            	} else {
	            		secondsFlash = "0"+secondsFlash;
	            	}
	            	document.getElementById("timerFlash").innerHTML = daysFlash + "hari " + hoursFlash + ":" + minutesFlash + ":" + secondsFlash;
	            }

	            // If the count down is over, write some text 
	            // console.log(distanceFlash);
	            if (distanceFlash < 0) {
	            	document.getElementById("timerFlash").innerHTML = "0:0:0";
	                updateFlashSale();
	                clearInterval(timerFlash);
	                location.reload();
	            }
	        }, 1000);

	        $(".fss").owlCarousel({
	            pagination: true,
	            loop: true,
	            items: 1.5,
			    autoPlay:true,
			    autoplayTimeout:2000,
			    autoplayHoverPause:true,
	            itemsDesktop: 4.5,
	            itemsDesktopSmall: 3.5,
	            itemsTablet: 3.5,
	            itemsMobile: 2.5,
	        });
	    }

        const mySwiper = new Swiper('.mySwiper', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            centeredSlidesBounds: true,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 400,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>

@endpush




@endsection