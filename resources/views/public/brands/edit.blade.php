@extends('public.layout')

@section('title', 'Edit sneakers')

@section('content')
<form action="/brands/{{ $brand->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.brand.partials.form')

    <button type="submit" class="btn btn-primary">Save changes</button>
</form>
@endsection