@extends('template.template')

@section('custom_style')


<style>
        .accordion-button{box-shadow:none!important}
        .accordion-tipe{font-weight:600;}
        .btn.disabled,.btn:disabled,fieldset:disabled{background:#8ba4b1;border-color:#8ba4b1}
        .product .box{margin-bottom:40px}

        .games-banner{height:384px;background:url({{ $kategori->banner }});background-size:cover!important;background-repeat:no-repeat;background-position:center}
        .num-page{margin-bottom:10px}
        .num-page div{width:40px;height:40px;border-radius:50%;text-align:center;font-size:1.875rem;background:var(--warna_2);color:#fff;line-height:40px;float:left}
        .num-page p{margin-left:10px;display:inline-block;font-size:1.25rem;font-weight:500;padding-top:2px}
        button.accordion-button{outline:none!important;border:none!important;box-shadow:none!important}
        .box-back{width:28px;height:28px;background: #ffffff54;text-align:center;border-radius:10px;display:inline-block;transition:.5s}
        .box-back:hover{background: #333333d9}
        .box-back i{font-size:22px;margin-top:2px;color:#fff}
        .product-list{border-radius:.5rem;box-shadow:0 1px 2px 0 rgba(0,0,0,.05);overflow:hidden}
        .product-list b{font-size:.85rem;font-weight:600}
        .product-list span{font-size:13px;color:#718096}
        .product-list.active{border:1px solid var(--warna_2)!important}
        .product-list.active:before{display:inline-block;content:'L';position:relative;background:var(--warna_2);margin-left:-20px;height:53px;line-height:40px;width:20px;text-align:center;color:#fff;top:-23px;transform:rotate(45deg) scaleX(-1)}
        .product-list.active b{margin-top:-53px}
        .panduan {
            color: #718096;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        .swal2-styled.swal2-confirm {
            background-color: var(--warna_2)!important;
            color: #fff;
        }
        .swal2-styled.swal2-confirm:focus {
            box-shadow: none!important;
        }
        .product-list img {
            display: flex;
            float: right;
            margin-top: -12px;
        }
        .product-list a {
            margin-top: 1px;
        }
        .productlogo {
            width: 56px;
            right: 7%;
        }
        
        .mb-order-responsive {
            margin-bottom: 90px!important;
        }
        
        .gb-gradient {
            background: linear-gradient(90deg, rgba(17,24,39,1) 0%, rgba(78,224,78,0) 100%);
            height: 384px;
            width: 100%;
            position: absolute;
        }
        
        .thumb-game {
            z-index: 1;
            position: relative;
            transform: rotateY(20deg) rotateX(-4deg) !important;
            transform-origin: left center;
            width: 8rem;
            height: auto;
            margin-bottom: -1.5rem;
            border-radius: 1rem;
        }
        
        .text-xl{
                font-size: 1.25rem;
                line-height: 1.75rem;
        }
        
        .dark-card {
            background-color: rgb(38 46 64 / 1);
            border-radius: 1rem;
        }
        
        #desc.sticky-top {
            top: 6em;
        }
        
        @media only screen and (min-width: 768px) {
            .mb-order-responsive {
                margin-bottom: 15px!important;
            }
            
            .thumb-game {
                width: 12rem!important;
                margin-bottom: -2rem;
            }
            
            .text-xl {
                font-size: 1.875rem;
            }
            
        }

        .hide {
            visibility: hidden;
            height: 0;
        }

        .show {
            visibility: visible;
        }
</style>


@endsection


@section('content')

        <div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="petunjukModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: transparent; border: none;">
                    <div class="modal-body">
                        <img src="{{ $kategori->petunjuk }}" alt="" class="img-fluid">
                    </div>
                        <button type="button" class="btn mx-auto w-25 text-white bg-transparent" data-bs-dismiss="modal">X</button>
                </div>
            </div>
        </div>



        <div class="games-banner d-flex">
            <div class="position-absolute" style="left: 28px;margin-top: 28px; z-index: 1">
    			<a class="box-back" href="{{url('/')}}">
    				<i class="fa fa-angle-left" aria-hidden="true"></i>
    			</a>
    			</div>
			<div class="container d-flex align-items-end" style="z-index: 1">
			    <div class="d-flex align-items-center" style="perspective: 25em;">
			        <img src="{{ $kategori->thumbnail  }}" alt="" height="300" class="thumb-game">
			        <div class="d-flex flex-column ms-3">
			            <h3 class="mt-3 mb-0 font-weight-bold text-xl">{{$kategori->nama}}</h3>
    			        <small style="font-size: 14px;color: #718096;">{{ $kategori->sub_nama }}</small>
			        </div>
			    </div>
			</div>
			
			<div class="gb-gradient"></div>
		</div>
        
        <div class="container py-5">
            <div class="row shadow-sm">
                <div class="col-12 col-md-4 mt-3">
            		<div id="desc" class="p-4 dark-card sticky-top">
            			<small style="font-size: 14px;color: #718096;">{!! $kategori->deskripsi_game !!}</small>
            		</div>
        		</div>
        		
        		<div class="col-12 col-md-8">
            		<form class="my-form" id="form-order">

                        <input type="hidden" id="nominal">
                        <input type="text" id="metode">
                        <input type="hidden" id="ktg_tipe" value="{{$kategori->tipe}}">

            			<div class="my-3">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div>1</div>
                					<p>Masukan Data</p>
                				</div>
                				<div class="row">
                                    @if($kategori->server_id && $kategori->kode != "life-after" && $kategori->kode != "genshin-impact" && $kategori->kode != "ragnarok-m" && $kategori->kode != "tof" && $kategori->kode != "honkai-star-rail")
                					
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_2}}" name="zone_id" id="zone" autocomplete="off">
                					</div>
                					@elseif($kategori->kode == "life-after")
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                						<select class="form-control" id="zone">
                						  <option value="">Pilih Server</option>
                						  <option value="miskatown">Miska Town</option>
                                          <option value="sandcastle">Sand Castle</option>
                                          <option value="mouthswamp">Mouth Swamp</option>
                                          <option value="redwoodtown">Red Wood Town</option>
                                          <option value="obelisk">Oblisk</option>
                                          <option value="fallforest">Fall Forest</option>
                                          <option value="mountsnow">Mount Snow</option>
                                          <option value="nancycity">Nancy City</option>
                                          <option value="charlestown">Charles Town</option>
                                          <option value="snowhighlands">Snow High Lands</option>
                                          <option value="santopany">Santopany</option>
                                          <option value="levincity">Levin City</option>
                                          <option value="newland">New Land</option>
                                          <option value="milestone">Mile Stone</option>
                                          <option value="twinislands">Twin Island</option>
                                          <option value="500007">ChaosOutpost (NA)</option>
                                          <option value="500008">IronStride (NA)</option>
                                          <option value="520007">ChaosCity (SEA)</option>
                                          <option value="520008">TwinIslands (SEA)</option>
                                          <option value="520009">HopeWall (SEA)</option>
                                          <option value="500009">CrystalthornSea (NA)</option>
                                          <option value="520010">LabyrinthSea (SEA)</option>
                						</select>
                					</div>
                					
                					@elseif($kategori->kode == "dragon-nest-2-evolution")
                					
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                    					<select class="form-control" id="zone">
                    					  <option value="">Pilih Server</option>
                                          <option value="1">Saint's Haven-s1</option>
                                          <option value="2">Saint's Haven-s2</option>
                                          <option value="3">Saint's Haven-s3</option>
                                          <option value="4">Saint's Haven-s4</option>
                                          <option value="5">Saint's Haven-s5</option>
                                          <option value="6">Saint's Haven-s6</option>
                                          <option value="7">Saint's Haven-s7</option>
                                          <option value="8">Saint's Haven-s8</option>
                                          <option value="9">Saint's Haven-s9</option>
                                          <option value="10">Saint's Haven-s10</option>
                                          <option value="11">Lake Island-s11</option>
                                          <option value="12">Lake Island-s12</option>
                                          <option value="13">Lake Island-s13</option>
                                          <option value="14">Lake Island-s14</option>
                                          <option value="15">Lake Island-s15</option>
                                          <option value="16">Lake Island-s16</option>
                                          <option value="17">Lake Island-s17</option>
                                          <option value="18">Lake Island-s18</option>
                                          <option value="19">Lake Island-s19</option>
                                          <option value="20">Lake Island-s20</option>
                                          <option value="21">Carderock-21</option>
                                          <option value="22">Carderock-22</option>
                                          <option value="23">Carderock-23</option>
                                          <option value="24">Carderock-24</option>
                                          <option value="25">Carderock-25</option>
                                          <option value="26">Carderock-26</option>
                                          <option value="27">Carderock-27</option>
                                          <option value="28">Carderock-28</option>
                                          <option value="29">Carderock-29</option>
                                          <option value="30">Carderock-30</option>
                                          <option value="31">Prairie Town-31</option>
                                          <option value="32">Prairie Town-32</option>
                                          <option value="33">Prairie Town-33</option>
                                          <option value="34">Prairie Town-34</option>
                                          <option value="35">Prairie Town-35</option>
                                          <option value="36">Prairie Town-36</option>
                                          <option value="37">Prairie Town-37</option>
                                          <option value="38">Prairie Town-38</option>
                                          <option value="39">Prairie Town-39</option>
                                          <option value="40">Prairie Town-40</option>
                                        </select>
                                    </div>
                					
                					@elseif($kategori->kode == "tof")
                					
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					
                					<div class="col-12 col-md-6">
                						<select class="form-control" id="zone">
                						    <option value="">Pilih Server</option>
                                            <option value="11001">Asia Pasific-Eden</option>
                                            <option value="11002">Asia Pasific-Fate</option>
                                            <option value="11003">Asia Pasific-Nova</option>
                                            <option value="11004">Asia Pasific-Ruby</option>
                                            <option value="11005">Asia Pasific-Babel</option>
                                            <option value="11006">Asia Pasific-Gomap</option>
                                            <option value="11007">Asia Pasific-Pluto</option>
                                            <option value="11008">Asia Pasific-Sushi</option>
                                            <option value="11009">Asia Pasific-Venus</option>
                                            <option value="11010">Asia Pasific-Galaxy</option>
                                            <option value="11011">Asia Pasific-Memory</option>
                                            <option value="11012">Asia Pasific-Oxygen</option>
                                            <option value="11013">Asia Pasific-Sakura</option>
                                            <option value="11014">Asia Pasific-Seeker</option>
                                            <option value="11015">Asia Pasific-Shinya</option>
                                            <option value="11016">Asia Pasific-Stella</option>
                                            <option value="11017">Asia Pasific-Uranus</option>
                                            <option value="11018">Asia Pasific-Utopia</option>
                                            <option value="11019">Asia Pasific-Jupiter</option>
                                            <option value="11020">Asia Pasific-Sweetie</option>
                                            <option value="11021">Asia Pasific-Atlantis</option>
                                            <option value="11022">Asia Pasific-Daybreak</option>
                                            <option value="11023">Asia Pasific-Takoyaki</option>
                                            <option value="11024">Asia Pasific-Adventure</option>
                                            <option value="11025">Asia Pasific-Yggdrasil</option>
                                            <option value="11026">Asia Pasific-Cocoaiteruyo</option>
                                            <option value="11027">Asia Pasific-Food fighter</option>
                                            <option value="11028">Asia Pasific-Mars</option>
                                            <option value="11029">Asia Pasific-Vega</option>
                                            <option value="11030">Asia Pasific-Neptune</option>
                                            <option value="11031">Asia Pasific-Tenpura</option>
                                            <option value="11032">Asia Pasific-Moon</option>
                                            <option value="11033">Asia Pasific-Mihashira</option>
                                            <option value="11034">Asia Pasific-Cocokonderu</option>
                                            <option value="13001">Europe-Aimanium</option>
                                            <option value="13002">Europe-Alintheus</option>
                                            <option value="13003">Europe-Andoes</option>
                                            <option value="13004">Europe-Anomora</option>
                                            <option value="13005">Europe-Astora</option>
                                            <option value="13006">Europe-Valstamm</option>
                                            <option value="13007">Europe-Blumous</option>
                                            <option value="13008">Europe-Celestialrise</option>
                                            <option value="13009">Europe-Cosmos</option>
                                            <option value="13010">Europe-Dyrnwyn</option>
                                            <option value="13011">Europe-Elypium</option>
                                            <option value="13012">Europe-Excalibur</option>
                                            <option value="13013">Europe-Espoir IV</option>
                                            <option value="13014">Europe-Estrela</option>
                                            <option value="13015">Europe-Ether</option>
                                            <option value="13016">Europe-Ex Nihilor</option>
                                            <option value="13017">Europe-Futuria</option>
                                            <option value="13018">Europe-Hephaestus</option>
                                            <option value="13019">Europe-Midgard</option>
                                            <option value="13020">Europe-Iter</option>
                                            <option value="13021">Europe-Kuura</option>
                                            <option value="13022">Europe-Lycoris</option>
                                            <option value="13023">Europe-Lyramiel</option>
                                            <option value="13024">Europe-Magenta</option>
                                            <option value="13025">Europe-Magia Przygoda Aida</option>
                                            <option value="13026">Europe-Olivine</option>
                                            <option value="13027">Europe-Omnium Prime</option>
                                            <option value="13028">Europe-Turmus</option>
                                            <option value="13029">Europe-Transport Hub</option>
                                            <option value="13030">Europe-The Lumina</option>
                                            <option value="13031">Europe-Seaforth Dock</option>
                                            <option value="13032">Europe-Silvercoast Lab</option>
                                            <option value="13033">Europe-Karst Cave</option>
                                            <option value="12001">North America-The Glades</option>
                                            <option value="12002">North America-Nightfall</option>
                                            <option value="12003">North America-Frontier</option>
                                            <option value="12004">North America-Libera</option>
                                            <option value="12005">North America-Solaris</option>
                                            <option value="12006">North America-Freedom-Oasis</option>
                                            <option value="12007">North America-The worlds between</option>
                                            <option value="12008">North America-Radiant</option>
                                            <option value="12009">North America-Tempest</option>
                                            <option value="12010">North America-New Era</option>
                                            <option value="12011">North America-Observer</option>
                                            <option value="12012">North America-Lunalite</option>
                                            <option value="12013">North America-Starlight</option>
                                            <option value="12014">North America-Myriad</option>
                                            <option value="12015">North America-Lighthouse</option>
                                            <option value="12016">North America-Oumuamua</option>
                                            <option value="12017">North America-Eternium Phantasy</option>
                                            <option value="12018">North America-Sol-III</option>
                                            <option value="12019">North America-Silver Bridge</option>
                                            <option value="12020">North America-Azure Plane</option>
                                            <option value="12021">North America-Nirvana</option>
                                            <option value="12022">North America-Ozera</option>
                                            <option value="12023">North America-Polar</option>
                                            <option value="12024">North America-Oasis</option>
                                            <option value="15001">South America-Orion</option>
                                            <option value="15002">South America-Luna Azul</option>
                                            <option value="15003">South America-Tiamat</option>
                                            <option value="15004">South America-Hope</option>
                                            <option value="15005">South America-Tanzanite</option>
                                            <option value="15006">South America-Calodesma Seven</option>
                                            <option value="15007">South America-Antlia</option>
                                            <option value="15008">South America-Pegasus</option>
                                            <option value="15009">South America-Phoenix</option>
                                            <option value="15010">South America-Centaurus</option>
                                            <option value="15011">South America-Cepheu</option>
                                            <option value="15012">South America-Columba</option>
                                            <option value="15013">South America-Corvus</option>
                                            <option value="15014">South America-Cygnus</option>
                                            <option value="15015">South America-Grus</option>
                                            <option value="15016">South America-Hydra</option>
                                            <option value="15017">South America-Lyra</option>
                                            <option value="15018">South America-Ophiuchus</option>
                                            <option value="15019">South America-Pyxis</option>
                                            <option value="16001">Southeast Asia-Phantasia</option>
                                            <option value="16002">Southeast Asia-Mechafield</option>
                                            <option value="16003">Southeast Asia-Ethereal Dream</option>
                                            <option value="16004">Southeast Asia-Odyssey</option>
                                            <option value="16005">Southeast Asia-Aestral-Noa</option>
                                            <option value="16006">Southeast Asia-Osillron</option>
                                            <option value="16007">Southeast Asia-Chandra</option>
                                            <option value="16008">Southeast Asia-Saeri</option>
                                            <option value="16009">Southeast Asia-Aeria</option>
                                            <option value="16010">Southeast Asia-Scarlet</option>
                                            <option value="16011">Southeast Asia-Gumi Gumi</option>
                                            <option value="16012">Southeast Asia-Fantasia</option>
                                            <option value="16013">Southeast Asia-Oryza</option>
                                            <option value="16014">Southeast Asia-Stardust</option>
                                            <option value="16015">Southeast Asia-Arcania</option>
                                            <option value="16016">Southeast Asia-Animus</option>
                                            <option value="16017">Southeast Asia-Mistilteinn</option>
                                            <option value="16018">Southeast Asia-Valhalla</option>
                                            <option value="16019">Southeast Asia-Illyrians</option>
                                            <option value="16020">Southeast Asia-Florione</option>
                                            <option value="16021">Southeast Asia-Oneiros</option>
                                            <option value="16022">Southeast Asia-Famtosyana</option>
                                            <option value="16023">Southeast Asia-Edenia</option>
                                            <option value="16024">Southeast Asia-Tore de Utopia</option>
                						</select>
                					</div>
                					@elseif($kategori->kode == "genshin-impact")
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                						<select class="form-control" id="zone">
                						  <option value="">Pilih Server</option>
                						  <option value="os_usa">America</option>
                                          <option value="os_euro">Europa</option>
                                          <option value="os_asia">Asia</option>
                                          <option value="os_cht">TW_HK_MO</option>
                						</select>
                					</div>
                					
                					@elseif($kategori->kode == "honkai-star-rail")
                					<div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                						<select class="form-control" id="zone">
                						  <option value="">Pilih Server</option>
                						  <option value="os_usa">America</option>
                                          <option value="os_euro">Europa</option>
                                          <option value="os_asia">Asia</option>
                                          <option value="os_cht">TW_HK_MO</option>
                						</select>
                					</div>
                					
                					@elseif($kategori->kode == "ragnarok-m")
                					 <div class="col-12 col-md-6">
                						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                					</div>
                					<div class="col-12 col-md-6">
                						<select class="form-control" id="zone">
                						  <option value="">Pilih Server</option>
                						    <option value="90001">Eternal Love</option>
                                            <option value="90002">Midnight Party</option>
                                            <option value="90002003">Memory Of Faith</option>
                						</select>
                					</div>
                					
                					@else
                					
                					
                    					@if(in_array($kategori->tipe,['game','voucher','pulsa','e-wallet']))
                    					
                    					   	
                    					<div class="col-12">
                    						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                    					</div>
                    					
                    					@elseif(in_array($kategori->tipe,['streaming-app']))
                    					
                    					   	
                    					<div class="col-12">
                    						<input type="text" class="form-control" placeholder="{{$kategori->placeholder_1}}" id="user_id" name="user_id" autocomplete="off">
                    					</div>
                    				    @else
                    				    <div class="row">
                    				        <div class="col-12 mb-2">
                    				            <input type="text" class="form-control" placeholder="Masukan Email" id="email_joki" name="email_joki" autocomplete="off">
                    				        </div>
                    				        <div class="col-12 mb-2">
                    				            <input type="password" class="form-control" placeholder="Masukan Password" id="password_joki" name="password_joki" autocomplete="off">
                    				        </div>
                    				    </div>
                    				    
                    				    <div class="row">
                    				        <div class="col-12 mb-2">
                    				            <select class="form-control" id="loginvia_joki" name="loginvia_joki">
                    				                <option value="">Login Via</option>
                    				                <option value="moonton">Moonton (Rekomendasi)</option
                    				                <option value="vk">VK</option>
                    				                <option value="tiktok">Tiktok</option>
                    				                <option value="facebook">Facebook</option>
                    				            </select>
                    				        </div>
                    				        <div class="col-12 mb-2">
                    				           <input type="text" class="form-control" placeholder="Masukan Nickname" id="nickname_joki" name="nickname_joki" autocomplete="off">
                    				        </div>
                    				    </div>
                    				    
                    				    
                    				    <div class="row">
                    				        <div class="col-12 mb-2">
                    				            <input type="text" class="form-control" placeholder="Min Request 3 Hero (Diusahakan)" id="request_joki" name="request_joki" autocomplete="off">
                    				        </div>
                    				        <div class="col-12 mb-2">
                    				           <input type="text" class="form-control" placeholder="Catatan untuk Penjoki" id="catatan_joki" name="catatan_joki" autocomplete="off">
                    				        </div>
                    				    </div>
                    					@endif
                					@endif
                					
                					<p class="panduan">{!! $kategori->deskripsi_field !!}</p>
                					
                					<button class="btn btn-primary btn-sm mx-auto w-25" type="button" data-bs-toggle="modal" data-bs-target="#petunjukModal">Petunjuk</button>
                					
                				</div>
            				</div>
            			</div>
            			
            			<div class="my-3">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div>2</div>
                					<p>Pilih Item</p>
                				</div>
                				<div class="row">
                				    
                				    @foreach($nominal as $nom)
                				    
                					<div class="col-6 col-md-4 mb-3">
                						<div id="product-{{$nom->id}}" class="p-2 px-3 border cursor-pointer product-list" product-id="{{$nom->id}}" style="background-color: #e5e7eb">
                							<b class="d-block text-dark">{{ $nom->layanan }}</b>
                                           @if($nom->event == "1")
                							<div class="dprice"><font size= "0.5" color="#FF0000">Rp {{ number_format($nom->harga_awal) }}</font></div>
                							@endif
                							<img src="{{ $nom->product_logo }}" class="productlogo">
                							 <span>Rp {{ number_format($nom->harga) }},-</span>
                							 
                						</div>
                						
                					</div>
                										
                					@endforeach					
                					
                				</div>
            				</div>
            			</div>
            
            			<div class="mt-3">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div>3</div>
                					<p>Pilih Pembayaran</p>
                				</div>
                				
                				@auth
                				<div class="accordion mb-3" id="accordionExample-balance" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);border-radius: 6px;">
                					<div class="accordion-item">
                						<h2 class="accordion-header" id="heading-balance">
                							<button class="accordion-button collapsed bg-white-custom text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-balance" aria-expanded="false" aria-controls="collapse-balance">
                								<div class="accordion-tipe">Saldo Akun</div>
                							</button>
                						</h2>
                						<div id="collapse-balance" class="accordion-collapse collapse" aria-labelledby="heading-balance" data-bs-parent="#accordionExample-balance">
                							<div class="accordion-body bg-secondary">
                								<div class="row">
                									<div class="col-6">
                										<div id="method-balance" class="p-2 border rounded mb-3 method-list" method-id="SALDO">
                											<table class="w-100 border-bottom mb-2">
                												<tr>
                													<td>
                														<b><i class="bi bi-wallet2"></i></b>
                													</td>
                													<td>
                														<b style="font-size: 12px;white-space: nowrap;" method-price="balance" id="SALDO"></b>
                													</td>
                												</tr>
                											</table>
                											<div style="font-size: 12px;color: #718096;">
                												<b class="d-block mb-2">Saldo Akun</b>
                												<b class="d-block">Proses otomatis</b>
                												<b class="d-block">Tanpa biaya admin</b>
                											</div>
                										</div>
                									</div>
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="bg-secondary p-2 border text-end border-top-0 text-nowrap" style="border-radius: 0 0 6px 6px;overflow-x: auto">
                						<b><i class="bi bi-wallet2"> Saldo</i></b>
                					</div>
                				</div>
                				@endauth
                				
                				<div class="accordion mb-3" id="accordionExample-0" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);border-radius: 6px;">
                					<div class="accordion-item">
                						<h2 class="accordion-header" id="heading-qris">
                							<button class="accordion-button collapsed bg-white-custom text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-qris" aria-expanded="false" aria-controls="collapse-ewallet">
                								<div class="accordion-tipe">QRIS</div>
                							</button>
                						</h2>
                						<div id="collapse-qris" class="accordion-collapse collapse" aria-labelledby="heading-qris" data-bs-parent="#accordionExample-1">
                							<div class="accordion-body bg-secondary">
                								<div class="row">
                								    @foreach($pay_method as $p)
                								    @if($p->tipe == 'qris')
                									<div class="col-6">
                										<div id="method-23" class="p-2 border rounded mb-3 method-list"  method-id="{{$p->code}}">
                											<table class="w-100 border-bottom mb-2">
                												<tr>
                													<td>
                														<img src="{{$p->images}}" alt="" class="w-75">
                													</td>
                													<td>
                														<b style="font-size: 12px;white-space: nowrap;" id="{{$p->code}}"></b>
                													</td>
                												</tr>
                											</table>
                											<div style="font-size: 12px;color: #718096;">
                												<b class="d-block mb-2">{{$p->name}}</b>
                												<b class="d-block">{{$p->keterangan}}</b>
                											</div>
                										</div>
                									</div>
                									@endif
                									@endforeach
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="bg-secondary p-2 border text-end border-top-0 text-nowrap" style="border-radius: 0 0 6px 6px;overflow-x: auto">
                					    @foreach($pay_method as $p)
                                        @if($p->tipe == 'qris')
                						<img src="{{$p->images}}" alt="" width="64">
                						@endif
                                        @endforeach
                					</div>
                				</div>
                				
                				<div class="accordion mb-3" id="accordionExample-1" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);border-radius: 6px;">
                					<div class="accordion-item">
                						<h2 class="accordion-header" id="heading-ewallet">
                							<button class="accordion-button collapsed bg-white-custom text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-ewallet" aria-expanded="false" aria-controls="collapse-ewallet">
                								<div class="accordion-tipe">E-Wallet</div>
                							</button>
                						</h2>
                						<div id="collapse-ewallet" class="accordion-collapse collapse" aria-labelledby="heading-ewallet" data-bs-parent="#accordionExample-1">
                							<div class="accordion-body bg-secondary">
                								<div class="row">
                								    @foreach($pay_method as $p)
                								    @if($p->tipe == 'e-walet')
                									<div class="col-6">
                										<div id="method-23" class="p-2 border rounded mb-3 method-list"  method-id="{{$p->code}}">
                											<table class="w-100 border-bottom mb-2">
                												<tr>
                													<td>
                														<img src="{{$p->images}}" alt="" class="w-75">
                													</td>
                													<td>
                														<b style="font-size: 12px;white-space: nowrap;" id="{{$p->code}}"></b>
                													</td>
                												</tr>
                											</table>
                											<div style="font-size: 12px;color: #718096;">
                												<b class="d-block mb-2">{{$p->name}}</b>
                												<b class="d-block">{{$p->keterangan}}</b>
                											</div>
                										</div>
                									</div>
                									@endif
                									@endforeach
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="bg-secondary p-2 border text-end border-top-0 text-nowrap" style="border-radius: 0 0 6px 6px;overflow-x: auto">
                					    @foreach($pay_method as $p)
                                        @if($p->tipe == 'e-walet')
                						<img src="{{$p->images}}" alt="" width="64">
                						@endif
                                        @endforeach
                					</div>
                				</div>
                				
                				<div class="accordion mb-3" id="accordionExample-1" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);border-radius: 6px;">
                					<div class="accordion-item">
                						<h2 class="accordion-header" id="heading-convenience-store">
                							<button class="accordion-button collapsed bg-white-custom text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-convenience-store" aria-expanded="false" aria-controls="collapse-convenience-store">
                								<div class="accordion-tipe">Convenience Store</div>
                							</button>
                						</h2>
                						<div id="collapse-convenience-store" class="accordion-collapse collapse" aria-labelledby="heading-convenience-store" data-bs-parent="#accordionExample-2">
                							<div class="accordion-body bg-secondary">
                								<div class="row">
                								    @foreach($pay_method as $p)
                								    @if($p->tipe == 'convenience-store')
                									<div class="col-6">
                										<div id="method-12" class="p-2 border rounded mb-3 method-list"  method-id="{{$p->code}}">
                											<table class="w-100 border-bottom mb-2">
                												<tr>
                													<td>
                														<img src="{{$p->images}}" alt="" class="w-75">
                													</td>
                													<td>
                														<b style="font-size: 12px;white-space: nowrap;" id="{{$p->code}}"></b>
                													</td>
                												</tr>
                											</table>
                											<div style="font-size: 12px;color: #718096;">
                												<b class="d-block mb-2">{{$p->name}}</b>
                												<b class="d-block">{{$p->keterangan}}</b>
                											</div>
                										</div>
                									</div>
                									@endif
                									@endforeach
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="bg-secondary p-2 border text-end border-top-0 text-nowrap" style="border-radius: 0 0 6px 6px;overflow-x: auto">
                					    @foreach($pay_method as $p)
                						@if($p->tipe == 'convenience-store')
                						<img src="{{$p->images}}" alt="" width="64">
                						@endif
                						@endforeach
                					</div>
                				</div>
                								
                				<div class="accordion mb-3" id="accordionExample-1" disabled style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);border-radius: 6px;">
                					<div class="accordion-item">
                						<h2 class="accordion-header" id="heading-virtual-account">
                							<button class="accordion-button collapsed bg-white-custom text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-virtual-account" aria-expanded="false" aria-controls="collapse-virtual-account">
                								<div class="accordion-tipe">Virtual Account</div>
                							</button>
                						</h2>
                						<div id="collapse-virtual-account" class="accordion-collapse collapse" aria-labelledby="heading-virtual-account" data-bs-parent="#accordionExample-5">
                							<div class="accordion-body bg-secondary">
                								<div class="row">
                								    @foreach($pay_method as $p)
                						            @if($p->tipe == 'virtual-account')
                									<div class="col-6">
                										<div id="method-21" class="p-2 border rounded mb-3 method-list"  method-id="{{$p->code}}">
                											<table class="w-100 border-bottom mb-2">
                												<tr>
                													<td>
                														<img src="{{$p->images}}" alt="" class="w-75">
                													</td>
                													<td>
                														<b style="font-size: 12px;white-space: nowrap;" id="{{$p->code}}"></b>
                													</td>
                												</tr>
                											</table>
                											<div style="font-size: 12px;color: #718096;">
                												<b class="d-block mb-2">{{$p->name}}</b>
                												<b class="d-block">{{$p->keterangan}}</b>
                											</div>
                										</div>
                									</div>
                									@endif
                						            @endforeach
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="bg-secondary p-2 border text-end border-top-0 text-nowrap" style="border-radius: 0 0 6px 6px;overflow-x: auto">
                					    @foreach($pay_method as $p)
                						@if($p->tipe == 'virtual-account')
                						<img src="{{$p->images}}" alt="" width="64">
                						@endif
                						@endforeach
                					</div>
                				</div>
                			</div>
            			</div>

            			<div class="my-3 hide" id="qty-form">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div>{{ ($kategori->kode !== 'one-punch-man' || Auth::check() == false) ? '' : '3' }}</div>
                					<p>Tambah jumlah pembelian</p>
                				</div>
                				<div class="row">
                                    @if(Auth::check())
                				    <input type="number" class="form-control" id="qty" name="qty" value='1' min='1' max='200' placeholder='Masukkan jumlah pembelian' />
                                    @else
                				    <input type="number" disabled class="form-control disabled" id="disabled" placeholder='Silahkan masuk untuk menambah jumlah pembelian' style="background-color:#cacaca !important" />
                				    <input type="hidden" class="form-control disabled dsbld" id="qty" name="qty" value='1' min='1' max='1' placeholder='Masukkan jumlah pembelian' />
                                    @endif
                				</div>
                			</div>
                		</div>
            			
            			<div class="mt-3" style="margin-bottom: 15px;">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div id="promo">{{ ($kategori->kode !== 'one-punch-man' || Auth::check() == false) ? '4' : '5' }}</div>
                					<p>Kode Promo</p>
                				</div>
                				<input type="text" class="form-control" placeholder="Voucher" id="voucher" autocomplete="off" name="voucher">
                				<p class="mt-3" style="font-size: 13px;color: #718096;">Abaikan apabila tidak memiliki kode voucher</p>
                				<button class="btn btn-primary w-50 floating-start" type="button" id="btn-check">Gunakan Kode Promo</button>
                			</div>
            			</div>
            			
            			<div class="mt-3 mb-order-responsive">
            			    <div class="dark-card p-4">
                				<div class="num-page">
                					<div id="wa">{{ ($kategori->kode !== 'one-punch-man' || Auth::check() == false) ? '5' : '6' }}</div>
                					<p>Konfirmasi Pesanan</p>
                				</div>
                			    <input type="number" class="form-control" placeholder="Nomor WhatsApp" id="nomor" autocomplete="off" name="whatsapp">
                				<p class="mt-3" style="font-size: 13px;color: #718096;">Bukti pembayaran atas pembelian anda akan kami kirimkan ke WhatsApp anda.</p>
                				
                				<button class="btn btn-order btn-primary d-none d-md-block" type="button" id="btn-order">Beli Sekarang</button>
                			</div>
            			</div>
            		</form>
        		</div>
    		</div>
            
            <div class="menu-bottom p-3 d-md-none">
                <button class="btn btn-order btn-primary w-100" type="button" id="btn-order-m">Beli Sekarang</button>
            </div>
        </div>
@push('custom_script')

<script>
    $('.disabled').on('change keydown keyup', function() {
        $('.disabled, #disabled, .dsbld').addClass('form-control disabled')
        $('.disabled').prop('disabled', true)
    })

    function changeHarga(harga,hargareal)
    {
        $("#SALDO").html(harga);
        $("#OVO").html(harga);
        $("#GOPAY").html(harga);
        $("#SHOPEEPAY").html(harga);
        $("#QRIS").html(harga);
        $("#QRIS2").html(harga);
        $("#MYBVA").html(harga);
        $("#PERMATAVA").html(harga);
        $("#BNIVA").html(harga);
        $("#BRIVA").html(harga);
        $("#MANDIRIVA").html(harga);
        $("#SMSVA").html(harga);
        $("#MUAMALATVA").html(harga);
        $("#CIMBVA").html(harga);
        $("#SAMPOERNAVA").html(harga);
        $("#BSIVA").html(harga);
        $("#ALFAMART").html(harga);
        $("#ALFAMIDI").html(harga);
        $("#INDOMARET").html(harga);
    }

    $('.accordion-button').css('pointer-events','none');
    $('.accordion-header').addClass('hide-payment');

    $('.product-list').on('click',function(){
        const prd = $(this).attr('product-id');
        const pembayaran = $("#metode").val("SALDO");
        $('.product-list').removeClass('active');
        $(this).addClass('active');

        $('#nominal').val(prd);

        $("#metode").on('change', function () {
            if(pembayaran == 'SALDO') {
                $('#qty-form').addClass('show').removeClass('hide')
                @if($kategori->kode == 'one-punch-man')
                $('#qty').on('keyup click', function() {
                    const qty = $(this).val();
                    $(this).attr('value',qty);
                    $('.accordion-button').css('pointer-events','auto');
                    $('.accordion-header').removeClass('hide-payment');

                    $.ajax({
                        url: "<?php echo route('ajax.price') ?>",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "_token": "<?php echo csrf_token() ?>",
                            "nominal": prd,
                            "qty": qty
                        },
                        success: function(res) {
                            changeHarga(res.harga);
                        }
                    })
                })
                @else
                $('.accordion-button').css('pointer-events','auto');
                $('.accordion-header').removeClass('hide-payment');

                $.ajax({
                    url: "<?php echo route('ajax.price') ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
                        "_token": "<?php echo csrf_token() ?>",
                        "nominal": prd,
                        "qty": 1
                    },
                    success: function(res) {
                        changeHarga(res.harga);
                    }
                })
                @endif
            } else {
                $('#qty-form').addClass('hide').removeClass('show')
                $('#wa').text('5')
                $('#promo').text('4')

                $('.accordion-button').css('pointer-events','auto');
                $('.accordion-header').removeClass('hide-payment');

                $.ajax({
                    url: "<?php echo route('ajax.price') ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
                        "_token": "<?php echo csrf_token() ?>",
                        "nominal": prd,
                        "qty": 1
                    },
                    success: function(res) {
                        changeHarga(res.harga);
                    }
                })
            }
        });
    });

    $('.accordion-header').click(function(){
        if($(this).hasClass('hide-payment')){
            toastr.options.positionClass = "toast-top-center";
            toastr.options.closeButton = true;
            toastr.error('Mohon untuk pilih item terlebih dahulu');
        }
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.method-list').click(function(){
       const mtd = $(this).attr('method-id');
       $('.method-list').removeClass('active');
       $(this).addClass('active');

       $('#metode').val(mtd);
    });
    
    $("#btn-order, #btn-order-m").on("click", function() {
        var uid = $("#user_id").val();
        var zone = $("#zone").val();
        var email_joki = $("#email_joki").val();
        var password_joki = $("#password_joki").val();
        var loginvia_joki = $("#loginvia_joki").val();
        var nickname_joki = $("#nickname_joki").val();
        var request_joki = $("#request_joki").val();
        var catatan_joki = $("#catatan_joki").val();
        var qty = $("#qty").val();
        var service = $("#nominal").val();
        var pembayaran = $("#metode").val();
        var nomor = $("#nomor").val();
        // var email = $("input[name='email']").val();
        var voucher = $("#voucher").val();
        var ktg_tipe = $("#ktg_tipe").val();
           
        $.ajax({
            url: "<?php echo route('ajax.confirm-data') ?>",
            dataType: "JSON",
            type: "POST",
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'uid': uid,
                'zone': zone,
                'service': service,
                'payment_method': pembayaran,
                'nomor': nomor,
                'email_joki' : email_joki,
                'password_joki' : password_joki,
                'loginvia_joki' : loginvia_joki,
                'nickname_joki' : nickname_joki,
                'request_joki' : request_joki,
                'catatan_joki' : catatan_joki,
                'qty' : qty,
                'ktg_tipe' : ktg_tipe,
                // 'email': email,
                'voucher': voucher
            },
            beforeSend: function() {
                Swal.fire({
                    icon: "info",
                    title: "Tunggu sebentar yaa...",
                    // background: '#222831',
                    // color: '#fff',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            complete:function(){
                grecaptcha.reset();
            },
            success: function(res) {
                if (res.status == true) {
                    Swal.fire({
                        // background: '#222831',
                        // color: '#fff',
                        titleText: 'Detail Pesanan kamu',
                        html: `${res.data}`,
                        showCancelButton: true,
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Konfirmasi',
                        customClass: {
                            title: 'swal-title',
                            htmlContainer: 'swal-text'
                        }
                    }).then(resp => {
                        if (resp.isConfirmed) {
                            var nickname = $("#nick").text();
                            var nohp = $("#nomor").val();
                            // var email = $("input[name='email']").val();
                            $.ajax({
                                url: "<?php echo route('order') ?>",
                                dataType: "JSON",
                                type: "POST",
                                data: {
                                    '_token': '<?php echo csrf_token() ?>',
                                    'nickname': nickname,
                                    'uid': uid,
                                    'zone': zone,
                                    'service': service,
                                    'payment_method': pembayaran,
                                    'nomor': nohp,
                                    // 'email': email,
                                    'voucher': voucher,
                                    'qty' : qty,
                                    'email_joki' : email_joki,
                                    'password_joki' : password_joki,
                                    'loginvia_joki' : loginvia_joki,
                                    'nickname_joki' : nickname_joki,
                                    'request_joki' : request_joki,
                                    'catatan_joki' : catatan_joki,
                                    'ktg_tipe' : ktg_tipe,
                                },
                                beforeSend: function() {
                                    Swal.fire({
                                        icon: "info",
                                        title: "Tunggu sebentar yaa...",
                                        // background: '#222831',
                                        // color: '#fff',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                    });
                                },
                                success: function(resOrder) {
                                    if (resOrder.status) {
                                        Swal.fire({
                                            title: 'Berhasil memesan',
                                            text: `Order ID : ${resOrder.order_id}`,
                                            icon: 'success',
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            // background: '#222831',
                                            // color: '#fff'
                                        });
                                        window.location = `/pembelian/invoice/${resOrder.order_id}`;
                                    } else {
                                        Swal.fire({
                                            title: 'Yahh Gagal...',
                                            text: `${resOrder.data}`,
                                            icon: 'error',
                                            // background: '#222831',
                                            // color: '#fff'
                                        });
                                    }
                                }
                            })
                        }
                    })
                } else if (res.status == false) {
                    Swal.fire({
                        title: 'Yahh Gagal...',
                        text: res.data,
                        icon: 'error',
                        // background: '#222831',
                        // color: '#fff'
                    });
                } else {
                    Swal.fire({
                        title: 'Yahh Gagal...',
                        text: 'User ID kamu tidak ditemukan.',
                        icon: 'error',
                        // background: '#222831',
                        // color: '#fff'
                    });
                }
            },
            error: function(e) {
                if (e.status == 422) {
                    Swal.fire({
                        title: 'Yahh Gagal...',
                        text: 'Masih ada data yang kosong nihh.',
                        icon: 'error',
                        // background: '#222831',
                        // color: '#fff'
                    });
                }
            }
        })
    })
        
    $("#btn-check").on("click", function(){
        var voucher = $("#voucher").val();
        var service = $("#nominal").val();
        $.ajax({
            url: "<?php echo route('check.voucher') ?>",
            dataType: "JSON",
            type: "POST",
            data: {
                "_token": "<?php echo csrf_token(); ?>",
                "voucher": voucher,
                "service": service
            },
            beforeSend: function() {
                Swal.fire({
                    icon: "info",
                    title: "Tunggu sebentar yaa...",
                    // background: '#222831',
                    // color: '#fff',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (res){
                Swal.fire({
                    icon: "success",
                    title: res.message,
                    // background: '#222831',
                    // color: '#fff',
                    showConfirmButton: true,
                    allowOutsideClick: true,
                });                   
                
                if(res.harga){
                    changeHarga(res.harga);
                }
            },
            error: function(e){
                Swal.fire({
                    title: 'Yahh Gagal...',
                    text: e.responseJSON.message,
                    icon: 'error',
                    // background: '#222831',
                    // color: '#fff'
                });                    
            }
        }) 
    });
</script>
@endpush

@endsection