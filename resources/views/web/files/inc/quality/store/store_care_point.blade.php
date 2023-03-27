@if (in_array(Auth::user()->role_id, [1, 2]))
    <form action="{{ route('file.store', ['part' => $part->id, 'name' => 'CarePoint']) }}" method="POST" class="w-100"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="care_point_file">Upload File :</label>
            <input id="care_point_file" name="file" type="file" class="form-control-file form-control">
        </div>
        <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
            <div class="">
                <button class="btn btn-primary submit" type="submit" id="submit">Upload</button>

                <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'CarePoint']) }}"
                    class="btn btn-secondary">
                    View Files
                </a>
            </div>
        </div>
    </form>
@else
    <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'CarePoint']) }}" class="btn btn-secondary">
        View Files
    </a>
@endif
