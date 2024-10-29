@extends('template.template')

@section('custom_style')


<style>
    .accordion-button{box-shadow:none!important}
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-300px}
    .box-profile .body{border-radius:24px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .my-form div small{color:#718096}
</style>


@endsection


@section('content')



<div>
			<div class="bg-primary pt-4" style="height: 424px;border-radius: 0 0 39px 39px;">
				<a href="{{url('/user/dashboard')}}" class="text-decoration-none float-start ms-3" style="margin-top: 48px;position: absolute;">
					<i class="text-white mdi mdi-arrow-left" style="font-size: 24px;"></i>
				</a>
				<div class="text-center">
					<img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="" width="176">
				</div>
			</div>
			<div class="px-3 py-2 box-profile pb-4">
				<div class="bg-white p-2 body pb-4">
					<form action="{{url('/deposit')}}" method="POST" class="my-form px-3 mt-3">
					    @csrf
						<a href="{{url('/deposit')}}">
							<i class="mdi mdi-history float-start" style="font-size: 22px;color: #718096;"></i>
						</a>
						<h3 class="text-center mb-3">Top Up Saldo</h3>
						
						 @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
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
						
						<p>Pilih Metode Pembayaran</p>
						
						<div class="mb-3">
							<select class="form-control" name="metode" required>
                                            {{--<option value="BCA">BCA(MANUAL)</option>
                                            <option value="OVO">OVO(MANUAL)</option>
                                            
                                            <option value="DANA">DANA(MANUAL)</option>
                                            <option value="SHOPEPAY">SHOPEPAY(MANUAL)</option>
                                            <option value="BRI">BRI(MANUAL)</option>--}}
                                            <option value="GOPAY">GOPAY(Manual - Diverifikasi Admin)</option>
                            </select>
						</div>
						
						<p>Masukan nominal Top Up</p>
						
						<div class="mb-3">
							<input type="number" class="form-control" autocomplete="off" name="jumlah" placeholder="Nominal Top Up" required>
						</div>
						 
						
						
												<button class="btn btn-primary w-100 mb-4" type="submit" name="tombol" value="submit">Top Up</button>
					</form>
					
					
					 <div class="table-responsive">
                            <table class="table m-o table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>No Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		@forelse($data as $pesanan)
                                @php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    
                                    if($pesanan->status == "Pending" || $pesanan->status == "Batal"){
                                        $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing"){
                                        $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success"){
                                        $label_pesanan = 'success';
                                    }else{
                                        $label_pesanan = 'danger';
                                    }
                                @endphp                        		
                        		<tr>
                        			<td>{{ $pesanan->id }}</td>
                        			<td>Rp {{ number_format($pesanan->jumlah,0,',','.'); }}</td>
                        			<td>{{ $pesanan->metode }}</td>
                        			<td>{!! $pesanan->metode != "QRIS" ? $pesanan->no_pembayaran : '<a class="btn btn-primary" href="/assets/qrisdepo.png" target="_blank">Lihat QR</a>'!!}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $pesanan->status }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@empty
                        		<tr>
                        			<td align="center" colspan="6">Tidak ada riwayat</td>
                        		</tr>
                        		@endforelse
                        	</table>
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

        






@push('custom_script')



@endpush




@endsection