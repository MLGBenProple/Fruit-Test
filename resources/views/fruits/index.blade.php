<h1>Fruits</h1>
@foreach ($fruits as $fruit)
    <p>{{$fruit->slug}}</p>
    <p>Display Name: {{$fruit->name}}</p>
    <a href="{{route('fruits.edit', $fruit->id)}}">Edit Fruit</a>
    <a href="{{route('varieties.index', $fruit->id)}}">Edit Varieties</a>
    <form method="POST" action="{{route('fruits.destroy', $fruit->id)}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <input type="submit" class="delete-fruit" value="Delete Fruit">
    </form>
@endforeach

<h2>Add Fruit</h2>
<form method="post" action="{{route('fruits.store')}}">
    @csrf
    <input type="text" name="name" placeholder="fruit">
    <button type="submit">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.delete-fruit').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>