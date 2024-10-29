@extends('layouts.error')

@section('title', '403 Forbidden')

@section('content')
<div class="p-3">
    <h1>403 Forbidden, you aren't allowed to enter.</h1>
    {{-- <p>{{ $exception->getMessage() }}</p> --}}
</div>
@endsection