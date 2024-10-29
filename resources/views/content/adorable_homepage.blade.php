@extends('layouts.template')

@section('title', 'Home')

@section('content')
@if(Request::query("page"))
@php header("Location: ".Request::query("url")) @endphp
@endif
<div class="w-100 d-flex d-md-none justify-content-center" style="height:auto;position:absolute;z-index:2">
    <div class="rounded" id="swipe-up" style="margin-top:-25px;"></div>
</div>
<main id="main">
    <div class="header d-none d-lg-flex align-items-end" style=" z-index: 99; position: relative">
        <nav class="navbar shadow d-none d-lg-flex align-items-center">
            <div class="container px-5">
                <ul class="px-5">
                    <!-- Category Menu -->
                    @foreach($getcategory as $gc)
                    <li><a href="{{ '/category/'.$gc['category_id'] }}">{{ $gc['title'] }}</a></li>
                    @endforeach
                    <!-- END -->
                </ul>
            </div>
        </nav>
    </div>
    <div id="mobileMainDetection" class="container-fluid container-md p-0">
        <div class="d-none d-md-flex justify-content-center mt-5 mx-5 px-5">
            <!-- SKELETON START -->
            <div class="main-image-skeleton" id="main-skeleton">
                <div class="caption">
                    <div class="title"></div>
                    <div class="title" style="width: 60%"></div>
                    <div class="small" style="width: 20%"></div>
                </div>
            </div>
            <!-- END 
            ---- START CONTENT BIG -->
            <a href="post/{{ base64_encode('getcontent'.$gethotnews[0]['content_id']) }}" class="main-image" id="main-image" style="display:none;">
                <div class="w-100 h-100" style="overflow:hidden; position:relative; bottom:0;">
                    <img src="{{ $gethotnews[0]['image'] }}" style="border-radius:10px; position:absolute; overflow:hidden; width:100%; height:100%; z-index:0" />
                    <div class="caption" style="position: absolute; z-index: 1; bottom: 0">
                        <h1>{{ $gethotnews[0]['title'] }}</h1>
                        <p class="m-0 continous" style="height: 90%; -webkit-line-clamp: 4;">
                            {{ strip_tags($gethotnews[0]['description']) }}
                        </p>
                        @php
                        $date = date_create($gethotnews[0]['created_at']);
                        $username = DB::table('user')->where('user_id', $gethotnews[0]['user_id'])->get();
                        $username = json_decode($username, true);
                        @endphp
                        <small>{{ $username[0]['username'] .' - '. date_format($date, 'M, d Y') }}</small>
                    </div>
                </div>
            </a>
            <!-- END -->
            <div class="d-block px-1" style="width: 42%">
                <!-- SKELETON WIDE START -->
                <div class="side-image-skeleton w-100 h-50 mb-2" id="side-skeleton">
                    <div class="caption">
                        <div class="title"></div>
                        <div class="title" style="width: 60%"></div>
                        <div class="small" style="width: 20%"></div>
                    </div>
                </div>
                <!-- END
                ---- START WIDE CONTENT -->
                <a href="post/{{ base64_encode('getcontent'.$gethotnews[1]['content_id']) }}" class="side-image mb-1 h-50 w-100" id="side-image" style="display:none">
                    <div class="w-100 h-100" style="overflow:hidden; position:relative; bottom:0;">
                        <img src="{{ $gethotnews[1]['image'] }}" style="border-radius:10px; position:absolute; overflow:hidden; width:100%; height:100%; z-index:0" />
                        <div class="caption" style="position: absolute; z-index: 1; bottom: 0">
                            <h1>{{ $gethotnews[1]['title'] }}</h1>
                            <p class="m-0 continous" style="height: 90%; -webkit-line-clamp: 3;">
                                {{ strip_tags($gethotnews[1]['description']) }}
                            </p>
                            @php
                            $date = date_create($gethotnews[1]['created_at']);
                            $username = DB::table('user')->where('user_id', $gethotnews[1]['user_id'])->get();
                            $username = json_decode($username, true);
                            @endphp
                            <small>{{ $username[0]['username'] .' - '. date_format($date, 'M, d Y') }}</small>
                        </div>
                    </div>
                </a>
                <!-- END -->
                <div class="d-flex w-100">
                    <!-- START SMALL CONTENTS -->
                    <div class="side-image-skeleton ms-1 w-50" id="side-skeleton">
                        <div class="caption">
                            <div class="title"></div>
                            <div class="title" style="width: 60%"></div>
                            <div class="small" style="width: 20%"></div>
                        </div>
                    </div>
                    <div class="side-image-skeleton me-1 w-50" id="side-skeleton">
                        <div class="caption">
                            <div class="title"></div>
                            <div class="title" style="width: 60%"></div>
                            <div class="small" style="width: 20%"></div>
                        </div>
                    </div>
                    <!-- END
                    ---- START SMALL CONTENTS -->
                    <a href="post/{{ base64_encode('getcontent'.$gethotnews[2]['content_id']) }}" class="side-image w-50" style="display:none">
                        <div class="w-100 h-100" style="overflow:hidden; position:relative; bottom:0;">
                            <img src="{{ $gethotnews[2]['image'] }}" style="border-radius:10px; position:absolute; overflow:hidden; width:100%; height:100%; z-index:0" />
                            <div class="caption" style="position: absolute; z-index: 1; bottom: 0">
                                <h1>{{ $gethotnews[2]['title'] }}</h1>
                                @php
                                $date = date_create($gethotnews[2]['created_at']);
                                $username = DB::table('user')->where('user_id', $gethotnews[2]['user_id'])->get();
                                $username = json_decode($username, true);
                                @endphp
                                <small>{{ $username[0]['username'] .' - '. date_format($date, 'M, d Y') }}</small>
                            </div>
                        </div>
                    </a>
                    <a href="post/{{ base64_encode('getcontent'.$gethotnews[3]['content_id']) }}" class="side-image ms-1 w-50" style="display:none">
                        <div class="w-100 h-100" style="overflow:hidden; position:relative; bottom:0;">
                            <img src="{{ $gethotnews[3]['image'] }}" style="border-radius:10px; position:absolute; overflow:hidden; width:100%; height:100%; z-index:0" />
                            <div class="caption" style="position: absolute; z-index: 1; bottom: 0">
                                <h1>{{ $gethotnews[3]['title'] }}</h1>
                                @php
                                $date = date_create($gethotnews[3]['created_at']);
                                $username = DB::table('user')->where('user_id', $gethotnews[3]['user_id'])->get();
                                $username = json_decode($username, true);
                                @endphp
                                <small>{{ $username[0]['username'] .' - '. date_format($date, 'M, d Y') }}</small>
                            </div>
                        </div>
                    </a>
                    <!-- END -->
                </div>
            </div>
        </div>

        <section class="mx-md-5 px-md-5">
            <div class="row justify-content-around w-100 m-0 p-0">
                <div class="col-12 col-md-8 p-0">
                    <div class="category d-none d-md-flex">
                        <span class="pipe"></span><h2><b><i>trending</i></b></h2>
                    </div>
                    <div class="category-m d-flex d-md-none">
                        <span class="pipe"></span><h2><b><i>trending</i></b></h2>
                    </div>

                    <!-- Main Topic -->
                    <div class="d-flex">
                        <!-- SKELETON START -->
                        <div class="main-topic-skeleton" id="main-topic-skeleton">
                            <div class="image"></div>
                            <div class="caption">
                                <div class="title mt-2" style="width: 90%"></div>
                                <div class="title" style="width: 50%"></div>
                                <div class="small" style="width: 30%"></div>
                            </div>
                        </div>
                        <!-- END
                        ---- START CONTENT BIG -->
                        <div class="d-none d-lg-block main-topic" id="main-topic" style="display: none !important">
                            <div class="w-100" style="height:150px; overflow:hidden; position:relative;">
                                <img class="image" src="{{ $gethotnews[4]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[4]['content_id']) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="ribbon bg-danger" style="position: absolute; z-index: 1; bottom: 10px;">hot news</div>
                            </div>
                            <div class="caption">
                                <div class="tags mt-2">
                                    <ul>
                                        @php $news = explode(",",$gethotnews[4]['keywords']) @endphp
                                        <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                    </ul>
                                </div>
                                <a href="/post/{{ base64_encode('getcontent'.$gethotnews[4]['content_id']) }}"><h1>{{ $gethotnews[4]['title'] }}</h1></a>
                                <div class="continous" style="-webkit-line-clamp: 2">{{ strip_tags($gethotnews[4]['description']) }}</div>
                                @php $date = date_create($gethotnews[4]['created_at']) @endphp
                                <small>@php
                                $username = DB::table('user')->where('user_id', $gethotnews[4]['user_id'])->get();
                                $username = json_decode($username, true);
                                echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}</small>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- Topic -->
                        <!-- DESKTOP VIEW -->
                        <!-- START SKELETON -->
                        <div class="d-none d-md-block" style="width: 65%">
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- END
                            ---- START CONTENT -->
                            <div class="topic" style="display: none">
                                <div class="image" style="overflow:hidden; position:relative;">
                                    <img class="w-100 h-100" src="{{ $gethotnews[5]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[5]['content_id']) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                    <div class="ribbon bg-danger" style="position: absolute; z-index: 1; bottom: 10px;">hot news</div>
                                </div>
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gethotnews[5]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gethotnews[5]['content_id'] ?? $getnews[5]['content_id']) }}"><h1>{{ $gethotnews[5]['title'] ?? '' }}</h1></a>
                                    <div class="continous" style="-webkit-line-clamp: 2">{{ strip_tags($gethotnews[5]['description']) }}</div>
                                    @php $date = date_create($gethotnews[5]['created_at']) @endphp
                                    <small>@php
                                        $username = DB::table('user')->where('user_id', $gethotnews[5]['user_id'])->get();
                                        $username = json_decode($username, true);
                                        echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="topic" style="display: none">
                                <div class="image" style="overflow:hidden; position:relative;">
                                    <img class="w-100 h-100" src="{{ $gethotnews[6]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[6]['content_id']) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                    <div class="ribbon bg-danger" style="position: absolute; z-index: 1; bottom: 10px;">hot news</div>
                                </div>
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gethotnews[6]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gethotnews[6]['content_id'] ?? $getnews[6]['content_id']) }}"><h1>{{ $gethotnews[6]['title'] ?? '' }}</h1></a>
                                    <div class="continous" style="-webkit-line-clamp: 2">{{ strip_tags($gethotnews[6]['description']) }}</div>
                                    @php $date = date_create($gethotnews[6]['created_at']) @endphp
                                    <small>@php
                                        $username = DB::table('user')->where('user_id', $gethotnews[6]['user_id'])->get();
                                        $username = json_decode($username, true);
                                        echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}
                                    </small>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                        <!-- MOBILE VIEW -->
                        <div class="d-block d-md-none" style="width: 100%">
                            <!-- START CONTENT -->
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- END
                            ---- START CONTENT -->
                            <div class="topic" style="display: none">
                                <img class="image" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[4]['content_id'] ?? $getnews[4]['content_id']) }}'" src="{{ $gethotnews[4]['image'] ??  $getnews[4]['content_id'] }}" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gethotnews[4]['keywords'] ?? $getnews[4]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gethotnews[4]['content_id'] ?? $getnews[4]['content_id']) }}"><h1>{{ $gethotnews[4]['title'] ?? $getnews[4]['title'] }}</h1></a>
                                    @php $date = date_create($gethotnews[4]['created_at']) @endphp
                                    <small>@php
                                        $username = DB::table('user')->where('user_id', $gethotnews[4]['user_id'])->get();
                                        $username = json_decode($username, true);
                                        echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="topic" style="display: none">
                                <img class="image" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[5]['content_id'] ?? $getnews[5]['content_id']) }}'" src="{{ $gethotnews[5]['image'] ??  $getnews[5]['content_id'] }}" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gethotnews[5]['keywords'] ?? $getnews[5]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gethotnews[5]['content_id'] ?? $getnews[5]['content_id']) }}"><h1>{{ $gethotnews[5]['title'] ?? $getnews[5]['title'] }}</h1></a>
                                    @php $date = date_create($gethotnews[5]['created_at']) @endphp
                                    <small>@php
                                        $username = DB::table('user')->where('user_id', $gethotnews[5]['user_id'])->get();
                                        $username = json_decode($username, true);
                                        echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="topic" style="display: none">
                                <img class="image" onclick="location.href='/post/{{ base64_encode('getcontent'.$gethotnews[6]['content_id'] ?? $getnews[6]['content_id']) }}'" src="{{ $gethotnews[6]['image'] ??  $getnews[6]['content_id'] }}" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gethotnews[6]['keywords'] ?? $getnews[6]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gethotnews[6]['content_id'] ?? $getnews[6]['content_id']) }}"><h1>{{ $gethotnews[6]['title'] ?? $getnews[6]['title'] }}</h1></a>
                                    @php $date = date_create($gethotnews[6]['created_at']) @endphp
                                    <small>@php
                                        $username = DB::table('user')->where('user_id', $gethotnews[6]['user_id'])->get();
                                        $username = json_decode($username, true);
                                        echo $username[0]['username'] @endphp - {{ date_format($date, 'M, d Y') }}
                                    </small>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                    </div>

                    <div class="category d-flex">
                        <span class="pipe"></span><h2><b><i>today's update</i></b></h2>
                    </div>

                    <div class="d-flex">
                        <div class="d-none d-lg-block" style="width: 50%">
                            <div class="topic-skeleton ads">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- ###################### -->
                            <div class="topic ads" style="display: none">
                                <img class="image" src="{{ $gettodaynews[0]['image'] ?? $getnews[0]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[0]['content_id'] ?? $getnews[0]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$getnews[0]['keywords'] ?? $getnews[0]['keywords'] ) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="post/{{ base64_encode('getcontent'.($gettodaynews[0]['content_id'] ?? $getnews[0]['content_id'])) }}"><h1>{{ $gettodaynews[0]['title'] ?? $getnews[0]['title'] }}</h1></a>
                                    @php
                                    $date = date_create($gettodaynews[0]['created_at'] ?? $getnews[0]['created_at']);
                                    $todayu = DB::table('user')->where('user_id', $getnews[0]['user_id'] ?? $getnews[0]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                            <div class="topic ads" style="display: none">
                                <img class="image" src="{{ $gettodaynews[1]['image'] ?? $getnews[1]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[1]['content_id'] ?? $getnews[1]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gettodaynews[1]['keywords'] ?? $getnews[1]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="post/{{ base64_encode('getcontent'.($gettodaynews[1]['content_id'] ?? $getnews[1]['content_id'])) }}"><h1>{{ $gettodaynews[1]['title'] ?? $getnews[1]['title'] }}</h1></a>
                                    @php
                                    $todayu = DB::table('user')->where('user_id', $gettodaynews[1]['user_id'] ?? $getnews[1]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block" style="width: 50%">
                            <div class="topic ads" style="display: none">
                                <img class="image" src="{{ $gettodaynews[2]['image'] ?? $getnews[2]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[2]['content_id'] ?? $getnews[2]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gettodaynews[2]['keywords'] ?? $getnews[2]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="post/{{ base64_encode('getcontent'.($gettodaynews[2]['content_id'] ?? $getnews[2]['content_id'])) }}"><h1>{{ $gettodaynews[2]['title'] ?? $getnews[2]['title'] }}</h1></a>
                                    @php
                                    $todayu = DB::table('user')->where('user_id', $gettodaynews[2]['user_id'] ?? $getnews[2]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                            <div class="topic ads" style="display: none">
                                <img class="image" src="{{ $gettodaynews[3]['image'] ?? $getnews[3]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[3]['content_id'] ?? $getnews[3]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gettodaynews[3]['keywords'] ?? $getnews[3]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="post/{{ base64_encode('getcontent'.($gettodaynews[3]['content_id'] ?? $getnews[3]['content_id'])) }}"><h1>{{ $gettodaynews[3]['title'] ?? $getnews[3]['title'] }}</h1></a>
                                    @php
                                    $todayu = DB::table('user')->where('user_id', $gettodaynews[3]['user_id'] ?? $getnews[3]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MOBILE VIEW -->
                    <div class="d-block d-lg-none">
                        <div class="d-block d-lg-none" style="width: 100%">
                            <div class="topic-skeleton ads">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- ###################### -->
                            @for($i=0;$i<=4;$i++)
                            <div class="topic ads" style="display: none">
                                <img class="image" src="{{ $gettodaynews[$i]['image'] ?? $getnews[$i]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[$i]['content_id'] ?? $getnews[$i]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gettodaynews[$i]['keywords'] ?? $getnews[$i]['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="post/{{ base64_encode('getcontent'. ($gettodaynews[$i]['content_id'] ?? $getnews[$i]['content_id'])) }}"><h1>{{ $gettodaynews[$i]['title'] ?? $getnews[$i]['title'] }}</h1></a>
                                    @php
                                    $todayu = DB::table('user')->where('user_id', $gettodaynews[$i]['user_id'] ?? $getnews[$i]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div class="category d-flex">
                        <span class="pipe"></span><h2><b><i>browse</i></b></h2>
                    </div>

                    <div class="d-flex p-0">
                        <!-- Topic -->
                        <!-- DESKTOP VIEW -->
                        <div class="d-none d-md-block" style="width: 100%">
                            @foreach($getnews as $gn)
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- ###################### -->
                            <div class="topic full" style="display: none;">
                                <img class="image" src="{{ $gn['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.$gn['content_id']) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gn['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gn['content_id']) }}"><h1>{{ ucfirst($gn['title']) }}</h1></a>
                                    <div class="continous" style="-webkit-line-clamp: 2; height: 80%">{{ strip_tags($gn['description']) }}</div>
                                    @php
                                    $date = date_create($gn['created_at']);
                                    $todayu = DB::table('user')->where('user_id', $gn['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- MOBILE VIEW -->
                        <div class="d-block d-md-none" style="width: 100%">
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <div class="topic-skeleton">
                                <div class="image"></div>
                                <div class="caption">
                                    <div class="title mt-2" style="width: 90%"></div>
                                    <div class="title" style="width: 50%"></div>
                                    <div class="small" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- ###################### -->
                            @foreach($getnews as $gn)
                            <div class="topic" style="display: none">
                                <img class="image" src="{{ $gn['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.$gn['content_id']) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                                <div class="caption">
                                    <div class="tags">
                                        <ul>
                                            @php $news = explode(",",$gn['keywords']) @endphp
                                            <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                            <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                        </ul>
                                    </div>
                                    <a href="/post/{{ base64_encode('getcontent'.$gn['content_id']) }}"><h1>{{ ucfirst($gn['title']) }}</h1></a>
                                    @php
                                    $date = date_create($gn['created_at']);
                                    $todayu = DB::table('user')->where('user_id', $gn['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                    <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 col-md-8 p-0">
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
                            <img class="image" src="{{ $gettodaynews[$i]['image'] ?? $getnews[$i]['image'] }}" onclick="location.href='/post/{{ base64_encode('getcontent'.($gettodaynews[$i]['content_id'] ?? $getnews[$i]['content_id'])) }}'" style="cursor: pointer; background-position: center; background-size: cover" />
                            <div class="caption">
                                <div class="tags">
                                    <ul>
                                        @php $news = explode(",",$gettodaynews[$i]['keywords'] ?? $getnews[$i]['keywords']) @endphp
                                        <li><a href="#">#{{ $news[0] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[1] ?? '' }}</a></li>
                                        <li><a href="#">#{{ $news[2] ?? '' }}</a></li>
                                    </ul>
                                </div>
                                <h1><a href="/post/{{ base64_encode('getcontent'.($gettodaynews[$i]['content_id'] ?? $getnews[$i]['content_id'])) }}">{{ $gettodaynews[$i]['title'] ?? $getnews[$i]['title'] }}</a></h1>
                                    @php
                                    $date = date_create($gettodaynews[$i]['created_at'] ?? $getnews[$i]['created_at']);
                                    $todayu = DB::table('user')->where('user_id', $gettodaynews[$i]['user_id'] ?? $getnews[$i]['user_id'])->get();
                                    $todayu = json_decode($todayu, true);
                                    @endphp
                                <small>{{ ucfirst($todayu[0]['username']) }} - {{ date_format($date, 'M, d Y') }}</small>
                            </div>
                        </div>
                        @endfor
                        <div class="d-flex justify-content-center mt-3 ad-banner" style="display: none">
                            <a href="https://kontergame.id/" target="_blank">
                                <img src="{{ asset('img/skyscraper kg-2 ver 2.jpg') }}" />
                            </a>
                        </div>
                    </div>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7041766592433406"
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