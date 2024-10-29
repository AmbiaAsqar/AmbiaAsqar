@extends('template.template')

@section('custom_style')


<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
</style>


@endsection


@section('content')

<div style="height: auto">
<div class="py-3 text-center mb-3 d-md-none" style="background-color: rgb(38 46 64 / 1);">
	<span class="color">Riwayat</span>
</div>
			            
<div class="container mt-md-5">
                        
                    	<div class="row" style="position: relative;z-index: 1;">
                    		<div class="col-md-7">
                    			<div class="card-cek">
                    				<h1>Lacak pesanan kamu</h1>
                    				<p>Pesanan Kamu tidak terdaftar meskipun Kamu yakin telah memesan? Harap tunggu 1-5 menit. Tetapi jika pesanan masih belum muncul, Kamu bisa Hubungi Kami.</p>
                    				@if(session('error'))
                        			    <div class="alert alert-danger">
                        			       <ul>
                        			           <li>{{session('error')}}</li>
                        			       </ul>
                        			    </div>
                        			@endif
                        			@if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                    				<form action="{{url('/cari')}}" method="POST" class="my-form">
				                        @csrf
                    					<div class="mb-3">
                    						<label>No. Transaksi</label>
                    						<input type="text" placeholder="INVxxxxxxKG" class="form-control" name="id" autocomplete="off" required>
                    					</div>
                    					<button type="submit" name="submit" value="submit" class="btn btn-primary fs-16"><i class="fa fa-search mr-2"></i>Cari Transaksi</button>
                    				</form>
                    				<div style="height: 50vh"></div>
                    			</div>
                    		</div>
						</div>
                    </div>
</div>

		
        <div class="lb"></div>
                <div class="content-body pb-5">
            <div class="footer text-center pt-4">
                <img src="{{url('')}}{{ !$config ? '' : $config->logo_footer }}" alt="" width="176px" class="mb-3">
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

        <div class="menu-bottom px-2">
            <div class="row">
                <div class="col-4">
                    <a href="{{url('/')}}">
                        <i class="mdi mdi-home"></i>
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{url('/cari')}}" class="active">
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



@endpush




@endsection