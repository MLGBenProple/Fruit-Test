<h1>Products</h1>
@foreach ($products as $product)
    <p>{{$product->slug}}</p>
    <p>Display Name:{{$product->name}}</p>
    <a href="{{route('products.edit', $product->id)}}">Edit Product</a>
    <form method="POST" action="{{route('products.destroy', $product->id)}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <input type="submit" class="delete-product" value="Delete Product">
    </form>
@endforeach

<h2>Add Product</h2>
<form method="post" action="{{route('products.store', $variety->id)}}">
    @csrf
    <input type="text" name="name" placeholder="product">
    <button type="submit">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.delete-product').click(function(e){
        e.preventDefault()
        if (confirm('Are you sure?')) {
            $(e.target).closest('form').submit()
        }
    });
</script>