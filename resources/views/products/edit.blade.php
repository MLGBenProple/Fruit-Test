<h1>Edit {{$product->slug}}</h1>
<form method="post" action="{{route('products.update', $product->id)}}">
    @csrf
    <input type="hidden" name="_method" value="patch" />
    <label for="name">Display Name:</label>
    <input type="text" name="name" placeholder="product">
    <button type="submit">Submit</button>
</form>