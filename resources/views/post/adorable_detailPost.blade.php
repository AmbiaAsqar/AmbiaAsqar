@extends('layouts.template')

@section('title', $getnews['title'])

@push('seo-tags')
<link rel='canonical' href="https://jurnalhobi.com/post/{{ base64_encode('getcontent'. $getnews['content_id']) }}" />

<meta name='keywords' content="{{ $getnews['keywords'] }}" />
<meta name='description' content="{{ substr(strip_tags($getnews['description']),0,150) }}" />
<meta name='subject' content="Berita ter-update tanpa hoax" />
<meta name='pagename' content="{{ $getnews['title'] }}" />
<meta name='topic' content="{{ substr(strip_tags($getnews['description']),0,150) }}" />
<meta name='summary' content="{{ substr(strip_tags($getnews['description']),0,150) }}" />
<meta name='identifier-URL' content="https://jurnalhobi.com/post/{{ base64_encode('getcontent'. $getnews['content_id']) }}" />
<meta name='url' content="https://jurnalhobi.com/post/{{ base64_encode('getcontent'. $getnews['content_id']) }}" />
@php
    $getcat = DB::table('category')->where('category_id', $getnews['category_id'])->get();
    $getcat = json_decode($getcat, true);

    $date = date_create($getnews['created_at']);
    $user = DB::table('user')->where('user_id', $getnews['user_id'])->get();
    $user = json_decode($user, true);
@endphp
<meta name='category' content="{{ $getcat[0]['title'] }}" />
<meta name='author' content="{{ $user[0]['username'] }}, {{ $user[0]['email'] }}" />
<meta name='date' content="{{ date_format($date, 'M. d, Y') }}" />

<meta name='og:title' content="{{ $getnews['title'] }}" />
<meta name='og:site_name' content='Jurnalhobi' />
<meta name='og:description' content="{{ substr(strip_tags($getnews['description']),0,150) }}" />
<meta name="og:email" content="{{ $user[0]['email'] }}"/>

<meta name="news_keywords" content="{{ $getnews['keywords'] }}">
@endpush

@section('content')
@if(!Cookie::get('cooKey'.$getnews['content_id']))
    {{ $cookie = Cookie::queue('cooKey'.$getnews['content_id'], env('APP_KEY').'gueKeCe', time() + (10 * 365 * 24 * 60 * 60)) }}
    <script>
        $(document).ready(() => {
            var url = "{{ url('postuserview') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    newsid: "{{ $getnews['content_id'] }}",
                },
                success: function(result) {
                    result = JSON.parse(result);
                    console.log("User viewing this page.");
                    console.log("Status: "+result.status);
                    console.log("Message: "+result.message);
                    console.log("Request: "+result.request);
                }
            })
        })
    </script>
@endif
<div class="w-100 d-flex d-md-none justify-content-center" style="height:auto;position:absolute;z-index:2">
    <div class="rounded" id="swipe-up" style="margin-top:-25px;"></div>
</div>
<main id="main">
    <div class="header d-none d-lg-flex align-items-end" style=" z-index: 99; position: relative">
        <nav class="navbar shadow d-none d-lg-flex align-items-center">
            <div class="container px-5">
                <ul class="px-5">
                    @foreach($getcategory as $gc)
                    <li><a href="#">{{ $gc['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
    <div id="mobileMainDetection" class="container-fluid container-md p-0">
        <section class="mx-md-5 px-md-5">
            <div class="row justify-content-around m-0 w-100 p-1">
                <div class="col-12 col-md-8 p-0 p-md-3">
                    <nav class="d-none d-lg-block mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ env('APP_URL') }}"><i class="fi-xnsuxl-house-solid"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                    <div class="d-none d-md-flex justify-content-center mb-2 mt-1">
                        <div class="main-image-skeleton" id="main-skeleton" style="width: 100%;">
                            <div class="caption">
                                <div class="title"></div>
                                <div class="title" style="width: 60%"></div>
                                <div class="small" style="width: 20%"></div>
                            </div>
                        </div>
                        <!-- ###################### -->
                        <a href="#" class="main-image-post" id="main-image" style="display:none">
                            <div class="w-100 h-100" style="overflow:hidden; position:relative; bottom:0;">
                                <img src="{{ $getnews['image'] }}" style="border-radius:10px; position:absolute; overflow:hidden; width:100%; height:100%; z-index:0" />
                                <div class="caption" style="position: absolute; z-index: 1; bottom: 0">
                                    {{-- <h1>{{ ucfirst($getnews['marker']) }}</h1> --}}
                                    <h4 style="color: #fcfcff">{{ ucfirst($getnews['marker']) }}</h4>
                                    <p class="m-0">{!! $getnews['copyright'] !!}</p>
                                    @php
                                        $date = date_create($getnews['created_at']);
                                        $username = DB::table('user')->where('user_id', $getnews['user_id'])->get();
                                        $username = json_decode($username, true);
                                    @endphp
                                </div>
                            </div>
                        </a>
                    </div>
                    <ul class="d-flex m-0 p-0" style="list-style: none;">
                        @php $explode = explode(',', $getnews['keywords']) @endphp
                        @for($i=0;$i<3;$i++)
                            <li class="me-3"><a href="#">#{{ $explode[$i] }}</a></li>
                        @endfor
                    </ul>
                    <small class="d-none d-md-block">By <b>{{ $username[0]['username'] }}</b> - <span class="timeago" datetime="{{ date_format($date, 'Y-m-d H:i:s') }}">{{ date_format($date, 'F, d Y') }}</span></small>

                    <div class="category d-none d-md-flex">
                        <h1>{{ $getnews['title'] }}</h1>
                    </div>
                    <div class="category-m d-flex d-md-none">
                        <h1>{{ $getnews['title'] }}</h1>
                    </div>

                    <!-- Main Topic -->
                    <div class="d-block p-0 m-0" style="overflow-x: hidden">
                        <div class="main-topic d-none" id="main-topic"></div>
                        <div class="main-topic-skeleton" id="main-topic-skeleton"></div>
                        {!! $getnews['description'] !!}
                    </div>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7041766592433406"
     crossorigin="anonymous"></script>
                    <!-- horizontal ad -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-7041766592433406"
                         data-ad-slot="2924414108"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                    <div class="d-block">
                        <div class="category d-flex">
                            <span class="pipe"></span><h2><i>Similar Topic</i></h2>
                        </div>
                        <div class="d-lg-flex d-block">
                            @for($j=0;$j<3;$j++)
                            {{-- @php $gst = json_encode($getsimilartopic) @endphp
                            {{ $gst }} --}}
                            <div class="main-topic w-100 ads">
                                <img class="w-100 image" src="{{ $getsimilartopic[$j]['image'] ?? $getrandomnews[$j]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.(!empty($getsimilartopic[$j]['content_id']) ? $getsimilartopic[$j]['content_id'] : $getrandomnews[$j]['content_id'] )) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags mt-2">
                                        <ul>
                                            @php $explode = explode(',', $getsimilartopic[$j]['keywords'] ?? $getrandomnews[$j]['keywords']) @endphp
                                            @for($i=0; $i<3; $i++)
                                            <li><a href="#">#{{ $explode[$i] ?? '' }}</a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.($getsimilartopic[$j]['content_id'] ?? $getrandomnews[$j]['content_id'])) }}"><h1>{{ $getsimilartopic[$j]['title'] ?? $getrandomnews[$j]['title'] }}</h1></a>
                                    @php
                                        $date = date_create($getsimilartopic[$j]['created_at'] ?? $getrandomnews[$j]['created_at']);
                                        $username = DB::table('user')->where('user_id', ($getsimilartopic[$j]['user_id'] ?? $getrandomnews[$j]['user_id']))->get();
                                        $username = json_decode($username, true);
                                    @endphp
                                    <small>{{ $username[0]['username'] ?? '' }} - <span class="timeago" datetime="{{ date_format($date, 'Y-m-d H:i:s') }}"></span></small>
                                </div>
                            </div>
                            @endfor
                            {{-- <div class="main-topic w-100 ads">
                                <div class="image" style="width:100%"></div>
                                <div class="caption">
                                    <div class="tags mt-2">
                                        <ul>
                                            <li><a href="#">#global</a></li>
                                            <li><a href="#">#war</a></li>
                                            <li><a href="#">#RussiaUkraine</a></li>
                                        </ul>
                                    </div>
                                    <a href="#"><h1>Ukraine Soldiers Retreat as Russian Army Marching to Kyiv</h1></a>
                                    <small>admin - Feb, 03 2022</small>
                                </div>
                            </div>
                            <div class="main-topic w-100 ads">
                                <div class="image" style="width:100%"></div>
                                <div class="caption">
                                    <div class="tags mt-2">
                                        <ul>
                                            <li><a href="#">#global</a></li>
                                            <li><a href="#">#war</a></li>
                                            <li><a href="#">#RussiaUkraine</a></li>
                                        </ul>
                                    </div>
                                    <a href="#"><h1>Ukraine Soldiers Retreat as Russian Army Marching to Kyiv</h1></a>
                                    <small>admin - Feb, 03 2022</small>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="d-block">
                        <div class="category d-flex">
                            <span class="pipe"></span><h2><i>Comments</i></h2>
                        </div>
                        <!--div class="d-block">
                            <div class="d-flex">
                                <div class="col-3 col-md-1 p-0 d-flex justify-content-center">
                                    <div class="user-photo"></div>
                                </div>
                                <div class="col-9 col-md-11 p-0 ps-md-2">
                                    <div class="d-block">
                                        <b>Ali Khamerun</b> &#8226; <small class="text-muted">10/02/2022</small>
                                        <p>As what I've seen, US and Nato aren't in the way of law, They break the rules many times (Including the rules they've made).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-3 col-md-1 p-0 d-flex justify-content-center">
                                    <div class="user-photo"></div>
                                </div>
                                <div class="col-9 col-md-11 p-0 ps-md-2">
                                    <div class="d-block">
                                        <b>Ali Fahrudin</b> &#8226; <small class="text-muted">10/02/2022</small>
                                        <p>I need something</p>
                                    </div>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>

                <div class="col-lg-4 col-12 col-md-8 p-3">
                    <div class="category d-flex">
                        <span class="pipe"></span><h2><i><b>latest topic</b></i></h2>
                    </div>
                    
                    <div class="d-block" style="width: 100%">
                        <div class="topic-skeleton ads">
                            <div class="image"></div>
                            <div class="caption">
                                <div class="title mt-2" style="width: 90%"></div>
                                <div class="title" style="width: 50%"></div>
                                <div class="small" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="topic-skeleton ads">
                            <div class="image"></div>
                            <div class="caption">
                                <div class="title mt-2" style="width: 90%"></div>
                                <div class="title" style="width: 50%"></div>
                                <div class="small" style="width: 40%"></div>
                            </div>
                        </div>
                        <!-- ###################### -->
                        @for($i=0; $i<=4; $i++)
                        <div class="topic ads" style="display: none">
                            <img class="image" src="{{ $gettodaynews[$i]['image'] ?? $getregularnews[$i]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[$i]['content_id'] ?? $getregularnews[$i]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                            <div class="caption">
                                <div class="tags">
                                    <ul>
                                        @php $news = explode(",",$gettodaynews[$i]['keywords'] ?? $getregularnews[$i]['keywords']) @endphp
                                        <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                    </ul>
                                </div>
                                <h1><a href="/post/{{ base64_encode('getcontent'.($gettodaynews[$i]['content_id'] ?? $getregularnews[$i]['content_id'])) }}">{{ $gettodaynews[$i]['title'] ?? $getregularnews[$i]['title'] }}</a></h1>
                                @php
                                $date = date_create($gettodaynews[$i]['created_at'] ?? $getregularnews[$i]['created_at']);
                                $todayu = DB::table('user')->where('user_id', $gettodaynews[$i]['user_id'] ?? $getregularnews[$i]['user_id'])->get();
                                $todayu = json_decode($todayu, true);
                                @endphp
                                <small>{{ ucfirst($todayu[0]['username']) }} - <span class="timeago" datetime="{{ date_format($date, 'Y-m-d H:i:s') }}"></span></small>
                            </div>
                        </div>
                        @endfor
                    </div><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7041766592433406"
                         crossorigin="anonymous"></script>
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="fluid"
                         data-ad-layout-key="-g4+3w+8y-c3-3z"
                         data-ad-client="ca-pub-7041766592433406"
                         data-ad-slot="5973766193"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@push('head script')
    @once
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endonce
@endpush