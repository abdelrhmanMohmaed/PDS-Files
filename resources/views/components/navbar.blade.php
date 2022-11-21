<div >
    <form class="d-flex" >
        <select id="search" class="js-example-basic-single" style="width: 150px !important;">
            <option disabled selected>PN Shortcut</option>
            @foreach ($parts as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </form>
</div>
