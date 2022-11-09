<div>
    <form class="d-flex">
        <select id="search_machine" class="js-example-basic-single">
            <option disabled selected>Open this select menu</option>
            @foreach ($machines as $item)
                <option value="{{ $item->id }}">{{ $item->number }}</option>
            @endforeach
        </select>
    </form>
</div>
