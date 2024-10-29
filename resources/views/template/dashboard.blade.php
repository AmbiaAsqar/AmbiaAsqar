@extends('template.template')

@section('custom_style')


<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-270px}
    .box-profile .body{border-radius:24px;height:425px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .box-profile .body .img{width:100px;height:100px;border-radius:50%;text-align:center;line-height:100px;border:2px solid #fff;margin:-50px auto;font-size:22px}
</style>


@endsection


@section('content')



<div style="height: 720px;">
			<div class="bg-primary pt-4" style="height: 424px;border-radius: 0 0 39px 39px;">
				<a href="{{url('/')}}" class="text-decoration-none float-start ms-3" style="margin-top: 48px;position: absolute;">
					<i class="text-white mdi mdi-arrow-left" style="font-size: 24px;"></i>
				</a>
				<div class="text-center d-md-none">
					<img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="" width="176">
				</div>
			</div>
			<div class="px-3 py-5 box-profile">
				<div class="bg-white p-2 body">
				    <a href="{{url('/riwayat-pembelian')}}">
					    <i class="mdi mdi-history float-start mx-3" style="font-size: 22px;color: #718096;"></i>
					</a>
					<div class="bg text-white img">Halo</div>
					<a href="{{url('/user/edit/profile')}}">
						<i class="float-end me-3 mdi mdi-settings" style="font-size: 24px;color: #a0aec0;"></i>
					</a>
					<div class="text-center" style="margin-top: 65px;">
						<h1>{{Str::title(Auth()->user()->name)}}</h1>
						<hr style="border-color: #d5d5d5;">
						<h5>Saldo</h5>
						<h3 class="fw-bold">Rp {{ number_format(Auth::user()->balance, 0, ',', '.') }},-</h3>
						<span class="d-inline-block py-1 px-2 rounded bg-warning text-dark" style="font-size: 12px;">{{Str::title(Auth()->user()->role)}}</span>
					</div>
					<div class="row px-4 mt-5">
						<div class="col-8 color">
							<a href="{{url('/deposit')}}" class="text-decoration-none color">
								Top Up
							</a>
						</div>
						<div class="col-4 text-end">
							<a href="{{url('/deposit')}}" class="text-decoration-none">
								<i class="color mdi mdi-arrow-right" style="font-size: 20px;"></i>
							</a>
						</div>
					</div>
					<div class="row px-4 mt-1">
						<div class="col-8 color">
							<a href="{{url('/membership')}}" class="text-decoration-none color">
								Membership
							</a>
						</div>
						<div class="col-4 text-end">
							<a href="{{url('/membership')}}" class="text-decoration-none">
								<i class="color mdi mdi-arrow-right" style="font-size: 20px;"></i>
							</a>
						</div>
					</div>
					<div class="text-center mt-4 mb-3">
						<button onclick="logout();" class="bg-white border-0 text-danger fw-500">Logout</button>
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


    <div class="modal fade" tabindex="-1" id="modal-logout">
		    <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content">
		            <div class="modal-header border-bottom-0">
		                <h5 class="modal-title">Are you sure?</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <p>Apakah anda yakin untuk keluar dari akun ?</p>
		                <div class="text-end">
		                    <form method="POST" action="{{url('/logout')}}">
		                     @csrf
		                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">No</button>
		                    <button type="submit" class="btn btn-danger">Yes</button>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>






@push('custom_script')

<script>
			var modal_logout = new bootstrap.Modal(document.getElementById('modal-logout'));

			function logout() {
				modal_logout.show();
			}
		</script>
		

@endpush




@endsection