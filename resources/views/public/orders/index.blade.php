@extends('layouts.app')

@section('title', 'Sneakers90s')

@section('content')
<h1>Orders List</h1>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

    @forelse($orders as $order)
    <div class="card mb-2">
        <div class="card-header">
            Id Usuario: {{ $order->user_id }}
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Id del pedido: {{ $order->id}}</h6>
        
    </div>
</div>

    @empty
      <p>There arent orderss</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection