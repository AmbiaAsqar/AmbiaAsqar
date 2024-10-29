
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ !$config ? '' : $config->judul_web }}</title>
        
        <meta name="title" content="{{ !$config ? '' : $config->judul_web }}">
        <meta name="description" content="{{ !$config ? '' : $config->deskripsi_web }}">
        
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ ENV('APP_URL') }}">
        <meta property="og:title" content="{{ !$config ? '' : $config->judul_web }}">
        <meta property="og:description" content="{{ !$config ? '' : $config->deskripsi_web }}">
        <meta name="twitter:image" content="{{ !$config ? '' : $config->logo_footer }}" />
        <meta property="og:image" content="{{ !$config ? '' : $config->logo_footer }}" />
        <meta name="robots" content="index, follow">
        <meta content="desktop" name="device">
        <meta name="author" content="{{ ENV('APP_NAME') }}">
        <meta name="coverage" content="Worldwide">
        <meta name="apple-mobile-web-app-title" content="{{ !$config ? '' : $config->judul_web }}">
        
        <link rel="shortcut icon" href="{{ url('') }}{{ !$config ? '' : $config->logo_favicon }}">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        
        <style>
		body {
			font-family: 'Noto Sans', sans-serif;
			background: url('/assets/login/hutao.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center top;
			color: #fff;
			font-size: 14px;
		}
		@media (max-width: 576px){
    		body {
                background-size: 1819px 899px!important;
                background-position: top!important;
            }
            .area {
                padding: 98px 0!important;
            }
		}
		.content {
			background-image: linear-gradient(to top right,#34373b,rgba(52,55,59,.75),rgba(52,55,59,0));
			position: absolute;
			bottom: 0;
			top: 0;
			right: 0;
			left: 0;
		}
		.content {
			padding: 20px;
		}
		.area {
			padding: 50px 80px 0 110px;
		}
		.form-area {
			max-width: 448px;
		}
		label {
			margin-bottom: 8px;
			font-size: 13px;
			color: rgb(255 255 255/1);
		}
		.form-control {
			background: rgb(195 201 204/1);
			border: none !important;
			outline: none !important;
			box-shadow: none !important;
			font-size: 13px;
		}
		.btn-close {
			display: inline-block;
			background: rgb(61 67 72/1);
			width: 36px;
			height: 36px;
			text-align: center;
			line-height: 32px;
		}
		.btn {
			outline: none !important;
			box-shadow: none !important;
			border: none !important;
			font-size: 14px;
			font-weight: 500;
		}
		
		@media screen AND (max-width: 465px) {
		    .area {
		        padding: 98px 0;
		    }
		    body {
		        background-size: 1819px 899px;
		        background-position: top;
		    }
		}
    
    .swal2-icon-error {
		background-color: #f27474 !important;
		color: #fff;
	}
	
	.forgot {
		float: right;		
	}

	.forgot-text {
		text-decoration: none;
	}
	
        </style>
        
        <style>
            .content {
                padding: 20px;
            }
            .content {
                background-image: linear-gradient(to top right,#34373b,rgba(52,55,59,.75),rgba(52,55,59,0));
                position: absolute;
                bottom: 0;
                top: 0;
                right: 0;
                left: 0;
            }
            
            .btn-close {
                display: inline-block;
                background: rgb(61 67 72/1);
                width: 36px;
                height: 36px;
                text-align: center;
                line-height: 32px;
            }
            
            .area {
                padding: 50px 80px 0 110px;
            }
        </style>
    </head>
    <body>
        <div class="content" bis_skin_checked="1">
    		<a href="/" class="btn-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    		</a>
    		<div class="area" bis_skin_checked="1">
    			<h3 class="mb-2 fw-bold">Masuk</h3>
    			<p>Masuk menggunakan Akun terdaftar Kamu.</p>
    			<div class="form-area" bis_skin_checked="1">
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
    			<form action="{{url('/login')}}" method="POST" class="my-form">
				    @csrf
					<div class="mb-3">
						<label>Username/No Handphone</label>
						<input type="text" class="form-control" autocomplete="off" name="username" required>
					</div>
					<div class="mb-3">
						<label>Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									Remember me
								</label>
							</div>
						</div>
						<div class="col-6 text-end">
							<a class="text-decoration-none color" href="{{url('/forgot-password')}}">Forgot password?</a>
						</div>
					</div>
					<div class="mt-3">
						<button class="btn btn-primary w-100" type="submit" name="tombol" value="submit">Masuk</button>
					</div>
    			</form>
    				<div class="text-center my-4" bis_skin_checked="1">
    					<p>Belum punya akun?</p>
    				</div>
    				<a href="/register" class="btn btn-secondary button-daftar w-100 mb-3" bis_skin_checked="1">Daftar Sekarang</a>
    			</div>
    		</div>
    	</div>
    </body>    
</html>
