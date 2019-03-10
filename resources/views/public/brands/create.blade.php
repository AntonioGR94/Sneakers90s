@extends('layouts.app')

@section('title', 'Register a Brand')

@section('content')
<h1>Register a Brand</h1>
<form action="/brands" method="post" novalidate>
    @csrf
    @include('public.brands.partials.form')
    <button type="submit" class="btn btn-primary">Register Brand</button>
</form>
@endsection