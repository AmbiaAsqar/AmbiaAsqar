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
            <div class="w-75 h-100 top-banner">
                <img src="{{ $getnews['image'] }}" class="w-100 h-100" />
            </div>
        </div>

        <div class="row justify-content-around mt-0 mt-md-5 mx-0">
            <div class="col-12 col-md-8 col-lg-9 p-2">
                <h1 class="title mb-3"><b>{{ ucfirst($getnews['title']) }}</b></h1>
                {!! $getnews['description'] !!}
                <div class="row">
                    <div class="col-12 pt-5">
                        <h1 class="title mb-3">Berita Lainnya</h1>
                        <div class="row">
                            @for ($i = 0; $i < 3; $i++)
                            <div class="col-4">
                                <div class="card mr-2 bg-transparent border-0 d-none d-lg-block">
                                    <a href="/post/{{ $gettodaynews[$i]['content_id']??$getmynews[$i]['content_id'] }}">
                                        <img src="{{ $gettodaynews[$i]['image']??$getmynews[$i]['image'] }}" class="w-100" style="object-fit: cover; min-height: 138px; max-height: 225px; border-radius:20px"/>
                                    </a>
                                    <div class="card-body px-0 pt-1">
                                        <div class="c skeleton" style="width: 70px; height: 20px"></div>
                                        <span class="c" style="display: none">
                                            <span class="little-tag text-light" style="background-color: {{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['color'] }};">{{ Http::get(env('API_URL').'/getcategorydetail/1')->json()[0]['title'] }}</span>
                                            @if ($gethotnews[$i]['title'] == ($gettodaynews[$i]['title']??$getmynews[$i]['title']))
                                                <span class="little-tag text-light" style="background-color: #ff0000;">hot</span>
                                            @endif
                                        </span>
                                        <div class="h3 skeleton" style="width: 100%; height: 25px; margin-bottom: 10px"></div>
                                        <div class="hide" style="display:none">
                                            <h5 class="title continous mb-2 font-weight-bold mt-2" style="-webkit-line-clamp: 1">
                                                {{-- Banjir Landa Sejumlah Wilayah Di Kota Bandung --}}
                                                <a href="/post/{{ $gettodaynews[$i]['content_id']??$getmynews[$i]['content_id'] }}">{{ $gettodaynews[$i]['title']??$getmynews[$i]['title'] }}</a>
                                            </h5>
                                        </div>
                                        <div class="p skeleton" style="width: 100%; height: 12px"></div>
                                        <div class="hide" style="display: none">
                                            <p class="continous" style="-webkit-line-clamp: 1;">
                                                {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse necessitatibus vitae, repellendus adipisci dolor nostrum molestias autem eius eaque. Labore est possimus error, expedita at laborum eos obcaecati dolorum minima? --}}
                                                {{-- {{ str_replace($blocked, '', str_replace($replace, '"', preg_replace("/<img[^>]+\>/i", '(image)', $gettodaynews[0]['description']??$getnews[0]['description']))) }} --}}
                                                {{ strip_tags($gettodaynews[$i]['description']??$getmynews[$i]['description']) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <h1 class="title mb-3">Komentar</h1>
                        <textarea id="summernote" name="editordata"></textarea>
                    </div>
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

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@once
    @push('script')
        <script defer src="https://friconix.com/cdn/friconix-0.2210.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Berkomentarlah dengan bijak',
                    tabsize: 1,
                    minWidth: 200,
                    maxWidth: 800,
                    height: 200,
                    focus: true,
                    toolbar: [
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                        ['view', ['help']]
                    ]
                });
            });
        </script>
    @endpush
@endonce