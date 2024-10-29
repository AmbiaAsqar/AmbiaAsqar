@extends('layouts.template')

@section('title','Beranda')

@section('content')
@php
$blocked = ['<p>','</p>','<span>','</span>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<b>','</b>','<i>','</i>','<br>'];
$replace = ['&quot;'];
@endphp
<div class="w-100 d-flex d-md-none justify-content-center" style="height:auto;position:absolute;z-index:2">
    <div class="rounded" id="swipe-up" style="margin-top:-25px;"></div>
</div>
<main id="main">
    <div id="mobileMainDetection" class="container-fluid container-md px-0">
        <div class="d-none d-md-flex px-2 mainly-news">
            @php return dd($gethotnews[0]['content_id']) @endphp
            <a href="/post/{{ $gethotnews[0]['content_id'] }}" class="w-50 h-100 top-banner">
                <img src="{{ $gethotnews[0]['image'] }}" class="w-100 h-100" />
                <div class="drawbox half">
                    <h3 class="title">{{ $gethotnews[0]['title'] }}</h3>
                    <p class="px-3 text-light">
                        {{-- {{ str_replace($blocked,'', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $gethotnews[0]['description']))) }} --}}
                        {{ strip_tags($gethotnews[0]['description']) }}
                    </p>
                </div>
            </a>
            <div class="d-block w-50 pl-3">
                <a href="/post/{{ $gethotnews[1]['content_id'] }}">
                    <div class="w-100 h-50 top-banner">
                        <img src="{{ $gethotnews[1]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $gethotnews[1]['title'] }}</h3>
                            <p class="px-3 text-light">
                                {{-- {{ str_replace($blocked,'', str_replace($replace, '"',$gethotnews[1]['description'])) }} --}}
                                {{ strip_tags($gethotnews[1]['description']) }}
                            </p>
                        </div>
                    </div>
                </a>
                <div class="d-flex w-100 h-50 pt-3">
                    <a href="/post/{{ $gethotnews[2]['content_id'] }}" class="w-50 h-100 top-banner">
                        <img src="{{ $gethotnews[2]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $gethotnews[2]['title'] }}</h3>
                            <p class="px-3 text-light">
                                {{-- {{ str_replace($blocked,'', str_replace($replace, '"',$gethotnews[2]['description'])) }} --}}
                                {{ strip_tags($gethotnews[2]['description']) }}
                            </p>
                        </div>
                    </a>
                    <a href="/post/{{ $gethotnews[3]['content_id'] }}" class="w-50 h-100 ml-3 top-banner">
                        <img src="{{ $gethotnews[3]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $gethotnews[3]['title'] }}</h3>
                            <p class="px-3 text-light">
                                {{-- {{ str_replace($blocked,'', str_replace($replace, '"',$gethotnews[3]['description'])) }} --}}
                                {{ strip_tags($gethotnews[3]['description']) }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-around mt-0 mt-md-5 mx-0">
            <div class="col-12 col-md-8 col-lg-9 p-2">
                <div class="category">
                    <h1 class="title">Update Terkini</h1>
                </div>
                <div class="d-block d-md-flex mb-3">
                    <div class="card mr-2 bg-transparent border-0 d-none d-lg-block" style="width: 450px">
                        <a href="/post/{{ $gettodaynews[0]['content_id']??$getnews[0]['content_id'] }}">
                            <img src="{{ $gettodaynews[0]['image']??$getnews[0]['image'] }}" class="w-100" style="object-fit: cover; max-height: 225px; border-radius:20px"/>
                        </a>
                        <div class="card-body px-0 pt-1">
                            <div class="c skeleton" style="width: 70px; height: 20px"></div>
                            <span class="c" style="display: none">
                                <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['title'] }}</span>
                                @if (($gethotnews[0]['title'] == ($gettodaynews[0]['title']??$getnews[0]['title'])) 
                                || ($gethotnews[1]['title'] == ($gettodaynews[0]['title']??$getnews[0]['title'])) 
                                || ($gethotnews[2]['title'] == ($gettodaynews[0]['title']??$getnews[0]['title'])) 
                                || ($gethotnews[3]['title'] == ($gettodaynews[0]['title']??$getnews[0]['title'])))
                                    <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                @endif
                            </span>
                            <div class="h3 skeleton" style="width: 100%; height: 25px; margin-bottom: 10px"></div>
                            <div class="hide" style="display:none">
                                <h5 class="title continous mb-2 font-weight-bold mt-2" style="-webkit-line-clamp: 1">
                                    {{-- Banjir Landa Sejumlah Wilayah Di Kota Bandung --}}
                                    <a href="/post/{{ $gettodaynews[0]['content_id']??$getnews[0]['content_id'] }}">{{ $gettodaynews[0]['title']??$getnews[0]['title'] }}</a>
                                </h5>
                            </div>
                            <div class="p skeleton" style="width: 100%; height: 12px"></div>
                            <div class="hide" style="display: none">
                                <p class="continous" style="-webkit-line-clamp: 1;">
                                    {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse necessitatibus vitae, repellendus adipisci dolor nostrum molestias autem eius eaque. Labore est possimus error, expedita at laborum eos obcaecati dolorum minima? --}}
                                    {{-- {{ str_replace($blocked, '', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $gettodaynews[0]['description']??$getnews[0]['description']))) }} --}}
                                    {{ strip_tags($gettodaynews[0]['description']??$getnews[0]['description']) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block">
                        @php
                            // $title = ['Kopi Liberika Riau','Piknik Pekarangan Rumah','12 Pohon Lindung Terbakar Akibat Cuaca Ekstrim'];
                            $category = ['lifestyle', 'fun', 'weather'];
                            $color = ['bg-success', 'bg-primary', 'bg-warning'];
                        @endphp
                        @for ($i = 1; $i < 3; $i++)
                        <div class="con con-news mb-2 m-0">
                            <a href="/post/{{ $gettodaynews[$i]['content_id']??$getnews[$i]['content_id'] }}">
                                <div class="con-head active" style="width: 150px; height: 150px; overflow:hidden; background-color: #dadada">
                                    <img src="{{ $gettodaynews[$i]['image']??$getnews[$i]['image'] }}" style="object-fit: cover; width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                </div>
                            </a>
                            <div class="con-body">
                                <div class="c skeleton" style="width: 70px; height: 20px"></div>
                                <span class="c" style="display: none">
                                    <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['title'] }}</span>
                                    @if (($gethotnews[0]['title'] == ($gettodaynews[$i]['title']??$getnews[0]['title'])) 
                                    || ($gethotnews[1]['title'] == ($gettodaynews[$i]['title']??$getnews[$i]['title'])) 
                                    || ($gethotnews[2]['title'] == ($gettodaynews[$i]['title']??$getnews[$i]['title'])) 
                                    || ($gethotnews[3]['title'] == ($gettodaynews[$i]['title']??$getnews[$i]['title'])))
                                        <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                    @endif
                                </span>
                                <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                                <div class="hide d-none d-md-flex" style="display: none !important">
                                    <a href="/post/{{ $gettodaynews[$i]['content_id']??$getnews[$i]['content_id'] }}">
                                        <h3 class="title mt-1" style="-webkit-line-clamp: 1">{{ $gettodaynews[$i]['title']??$getnews[$i]['title'] }}</h3>
                                    </a>
                                </div>
                                <div class="hide d-flex d-md-none" style="display: none !important">
                                    <a href="/post/{{ $gettodaynews[$i]['content_id']??$getnews[$i]['content_id'] }}">
                                        <h3 class="title mt-1" style="-webkit-line-clamp: 2; hyphens: auto">{{ $gettodaynews[$i]['title']??$getnews[$i]['title'] }}</h3>
                                    </a>
                                </div>
                                <div class="p skeleton" style="width: 60%; height: 12px"></div>
                                <div class="p skeleton" style="width: 35%; height: 12px"></div>
                                <div class="d-flex hide" style="display: none !important">
                                    <p class="mt-1" style="-webkit-line-clamp: 3">
                                        {{-- {{ str_replace($blocked, '', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $gettodaynews[$i]['description']??$getnews[0]['description']))) }} --}}
                                        {{ strip_tags($gettodaynews[$i]['description']??$getnews[0]['description']) }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end text-muted mt-2">
                                    <div class="skeleton" style="width: 70px; height: 9px"></div>
                                    <small class="v" style="display:none">{{ $gettodaynews[$i]['views']??$getnews[$i]['views'] }} views</small>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <div class="d-block d-lg-none">
                        @for ($im = 0; $im < 3; $im++)
                        <div class="con con-news">
                            <a href="/post/{{ $gettodaynews[$im]['content_id']??$getnews[$im]['content_id'] }}">
                                <div class="con-head active" style="width: 130px; height: 100px; min-height: 100px; min-width: 100px; overflow:hidden; background-color: #dadada">
                                    <img src="{{ $gettodaynews[$im]['image']??$getnews[$im]['image'] }}" style="object-fit: cover; width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                </div>
                            </a>
                            <div class="con-body">
                                <div class="c skeleton" style="width: 70px; height: 20px"></div>
                                <span class="c" style="display: none">
                                    <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['title'] }}</span>
                                    @if (($gethotnews[0]['title'] == ($gettodaynews[$im]['title']??$getnews[$im]['title'])) 
                                    || ($gethotnews[1]['title'] == ($gettodaynews[$im]['title']??$getnews[$im]['title'])) 
                                    || ($gethotnews[2]['title'] == ($gettodaynews[$im]['title']??$getnews[$im]['title'])) 
                                    || ($gethotnews[3]['title'] == ($gettodaynews[$im]['title']??$getnews[$im]['title'])))
                                        <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                    @endif
                                </span>
                                <div class="h3 skeleton" style="width: 100%; height: 25px; margin-bottom: 10px"></div>
                                <div class="hide" style="display: none">
                                    <a href="/post/{{ $gettodaynews[$im]['content_id']??$getnews[$im]['content_id'] }}">
                                        <h3 class="title mt-2" style="hyphens: auto">{{ $gettodaynews[$im]['title']??$getnews[$im]['title'] }}</h3>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-end text-secondary mt-2">
                                    <div class="skeleton" style="width: 70px; height: 9px"></div>
                                    <small class="v" style="display:none">{{ $gettodaynews[$im]['views']??$getnews[$im]['title'] }} views</small>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="category">
                    <h1 class="title">Trending Topic</h1>
                </div>
                <div class="row justify-content-between m-0">
                    {{-- @mobile: Mobile view category Today --}}
                    @php
                        $title = ['Sari Anggereni masuk LinkIt','Presiden UK mafia','Shot n&#39; boom release 2021'];
                        $category = ['healthy', 'entertainment', 'movie'];
                        $color = ['bg-success', 'bg-info', 'bg-danger'];
                    @endphp
                    @foreach ($gethotnews as $ghn)
                    <div class="col-lg-6 col-12 p-0">
                        <div class="con con-news">
                            <div class="con-head active" style="width: 130px; height: 100px; min-height: 100px; min-width: 100px; background-color: #dadada">
                                <img src="{{ $ghn['image'] }}" style="width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                            </div>
                            <div class="con-body">
                                <div class="c skeleton" style="width: 70px; height: 20px"></div>
                                <span class="c" style="display: none">
                                    <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/'.$ghn['category_id'])->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/'.$ghn['category_id'])->json()[0]['title'] }}</span>
                                </span>
                                <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                                <div class="hide" style="display: none">
                                    <h3 class="title mt-2" style="hyphens: auto">{!! $ghn['title'] !!}</h3>
                                </div>
                                <!--div class="d-flex">
                                    <p class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus at vel ipsam labore saepe non voluptate fugiat, harum repellat odio ipsum quod explicabo facere, neque sed itaque laudantium beatae molestias.</p>
                                </div-->
                                <div class="d-flex justify-content-end text-secondary mt-2">
                                    <div class="skeleton" style="width: 70px; height: 9px"></div>
                                    <small class="v" style="display: none">{{ $ghn['views'] }} views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="category">
                    <h1 class="title">Untuk Anda</h1>
                </div>
                <div class="row justify-content-between m-0">
                    {{-- @mobile: Mobile view category Today --}}
                    @php
                        // $title = ['Heboh! Kini AdoeLTV Telah Mencapai 1000 Subscriber?','PT. Royal Chirag Teknologi (RCT) Resmi Milik Bpk. Sameer','Tidak Hanya 1 Korban, Tapi Lebih!','Ternyata Putih Abu-abu Menjadi Warna SMA Sejak 1945','Black Box Telah Ditemukan Oleh Team SAR',
                        //         'Parah! Ari Untung Dikabarkan Akan Meninggalkan Tanah Air','Rumah Kapolri Diserang Kelompok Tak Dikenal','Bintang 5 Bukan Bintang Tertinggi?','Film Zombie Berjudul "I\'m The Undead" Segera Rilis Tahun 2021','Benarkah Film Godfather Berawal Dari Cerita Asli Keluarga Mafia?'];
                        $category = ['healthy', 'entertainment', 'movie', 'healthy', 'entertainment', 'movie', 'entertainment', 'healthy', 'movie', 'movie'];
                        $color = ['bg-success', 'bg-info', 'bg-danger','bg-primary','bg-warning','bg-success', 'bg-info', 'bg-danger','bg-primary','bg-warning'];
                    @endphp
                    {{-- @for ($l = 0; $l < 10; $l++) --}}
                    @foreach ($getnews as $key => $d)
                    <div class="col-12 p-0">
                        <div class="con con-news" style="width: 100%; max-width: 100%; max-height: 500px">
                            <div class="d-md-flex d-block w-100" style="overflow: hidden">
                                <a href="/post/{{ $d['content_id'] }}">
                                    <div class="d-sm-flex d-none con-head active" style="width: 200px; height: 130px; min-height: 100px; background-color: #dadada">
                                        <img src="{{ $d['image'] }}" class="d-sm-flex d-none" style="width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                    </div>
                                </a>
                                <a href="/post/{{ $d['content_id'] }}">
                                   <div class="d-sm-none d-block con-head active" style="width: 100%; height: 200px; min-height: 100px; background-color: #dadada">
                                        <img src="{{ $d['image'] }}" class="d-sm-none d-block" style="width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                    </div>
                                </a>
                                <div class="con-body" style="position: relative">
                                    <div class="c skeleton" style="width: 70% height: 20px"></div>
                                    <span class="c" style="display: none">
                                        <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/'.$d['category_id'])->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/'.$d['category_id'])->json()[0]['title'] }}</span>
                                        @if (($gethotnews[0]['title'] == $getnews[$key]['title']) || ($gethotnews[1]['title'] == $getnews[$key]['title']) || ($gethotnews[2]['title'] == $getnews[$key]['title']) || ($gethotnews[3]['title'] == $getnews[$key]['title']))
                                            <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                        @endif
                                    </span>
                                    <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                                    <div class="hide" style="display: none">
                                        <h3 class="title mt-2" style="hyphens: auto">
                                            {{-- $title[$l] --}}
                                            <a href="/post/{{ $d['content_id'] }}">{{ $d['title'] }}</a>
                                        </h3>
                                    </div>
                                    <div class="hide d-flex" style="display: none !important;">
                                        <p class="mt-1 continous" style="-webkit-line-clamp: 2;">
                                            {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus at vel ipsam labore saepe non voluptate fugiat, harum repellat odio ipsum quod explicabo facere, neque sed itaque laudantium beatae molestias. --}}
                                            {{-- {{ str_replace($blocked, '', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $getnews[$d['category_id']]['description']))) }} --}}
                                            {{ strip_tags($d['description']) }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-end text-secondary mt-2">
                                        <div class="skeleton" style="width: 70px; height: 9px"></div>
                                        <small class="v" style="display: none">{{ $d['views'] }} views</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- @endfor --}}
                </div>
            </div>
            <div id="rightbar" class="col-12 col-md-4 col-lg-3 p-2">
                <div class="category">
                    <h1 class="title">Breaking News</h1>
                </div>
                <div class="p skeleton" style="width: 80%; height: 12px"></div>
                <div class="p skeleton" style="width: 47%; height: 12px"></div>
                <div class="p skeleton" style="width: 77%; height: 12px"></div>
                <div class="p skeleton" style="width: 33%; height: 12px"></div>
                <div class="p skeleton" style="width: 58%; height: 12px"></div>
                <div class="p skeleton" style="width: 90%; height: 12px"></div>
                <div class="p skeleton" style="width: 46%; height: 12px"></div>
                <div class="p skeleton" style="width: 88%; height: 12px"></div>
                <p style="display:none">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, id. Placeat facilis at odio laboriosam quis numquam. Eligendi ipsam recusandae, repudiandae asperiores nobis voluptates qui ratione, perferendis voluptatum, nostrum perspiciatis.</p>
                <p style="display:none">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sint, minus laboriosam explicabo aliquid nihil minima cum suscipit blanditiis sequi dolor tempore ad exercitationem obcaecati vitae eum saepe provident debitis!</p>
                <div class="category">
                    <h1 class="title">Advertisment</h1>
                </div>
                <div class="card mr-2 bg-transparent border-0 d-block" style="width: 100%">
                    <img src="{{ url('img/content.jpeg') }}" class="w-100" style="border-radius:20px"/>
                    <div class="card-body px-0 pt-1">
                        <span class="little-tag text-light bg-danger">hot</span>
                        <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                        <div class="hide" style="display: none">
                            <h5 class="title continous mb-2 font-weight-bold mt-2" style="-webkit-line-clamp: 1">Banjir Landa Sejumlah Wilayah Di Kota Bandung</h5>
                        </div>
                        <div class="p skeleton" style="width: 80%; height: 12px"></div>
                        <div class="p skeleton" style="width: 47%; height: 12px"></div>
                        <div class="p skeleton" style="width: 77%; height: 12px"></div>
                        <div class="p skeleton" style="width: 33%; height: 12px"></div>
                        <div class="p skeleton" style="width: 58%; height: 12px"></div>
                        <div class="p skeleton" style="width: 90%; height: 12px"></div>
                        <div class="p skeleton" style="width: 46%; height: 12px"></div>
                        <div class="p skeleton" style="width: 88%; height: 12px"></div>
                        <div class="hide" style="display: none">
                            <p class="continous" style="-webkit-line-clamp: 1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse necessitatibus vitae, repellendus adipisci dolor nostrum molestias autem eius eaque. Labore est possimus error, expedita at laborum eos obcaecati dolorum minima?</p>
                        </div>
                    </div>
                </div>
                <div style="position: sticky; position: -webkit-sticky; top: 0; padding-top: 100px;">
                    <div class="card mr-2 bg-transparent border-0 d-block" style="width: 100%">
                        <img src="{{ url('img/content.jpeg') }}" class="w-100" style="border-radius:20px"/>
                        <div class="card-body px-0 pt-1">
                            <span class="little-tag text-light bg-danger">hot</span>
                            <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                            <div class="hide" style="display: none">
                                <h5 class="title continous mb-2 font-weight-bold mt-2" style="-webkit-line-clamp: 1">Banjir Landa Sejumlah Wilayah Di Kota Bandung</h5>
                            </div>
                            <div class="p skeleton" style="width: 80%; height: 12px"></div>
                            <div class="p skeleton" style="width: 47%; height: 12px"></div>
                            <div class="p skeleton" style="width: 77%; height: 12px"></div>
                            <div class="p skeleton" style="width: 33%; height: 12px"></div>
                            <div class="p skeleton" style="width: 58%; height: 12px"></div>
                            <div class="p skeleton" style="width: 90%; height: 12px"></div>
                            <div class="p skeleton" style="width: 46%; height: 12px"></div>
                            <div class="p skeleton" style="width: 88%; height: 12px"></div>
                            <div class="hide" style="display: none">
                                <p class="continous" style="-webkit-line-clamp: 1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse necessitatibus vitae, repellendus adipisci dolor nostrum molestias autem eius eaque. Labore est possimus error, expedita at laborum eos obcaecati dolorum minima?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('button')
    @include('layouts.others.main-button')
@endsection

@once
    @push('script')
    <script defer src="https://friconix.com/cdn/friconix-0.2210.js"></script>
    @endpush
@endonce