<div>
    <form class="d-flex">
        <select id="search" class="js-example-basic-single">
            <option disabled selected>Open this select menu</option>
            @foreach ($parts as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </form>
</div>
