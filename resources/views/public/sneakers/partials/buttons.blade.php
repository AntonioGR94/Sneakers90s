@auth

<a href="/orders/buy" class="btn btn-success btn-sm mr-2 float-right">Buy</a>
<a href="/sneakers/{{ $sneaker->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
<form action="/sneakers/{{ $sneaker->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete Sneakers</button>
</form>

@endauth
