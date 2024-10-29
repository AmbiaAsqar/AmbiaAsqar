@php
    $theme = 0;
    $themename = ["adorable"];
    $themestatus = 1;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    @if ($themestatus)
        <link href="{{ asset('css/'.$themename[$theme].'.css') }}" rel="stylesheet" />
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @endif
</head>
<body>
    <div id="scroller">
        @yield('browse')
    </div>
</body>
<script defer src="https://friconix.com/cdn/friconix.js"></script>
@stack('script')
</html>