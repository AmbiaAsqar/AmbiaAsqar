<header color="transparent white-md" class="py-2 px-1" style="position: fixed; z-index: 2">
    <div id="header" class="py-1 container-fluid h-100 container-lg">
        <div class="d-flex h-100 justify-content-between align-items-center">
            <h1 class="title ml-3 ml-md-0"><a href="/">{{ config('app.name') }}</a></h1>
            <h2 id="rightbar-btn" class="d-block d-md-none" class="title mr-3">&vellip;</h2>
        </div>
    </div>
    <nav class="container-fluid container-lg" style="opacity: 0;">
        <div class="d-none d-md-block justify-content-between category-tab">
            <ul>
                @foreach ($getcategory as $gc)
                <li class="ml-0"><a href="{{ url('category/'.$gc['category_id']) }}">{{ ucfirst($gc['title']) }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="text-dark">
            {{-- <marquee>
                <ul class="d-flex">
                    <li class="mr-5" style="list-style-type: disc; padding: 0">Rockstar mengeluarkan GTA Trilogy untuk menutupi kekurangan pada versi keluarga GTA III sebelumnya?</li>
                    <li class="mr-5" style="list-style-type: disc; padding: 0">Jokowi membuat game sendiri, aneh tapi nyata!</li>
                </ul>
            </marquee> --}}
        </div>
    </nav>
</header>
@php
$blocked = ['<p>','</p>','<span>','</span>','<h1>','</h1>','<h2>','</h2>','<b>','</b>','<i>','</i>'];
$replace = ['&quot;'];
@endphp
<div class="img half-60 half-md-none exclusive" style="overflow: hidden">
    <div class="h-100 w-100" id="parallax">
        <img src="@if(Request::is('post/*')) {{ $getnews['image'] }} @else {{ $gethotnews[3]['image'] }} @endif" />
        <div class="descTop" style="position: absolute; bottom: 60px; left: 20px;">
            <h2 class="title text-light text-capitalize mb-1"><a href="#{{$gethotnews[0]['content_id']}}" style="color: #eff2f5">{{ $gethotnews[3]['title'] }}</a></h2>
            <p class="text-light">{{ str_replace($blocked, '', str_replace($replace, '"', $gethotnews[3]['description'])) }}</p>
        </div>
        <div class="w-100 h-75 dark" style="background-image: linear-gradient(to top, #000, #0000);position:absolute;bottom:0;left:0"></div>
    </div>
</div>