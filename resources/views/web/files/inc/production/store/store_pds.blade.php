@if (in_array(Auth::user()->role_id, [1, 2]))
    <form action="{{ route('file.store', ['part' => $part->id, 'name' => 'Pdsfile']) }}" method="POST" class="w-100"
        enctype="multipart/form-data">
        @csrf
        <label>Machine Number :</label>
        <select name="machine_id" id="" class="form-select js-example-basic-single w-100"
            aria-label="Default select example">
            <option disabled selected>
                Select machine number
            </option>
            @foreach ($machines as $item)
                <option value="{{ $item->id }}">
                    {{ $item->number }}
                </option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="pds-file">Upload File :</label>
            <input id="pds-file" name="file" type="file" class="form-control-file form-control">
        </div>
        <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
            <div class="">
                <button class="btn btn-primary submit" type="submit" id="submit">Upload</button>

                <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Pdsfile']) }}"
                    class="btn btn-secondary">
                    View Files
                </a>
            </div>
        </div>
    </form>
@else
    <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Pdsfile']) }}" class="btn btn-secondary">
        View Files
    </a>
@endif
