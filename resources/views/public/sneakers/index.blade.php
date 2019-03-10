@extends('layouts.app')

@section('title', 'Sneakers90s')

@section('content')
<h1>Sneakers List</h1>

    <div class="d-flex justify-content-center">
        {{ $sneakers->links() }}
    </div>

    @if(session('message'))
    <div class="alert alert-primary" role="alert">
            {{ session('message') }}
    </div>
    @endif

    @forelse($sneakers as $sneaker)
    <div class="sneaker-card card mb-2">
        <div class="card-header">
            {{ $sneaker->name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img class="img-fluid" src="{{ $sneaker->cover }}" alt="">
                </div>
                <div class="col">
                    <h5 class="card-title">User: <a href="{{ route('mysneakers.index', $sneaker->user->slug) }}" title="{{ $sneaker->user->name }}'s book list">{{ $sneaker->user->name }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Brand: {{ $sneaker->brand->name }}</h6>
                    <p class="card-text">{{ str_limit($sneaker->description, 300) }}</p>

                    @include('public.sneakers.partials.buttons')

                    <a href="/sneakers/{{ $sneaker->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
                </div>
            </div>
      </div>
    </div>

    @empty
      <p>There arent sneakers</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $sneakers->links() }}
    </div>
@endsection
