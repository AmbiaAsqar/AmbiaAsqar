@extends('layouts.plain')

@section('browse')

<main id="main">
    <div id="mobileMainDetection" class="container-fluid container-md p-0">
        <section>
            <div class="row justify-content-around w-100 m-0 p-0">
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
        </section>
    </div>
</main>
@endsection