@if (in_array(Auth::user()->role_id, [1, 2]))
    <form action="{{ route('video.store', ['part' => $part->id, 'name' => 'Gauges']) }}" method="POST" class="w-100"
        enctype="multipart/form-data">
        @csrf
        <label for="title">Title :</label>
        <input id="title" name="title" type="text" class="form-control-file form-control" placeholder="Enter title">
        <div class="form-group">
            <label for="video">Upload Video :</label>
            <input id="video" name="video" type="file" class="form-control-file form-control">
        </div>
        <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
            <div class="">
                <button class="btn btn-primary submit" type="submit" id="submit">Upload</button>

                <a href="{{ route('video.show', ['part' => $part->id, 'name' => 'Gauges']) }}" class="btn btn-secondary">
                    View Videos
                </a>
            </div>
        </div>
    </form>
@else
    <a href="{{ route('video.show', ['part' => $part->id, 'name' => 'Gauges']) }}" class="btn btn-secondary">
        View Videos
    </a>
@endif
