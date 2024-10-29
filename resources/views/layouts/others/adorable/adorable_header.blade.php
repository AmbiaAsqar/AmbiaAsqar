<header class="transparent" style="position: fixed; z-index: 98">
    <nav id="nav-desktop" class="navbar shadow d-none d-lg-flex align-items-center" style="opacity: 0;">
        <div class="container px-5">
            <ul id="category-scroller" class="px-5">
                @foreach($getcategory as $gc)
                <li><a href="{{ '/category/'.$gc['category_id'] }}">{{ $gc['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
    <nav id="nav-mobile" class="navbar p-0 shadow d-flex d-lg-none align-items-center" style="opacity: 0;">
        <ul id="category-scroller">
            @foreach($getcategory as $gc)
            <li><a href="{{ '/category/'.$gc['category_id'] }}">{{ $gc['title'] }}</a></li>
            @endforeach
        </ul>
    </nav>
</header>
<div class="img half-60 half-md-none exclusive" style="overflow: hidden">
    <div class="h-100 w-100" id="parallax">
        @if (request()->segment(2)=='')
            <img src="{{ $gethotnews[0]['image'] }}" />
        @else
            <img src="{{ $getnews['image'] ?? $getnews[0]['image'] }}" />
        @endif
        <div class="descTop" style="z-index: 1; position: absolute; bottom: 60px; left: 20px;">
            @if (Request::segment(2) == '')
                <h2 class="title text-light text-capitalize mb-1"><a href="/post/{{ base64_encode('getContent'.$gethotnews[0]['content_id']) }}" style="color: #eff2f5">{{ $gethotnews[0]['title'] }}</a></h2>
                <p class="text-light">{{ strip_tags($gethotnews[0]['description']) }}</p>
                @php
                    $date = date_create($gethotnews['created_at'] ?? '');
                    $username = DB::table('user')->where('user_id', ($gethotnews['user_id'] ?? ''))->get();
                    $username = json_decode($username, true);
                @endphp
                <small>By <b>{{ $username[0]['username'] ?? '' }}</b> - <span class="timeago" datetime="{{ date_format($date, 'Y-m-d H:i:s') }}"></span></small>
            @else
                <h2 class="continous" style="-webkit-line-clamp: 1">{{ ucfirst($getnews['marker'] ?? '') }}</h2>
                <p class="m-0">{!! $getnews['copyright'] ?? '' !!}</p>
                @php
                    $date = date_create($getnews['created_at'] ?? '');
                    $username = DB::table('user')->where('user_id', ($getnews['user_id'] ?? ''))->get();
                    $username = json_decode($username, true);
                @endphp
                <small>By <b>{{ $username[0]['username'] ?? '' }}</b> - <span class="timeago" datetime="{{ date_format($date, 'Y-m-d H:i:s') }}"></span></small>
            @endif
        </div>
        <div class="w-100 h-75 dark" style="background-image: linear-gradient(to top, #000, #0000);position:absolute;bottom:0;left:0"></div>
    </div>
</div>