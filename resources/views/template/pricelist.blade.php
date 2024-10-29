@extends('template.template')

@section('custom_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<style>
        .product .box{margin-bottom:52px}

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
        

.wrapper{
  width: 100%;
}
.wrapper nav{
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
}
.wrapper nav label{
  display: block;
  margin: 12px;
  padding: 5px;
  cursor: pointer;
  position: relative;
  z-index: 1;
  color: #818181;
  font-size: 16px;
  font-weight: bold;
  transition: all 0.3s ease;
  border-radius: 0.5rem;
}
.wrapper nav label:hover{
  color: var(--warna_2);
}

#game:checked ~ nav label.game,
#joki:checked ~ nav label.joki,
#pulsa:checked ~ nav label.pulsa,
#e-wallet:checked ~ nav label.e-wallet{
  color: #fff;
  background: var(--warna_2);
}
nav label{
 
}
nav label i{
 font-size: 35px;
}
nav label p{
 
 color: #000;
 font-size: 14px;
}

input[type="radio"]{
  display: none;
}

}
#game:checked ~ nav .slider{
  left: 0%;
}
#joki:checked ~ nav .slider{
  left: 16%;
}
#pulsa:checked ~ nav .slider{
  left: 31.5%;
}
#e-wallet:checked ~ nav .slider{
  left: 51%;
}
section .content{
  display: none;
  margin-top: 25px;
}
#game:checked ~ section .game,
#joki:checked ~ section .joki,
#pulsa:checked ~ section .pulsa,
#e-wallet:checked ~ section .e-wallet{
  display: block;
}
section .content .title{
  
}
section .content p{

}
.slider{
  position: absolute;
  height: 3px;
  width: 10%;
  margin-left: 14px;
  margin-bottom: 10px;
  background: var(--warna_2);
  bottom: 0;
}
.flash-sale p .timerFlash {
        display: inline-block;
        padding: 5px 16px;
        background: #AB0000;
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        letter-spacing: 2px;
        margin-left: 8px;
    }
    .flash-sale-card {
        height: 165px;
    }
    .flash-sale-card .text {
        padding: 10px !important;
    }
    .flash-sale-card h3 {
        font-size: 16px;
        top: 8px;
        left: 10px;
    }
    .flash-sale-card .price {
        font-size: 14px;
    }
</style>
<style>
.animate-shimmer {
    animation: shimmer 1.75s linear infinite
}

@keyframes  flicker {
    0%,19.999%,22%,62.999%,64%,64.999%,70%,to {
        opacity: .99;
        filter: drop-shadow(0 0 1px rgba(252,211,77)) drop-shadow(0 0 15px rgba(245,158,11)) drop-shadow(0 0 1px rgba(252,211,77))
    }

    20%,21.999%,63%,63.999%,65%,69.999% {
        opacity: .4;
        filter: none
    }
}

.animate-flicker {
    animation: flicker 3s linear infinite
}

@keyframes  spin {
    to {
        transform: rotate(1turn)
    }
}

.animate-spin {
    animation: spin 1s linear infinite
}

.box-profile {
    margin-top: -170px;
}
</style>

@endsection


@section('content')


<ul class="circles">
            <img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="">
            <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        </ul>

<div class="content-body">
    <div class="container">                    
                    <div class="py-5 box-profile">
				        <div class="bg-dark p-2 body" style="height: auto !important; border-radius: 20px">

						    <div class="text-center " style="margin-top: 10px;">
						 
						    <hr style="border-color: #d5d5d5;">
					    </div>
						<h3 class="text-center mb-3">Daftar Harga</h3>
                        
                        <div class="table-responsive">
                            <table class="table m-o table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                         <th>No</th>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                           <th>Harga Member</th>
                                           <th>Harga Platinum</th>
                                            <th>Harga Gold</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-light">
                                    <?php $no=1;?>
                                    @foreach($datas as $d)
                                    @php
                                        if($d->status == "available"){
                                            $label_pesanan = "success";
                                        }else{
                                            $label_pesanan = "danger";
                                        }
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>
                                            {{ $d->nama_kategori }} - {{ $d->layanan }}<br>
                                        </td>
                                        <td>Rp. {{ number_format($d->harga,0,',','.') }}</td>
                                        <td>Rp. {{ number_format($d->harga_member, 0, ',', '.') }}</td>
                                         <td>Rp. {{ number_format($d->harga_platinum, 0, ',', '.') }}</td>
                                          <td>Rp. {{ number_format($d->harga_gold, 0, ',', '.') }}</td>
                                        <td><span class="badge bg-{{ $label_pesanan }}"><i class="mdi mdi-reload mdi-spin"></i> {{ $d->status }}</span></td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    </tbody>
                                </table>                               
                        </div>
                    </div>
                </div>
    </div>
          
@push('custom_script')
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<script>
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>

@endpush



@endsection