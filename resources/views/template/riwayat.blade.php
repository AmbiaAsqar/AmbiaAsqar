@extends('template.template')

@section('custom_style')


<style>
    .accordion-button{box-shadow:none!important}
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-270px}
    .box-profile .body{border-radius:24px;height:425px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .box-profile .body .img{width:100px;height:100px;border-radius:50%;text-align:center;line-height:100px;border:2px solid #fff;margin:-50px auto;font-size:22px}
    .my-form div small{color:#718096}
</style>


@endsection


@section('content')



<div style="height: auto;">
			<div class="bg-primary pt-4" style="height: 424px;border-radius: 0 0 39px 39px;">
				<a href="{{url('/user/dashboard')}}" class="text-decoration-none float-start ms-3" style="margin-top: 48px;position: absolute;">
					<i class="text-white mdi mdi-arrow-left" style="font-size: 24px;"></i>
				</a>
				<div class="text-center">
					<img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="" width="176">
				</div>
			</div>
			<div class="px-3 py-5 box-profile">
				<div class="bg-white p-2 body" style="height: auto !important">
						<div class="bg text-white img">Halo</div>
						<a href="{{url('/user/edit/profile')}}">
						    <i class="float-end me-3 mdi mdi-settings" style="font-size: 24px;color: #a0aec0;"></i>
					    </a>
						<div class="text-center" style="margin-top: 65px;">
						<h1>{{Str::title(Auth()->user()->name)}}</h1>
						<hr style="border-color: #d5d5d5;">
					</div>
						<h3 class="text-center mb-3">Riwayat Pembelian</h3>
					
					 <div class="table-responsive">
                            <table class="table m-o table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Layanan</th>
                                        <th>Target</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		@foreach($data as $pesanan)
                        		@if($pesanan->tipe_transaksi !== 'joki')
                        		@php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    if($pesanan->status == "Pending" || $pesanan->status == "Menunggu Pembayaran" || $pesanan->status == "Waiting"){
                                    $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing" || $pesanan->status == 'Proses'){
                                    $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success" || $pesanan->status == 'Sukses'){
                                    $label_pesanan = 'success';
                                    }else{
                                    $label_pesanan = 'danger';
                                    }
                                    @endphp                   		
                        		<tr>
                        			<td>{{ $pesanan->order_id }}</td>
                        			<td>{{ $pesanan->layanan }}</td>
                        			<td>{{ $pesanan->user_id.$zone }}</td>
                        			<td>Rp. {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $pesanan->status }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@else
                        		@foreach($joki as $jokis)
                        		@if($jokis->order_id == $pesanan->order_id)
                                @php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    if($jokis->status_joki == "Sukses"){
                                    $label_pesanan = 'success';
                                    }else{
                                    $label_pesanan = 'danger';
                                    }
                                    @endphp                   		
                        		<tr>
                        			<td>{{ $pesanan->order_id }}</td>
                        			<td>{{ $pesanan->layanan }}</td>
                        			<td>{{ $pesanan->user_id.$zone }}</td>
                        			<td>Rp. {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $jokis->status_joki }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@endif
                        		@endforeach
                        		@endif
                        		@endforeach
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