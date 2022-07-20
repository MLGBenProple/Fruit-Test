<h1>Varieties</h1>
@foreach ($varieties as $variety)
    <p>{{$variety->slug}}</p>
    <p>Display Name:{{$variety->name}}</p>
    <a href="{{route('varieties.edit', $variety->id)}}">Edit Variety</a>
    <a href="{{route('products.index', $variety->id)}}">Edit Products</a>
    <form method="POST" action="{{route('varieties.destroy', $variety->id)}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <input type="submit" class="delete-variety" value="Delete Variety">
    </form>
@endforeach

<h2>Add Variety</h2>
<form method="post" action="{{route('varieties.store', $fruit->id)}}">
    @csrf
    <input type="text" name="name" placeholder="variety">
    <button type="submit">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.delete-variety').click(function(e){
        e.preventDefault()
        if (confirm('Are you sure?')) {
            $(e.target).closest('form').submit()
        }
    });
</script>