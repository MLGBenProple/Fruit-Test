<h1>Edit {{$variety->slug}}</h1>
<form method="post" action="{{route('varieties.update', $variety->id)}}">
    @csrf
    <input type="hidden" name="_method" value="patch" />
    <label for="name">Display Name:</label>
    <input type="text" name="name" placeholder="variety">
    <button type="submit">Submit</button>
</form>