@extends('template.template')

@section('custom_style')


<style>
    .accordion-button {
            box-shadow: none !important;
        }
        .btn.disabled, .btn:disabled, fieldset:disabled {
            background: #8ba4b1;
            border-color: #8ba4b1;
        }
        .product .box {
            margin-bottom: 40px;
        }
</style>


@endsection


@section('content')



<div style="height: 800px;">
			<div class="px-3 py-2 bg-white">
				<a href="{{url('/login')}}" class="text-decoration-none">
					<i class="color mdi mdi-arrow-left" style="font-size: 24px;"></i>
				</a>
				<span class="color d-inline-block ms-3 title">Mendaftar</span>
			</div>
			<div class="px-3 pt-3 mb-3">
				<h2>Halo, mari bergabung</h2>
				<p class="mb-2">Buat akun sekarang dan rasakan fitur fitur yang menarik. ✌️</p>
				@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<form action="{{url('/register')}}" method="POST" class="my-form">
				    @csrf
					<div class="mb-3">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" autocomplete="off" name="nama" required>
					</div>
					<div class="mb-3">
						<label>Username</label>
						<input type="text" class="form-control" autocomplete="off" name="username" required>
					</div>
					<div class="mb-3">
						<label>Password</label>
						<input type="password" class="form-control" autocomplete="off" name="password" required>
					</div>
					<div class="mb-3">
						<label>No Whatsapp</label>
						<input type="number" class="form-control" autocomplete="off" name="no_wa" required>
					</div>
					<div class="mt-3">
						<button class="btn btn-primary w-100" type="submit" name="tombol" value="submit">Mendaftar</button>
					</div>
					<p class="mt-3">Sudah memiliki akun? <a href="{{url('/login')}}" class="text-decoration-none color">Login!</a></p>
				</form>
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
                <p class="pb-4 text-copyright">&copy; {{ ENV('APP_NAME') }} 2022 - All Right Reserved</p>
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
                    <a href="{{url('/cari')}}">
                        <i class="mdi mdi-history"></i>
                        <p>Riwayat</p>
                    </a>
                </div>
                <div class="col-4">
                    @if(Auth::check())
                    @if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold')
                    <a href="{{url('/user/dashboard')}}" class="active">
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
                    <a href="{{url('/login')}}" class="active">
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
