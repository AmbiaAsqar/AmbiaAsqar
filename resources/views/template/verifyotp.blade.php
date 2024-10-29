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
				<span class="color d-inline-block ms-3 title">Lupa Password</span>
			</div>
			<div class="px-3 pt-3 mb-3">
			    <div class="px-3">
					<h2>Check your Whatsapp</h2>
					<p class="mb-3">Please input OTP code from your message.</p>
				</div>
			    @if(session('error'))
			    
			    <div class="alert alert-danger">
			       <ul>
			           <li>{{session('error')}}</li>
			       </ul>
			    </div>
			    
			    @endif
			    @if(session('success'))
			    
			    <div class="alert alert-success">
			       <ul>
			           <li>{{session('success')}}</li>
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
				<form action="{{url('/verify/otp')}}" method="POST" class="my-form px-3">
				    @csrf
					<div class="mb-3 row otp px-3">
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-1" name="otp[]" onkeyup="input_otp('1', this.value);" placeholder="" required></div>
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-2" name="otp[]" onkeyup="input_otp('2', this.value);" placeholder="" required></div>
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-3" name="otp[]" onkeyup="input_otp('3', this.value);" placeholder="" required></div>
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-4" name="otp[]" onkeyup="input_otp('4', this.value);" placeholder="" required></div>
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-5" name="otp[]" onkeyup="input_otp('5', this.value);" placeholder="" required></div>
						<div class="col-2"><input type="number" autocomplete="off" class="form-control text-center" id="otp-6" name="otp[]" onkeyup="input_otp('6', this.value);" placeholder="" required></div>
					</div>
					<div class="mt-3">
						<button class="btn btn-primary w-100" type="submit" name="tombol" value="otp">Confirm</button>
					</div>
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


<script>
			function input_otp(ke, otp) {
				if (ke < 6) {
					if ($("#otp-" + ke).val().length == 1) {
						var next = parseInt(ke) + 1;

						$("#otp-" + next).focus();
					}
				} else {
					if ($("#otp-6").val().length > 1) {
						$("#otp-6").val(otp.slice(1, 2));
					}
				}
			}
		</script>
		
    


@endpush




@endsection