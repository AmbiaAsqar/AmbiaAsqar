 @extends('template.template')

@section('custom_style')


<style>
        .product .box{margin-bottom:40px}

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
        
    
        .carousel-item{
            padding: 0 !important;
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
        
</style>


@endsection


@section('content')



        
<div class="header px-3 border-bottom d-md-none">
    <a href="{{url('/')}}" class="text-decoration-none">
	    <i class="color mdi mdi-arrow-left" style="font-size: 24px;"></i>
	</a>
	<span class="color d-inline-block ms-5 title">Pulsa & Utilitas</span>
</div>

<div class="content-body">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  
                <div class="carousel-inner">
                    @foreach($banner as $data)
                    <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                      <img src="{{ $data->path }}" class="d-block w-100">
                    </div>
                    @endforeach
                  </div>
                  
                  <div class="carousel-indicators">
                    @foreach($banner as $data)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></button>
                    @endforeach
                  </div>
                  
                </div>
                
            <div class="skeleton-loader mt-5">
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

            <section class="px-2 item-skeleton-content d-none mt-5" style="">
                <h4 class="mb-3" style="font-size: 1.2rem;"><i class="bi bi-grid-fill" style="color: var(--warna_2);"></i> Pulsa & Utilitas</h4>
                <div class="product row pt-4">
                    
                    @foreach($kategori as $category)
                    
                    @if($category->kategori == "pulsa-utilitas")
                    
                    <div class="col-4">
                        <a href="{{url('/order')}}/{{$category->kode}}" class="box">
                            <img class="shadow-sm" src="{{ $category->thumbnail  }}" alt="">
                            <span>{{ $category->sub_nama }}</span>
                            <p class="mb-0">{{ $category->nama }}</p>
                            <h class="btn btn-primary btn-sm">Top Up</h>
                        </a>
                    </div>
                               
                    @endif
                             
                    @endforeach             
                            
                </div>
            </section>

    <div class="wrapper">
            
            <section class="px-2 resultsearch d-none" style="padding-bottom: 2rem;">
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
                <p class="pb-4 text-copyright">&copy; {{ ENV('APP_NAME') }} 2022 - All Right Reserved</p>
            </div>
        </div>

        <div class="menu-bottom px-2">
            <div class="row">
                <div class="col-4">
                    <a href="{{url('/')}}" class="active">
                        <i class="mdi mdi-home"></i>
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{url('/cari')}}">
                        <i class="mdi mdi-history"></i>
                        <p>Riwayat</p>
                    </a>
                </div>
                <div class="col-4">
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
        






@push('custom_script')


<script>
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
                        items:3
                    },
                    1000:{
                        items:4
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
                        items:3
                    },
                    1000:{
                        items:4
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


@endpush




@endsection