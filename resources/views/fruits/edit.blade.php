<h1>Edit {{$fruit->slug}}</h1>
<form method="post" action="{{route('fruits.update', $fruit->id)}}">
    @csrf
    <input type="hidden" name="_method" value="patch" />
    <label for="name">Display Name:</label>
    <input type="text" name="name" placeholder="fruit">
    <button type="submit">Submit</button>
</form>