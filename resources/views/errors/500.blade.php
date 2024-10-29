@extends('layouts.error')

@section('title', '500 Internal Server Error')

@section('content')
<div class="p-3">
    <h1>500 Internal Server Error</h1>
    {{-- <p>{{ $exception->getMessage() }}</p> --}}
</div>
@endsection