@extends('layouts.template')

@section('title',$getcategory[0]['title'])

@section('content')
@php
$blocked = ['<p>','</p>','<span>','</span>','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<b>','</b>','<i>','</i>','<br>'];
$replace = ['&quot;'];
$req = request('id');
@endphp
<main id="main">
    <div id="mobileMainDetection" class="container-fluid container-md px-0">
        <div class="d-none d-md-flex px-2 mainly-news">
            @php
                $news = Http::get(env('API_URL').'/gethotnewscategory/'.$req)->json();
            @endphp
            <a href="/post/{{ $news[0]['content_id'] }}" class="w-50 h-100 top-banner">
                <img src="{{ $news[0]['image'] }}" class="w-100 h-100" />
                <div class="drawbox half">
                    <h3 class="title">{{ $news[0]['title'] }}</h3>
                    <p class="px-3 text-light">{{ str_replace($blocked,'', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $news[0]['description']))) }}</p>
                </div>
            </a>
            <div class="d-block w-50 pl-3">
                <a href="/post/{{ $news[1]['content_id'] }}">
                    <div class="w-100 h-50 top-banner">
                        <img src="{{ $news[1]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $news[1]['title'] }}</h3>
                            <p class="px-3 text-light">{{ str_replace($blocked,'', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $news[1]['description']))) }}</p>
                        </div>
                    </div>
                </a>
                <div class="d-flex w-100 h-50 pt-3">
                    <a href="/post/{{ $news[2]['content_id'] }}" class="w-50 h-100 top-banner">
                        <img src="{{ $news[2]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $news[2]['title'] }}</h3>
                            <p class="px-3 text-light">{{ str_replace($blocked,'', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $news[2]['description']))) }}</p>
                        </div>
                    </a>
                    <a href="/post/{{ $news[3]['content_id'] }}" class="w-50 h-100 ml-3 top-banner">
                        <img src="{{ $news[3]['image'] }}" class="w-100 h-100" />
                        <div class="drawbox full">
                            <h3 class="title">{{ $news[3]['title'] }}</h3>
                            <p class="px-3 text-light">{{ str_replace($blocked,'', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $news[3]['description']))) }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-around mt-0 mt-md-5 mx-0">
            <div class="col-12 col-md-8 col-lg-9 p-2">
                <div class="category">
                    <h1 class="title">Berita Terkini</h1>
                </div>
                <div class="row justify-content-between m-0">
                @foreach ($getnews as $key => $d)
                    <div class="col-12 p-0" id="content{{$d['content_id']}}" >
                        <div class="con con-news" style="width: 100%; max-width: 100%; max-height: 500px">
                            <div class="d-md-flex d-block w-100" style="overflow: hidden">
                                <a href="#{{$d['content_id']}}" class="d-sm-flex d-none con-head active" style="width: 200px; height: 130px; min-height: 100px; background-color: #dadada">
                                    <img src="{{ ($d['category_id']==$req) ? $d['image'] : '' }}" onerror="document.getElementById('content{{$d['content_id']}}').remove()" class="d-sm-flex d-none" style="width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                </a>
                                <a href="#{{$d['content_id']}}" class="d-sm-none d-block con-head active" style="width: 100%; height: 200px; min-height: 100px; background-color: #dadada">
                                    <img src="{{ ($d['category_id']==$req) ? $d['image'] : '' }}" onerror="document.getElementById('content{{$d['content_id']}}').remove()" class="d-sm-none d-block" style="width: 100%; height: 100%; min-height: 100px; display: none !important"/>
                                </a>
                                <div class="con-body" style="position: relative">
                                    <div class="c skeleton" style="width: 70% height: 20px"></div>
                                    <span class="c" style="display: none">
                                        @if (($gethotnews[0]['title'] == $getnews[$key]['title']) || ($gethotnews[1]['title'] == $getnews[$key]['title']) || ($gethotnews[2]['title'] == $getnews[$key]['title']) || ($gethotnews[3]['title'] == $getnews[$key]['title']))
                                            <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                        @endif
                                    </span>
                                    <div class="h3 skeleton" style="width: 200px; height: 25px; margin-bottom: 10px"></div>
                                    <div class="hide" style="display: none">
                                        <h3 class="title mt-2" style="hyphens: auto">
                                            {{-- $title[$l] --}}
                                            <a href="#{{ $d['content_id']}}">{{ $d['title'] }}</a>
                                        </h3>
                                    </div>
                                    <div class="hide d-flex" style="display: none !important;">
                                        <p class="mt-1 continous" style="-webkit-line-clamp: 2;">
                                            {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus at vel ipsam labore saepe non voluptate fugiat, harum repellat odio ipsum quod explicabo facere, neque sed itaque laudantium beatae molestias. --}}
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