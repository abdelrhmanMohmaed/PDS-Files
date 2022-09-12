<div>
    <form class="d-flex">
        <select id="search" class="item-select js-example-placeholder-single form-select form-select-sm mt-2"
            aria-label=".form-select-sm example">
            <option disabled selected>Open this select menu</option>
            @foreach ($parts as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </form>
</div>
