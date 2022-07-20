<ul id="fruitsList">
    @foreach ($fruits as $fruit)
        <li>
            <span>{{ $fruit->name }}</span>
            <ul>
                @foreach ($fruit->varieties as $variety)
                    <li>
                        <span>{{ $variety->name }}</span>
                        <ul>
                            @foreach ($variety->products as $product)
                                <li>{{ $product->name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
<a href="{{ route('fruits.index') }}">Edit Fruits</a>
