@extends('template.template')

@section('custom_style')


<style>
    .accordion-button{box-shadow:none!important}
    .btn.disabled,.btn:disabled,fieldset:disabled{background:#8ba4b1;border-color:#8ba4b1}
    .product .box{margin-bottom:40px}
    
    .box-profile{margin-top:-190px}
    .box-profile .body{border-radius:24px;height:410px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .box-profile .body .img{width:100px;height:100px;border-radius:50%;text-align:center;line-height:100px;border:2px solid #fff;margin:-50px auto;font-size:22px}
</style>


@endsection


@section('content')



<div style="height: auto;">
			<div class="bg-primary pt-4" style="height: 370px;border-radius: 0 0 39px 39px;">
				<a href="{{url('/user/dashboard')}}" class="text-decoration-none float-start ms-3" style="margin-top: 48px;position: absolute;">
					<i class="text-white mdi mdi-arrow-left" style="font-size: 24px;"></i>
				</a>
				<div class="text-center">
					<img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="" width="176">
				</div>
			</div>
			<div class="px-3 py-2 box-profile">
				<div class="bg-white p-2 body mb-4" style="height: auto">
				     @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
			    
			    <div class="alert alert-success mt-2">
			       <ul>
			           <li>{{session('success')}}</li>
			       </ul>
			    </div>
			    
			    @endif
					<form action="{{url('/user/edit/profile')}}" method="POST" class="my-form px-3 mt-3">
					    @csrf
						<div class="mb-3">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control" autocomplete="off" value="{{Auth()->user()->name}}" name="name" required>
						</div>
						<div class="mb-3">
							<label>Username</label>
							<input type="text" class="form-control" autocomplete="off" value="{{Auth()->user()->username}}" name="username" required>
						</div>
						<div class="mb-3">
							<label>Password</label>
							<input type="password" class="form-control" name="password" autocomplete="off" placeholder="(Enter if want to changed)">
						</div>
						<div class="mb-3">
							<label>No Whatsapp</label>
							<input type="number" class="form-control" name="no_wa" autocomplete="off" value="{{Auth()->user()->no_wa}}">
						</div>
						<button class="btn btn-primary w-100 mb-3" type="submit" name="tombol" value="submit">Update</button>
					</form>
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
                    <a href="{{url('/dashboard')}}" class="active">
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