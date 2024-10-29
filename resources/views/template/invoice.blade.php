@extends('template.template')

@section('custom_style')

<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
</style>

@endsection

@section('content')

<div style="height: auto;">
    <div class="py-3 text-center mb-3 d-md-none" style="background-color: rgb(38 46 64 / 1);">
    	<span class="color">Riwayat</span>
    </div>
    <div class="container mt-md-5 px-0">
        <div class="px-3 pt-3 mb-3">
            <h2 class="mb-4">Invoice #{{ $data->id_pembelian }}</h2>
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
            
            <div class="card">
                <div class="card-body">
                    <span class="d-block">Tanggal dibuat: <span class="badge bg-info">{{ $data->created_at }}</span></span>
                    <span class="d-block mt-1">Waktu expired: <span class="badge bg-dark" id="timerFlash"></span></span>
                    <span class="d-block mt-1">Status Pembayaran: 
                    @if($data->status_transaksi !== 'joki')
                        @if($data->status_pembayaran == "Belum Lunas")
                        <span class="badge text-uppercase bg-danger">Belum Dibayar</span>
                        @elseif($data->status_pembayaran == "Paid")
                        <span class="badge text-uppercase bg-success">Sudah Dibayar</span>
                        @endif
                    @else
                        @if($data->status_pembayaran == "Belum Lunas")
                        <span class="badge text-uppercase bg-warning">PENDING</span>
                        @elseif($data->status_pembayaran == "Batal")
                        <span class="badge text-uppercase bg-danger">CANCELED</span>
                        @elseif($data->status_pembayaran == "Paid")
                        <span class="badge text-uppercase bg-success">SUCCESS</span>
                        @endif
                    @endif
                    </span>
                    <span class="d-block mt-1">Status: 
                    @if($data->status_transaksi !== 'joki')
                        @if($data->status_pembelian == "Pending")
                        <span class="badge text-uppercase bg-warning">PENDING</span>
                        @elseif($data->status_pembelian == "Proses")
                        <span class="badge text-uppercase bg-info">PROCESSING</span>
                        @elseif($data->status_pembelian == "Batal")
                        <span class="badge text-uppercase bg-danger">CANCELED</span>
                        @elseif($data->status_pembelian == "Sukses")
                        <span class="badge text-uppercase bg-success">SUCCESS</span>
                        @endif
                    @else
                        @if($data->status_pembayaran == "Belum Lunas")
                        <span class="badge text-uppercase bg-warning">PENDING</span>
                        @elseif($data->status_pembayaran == "Batal")
                        <span class="badge text-uppercase bg-danger">CANCELED</span>
                        @elseif($data->status_pembayaran == "Paid")
                        <span class="badge text-uppercase bg-success">SUCCESS</span>
                        @endif
                    @endif
                    </span>
                    <span class="d-block mt-1">Kode Bayar / Nomor VA:
                    @if(Str::upper($data->metode_pembayaran) == "QRIS" || Str::upper($data->metode_pembayaran) == "QRISC" || Str::upper($data->metode_pembayaran) == "QRIS2" || Str::upper($data->metode_pembayaran) == "QRISOP" || Str::upper($data->metode_pembayaran) == "QRIS1" )
                        <a class="btn btn-primary btn-sm" href="#qris-payment">Lihat QRIS</a>
                    @elseif(Str::upper($data->metode_pembayaran) == "SHOPEEPAY" || Str::upper($data->metode_pembayaran) == "OVO" )
                        <a class="btn btn-primary btn-sm" href="{{$data->no_pembayaran}}">KLIK DISINI UNTUK MEMBAYAR PESANAN</a>
                    @else
                        <span class="badge bg-dark">{{ $data->no_pembayaran }}</span>
                    @endif
                    </span>
                
                
                    <div class="alert alert-info mt-3">
                        <b>Harap Dibayar Sebelum 3 Jam!</b><br> Segera lakukan pembayaran sesuai dengan kode bayar / nomor VA yang tercantum. Pastikan nominal pembayaran juga sesuai dengan total bayar yang tercantum
                    </div>
                
                    <div class="table-responsive" style="font-size:12px !important;">
                        <table class="table table-clear text-nowrap">
                            <thead class="text-light">
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">Nama Layanan</td>
                                    <td style="text-align: center; vertical-align: middle;">Keterangan/Sn</td>
                                    <td style="text-align: center; vertical-align: middle;">ID</td>
                                    <td style="text-align: center; vertical-align: middle;">Metode Pembayaran</td>
                                    <td style="text-align: center; vertical-align: middle;">QTY</td>
                                </tr>
                            </thead>
                            <tbody class="text-light">
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">
                                    {{ $data->layanan }}
                                    </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                    {{ $data->note }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                    {{ $data->user_id }}  {{ $data->zone != null ? "(".$data->zone.")" : ''  }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                    {{ $data->metode_pembayaran }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                    {{ $data->qty }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        
                        
                    <table class="table table-clear">
                        <tbody class="text-light">
                            <tr>
                                <td class="left">
                                    Harga + Biaya Admin
                                </td>
                                <td class="right text-right">
                                    Rp. {{ number_format($data->harga_pembayaran, 0, ',','.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="left">
                                <strong>Total Pembayaran</strong>
                                </td>
                                <td class="right text-right">
                                    <strong style="color:lime;">
                                        Rp.
                                        <span>
                                            {{ number_format($data->harga_pembayaran, 0, ',','.') }}
                                        </span>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @if(Str::upper($data->metode_pembayaran) == "QRIS" || Str::upper($data->metode_pembayaran) == "QRISC" || Str::upper($data->metode_pembayaran) == "QRIS1" || Str::upper($data->metode_pembayaran) == "QRIS2" || Str::upper($data->metode_pembayaran) == "QRISOP" || Str::upper($data->metode_pembayaran) == "QRISCOP" )
                    <div id="qris-payment">
                        <center><img src="{{$data->no_pembayaran}}" width="300"></center>
                        <center><span class="badge bg-danger text-center mt-3">Scan QR Code diatas ini</span></center>
                    </div>
                    @endif
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

</script>
<script type="text/javascript">
	var flashSaleEnd = "{{ $expired }}";
	if (flashSaleEnd != "0") {
		var countDownDateFlash = new Date("{{ $expired }}").getTime();
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


	    }
    });

    
</script>


@endpush




@endsection