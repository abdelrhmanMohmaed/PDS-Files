<div class="card">
    <div class="card-header bg-info">
        <strong>
            @if (count($files) > 0)
                @php
                    $file = $files[0]['part'];
                @endphp
                {{ $file['model']['company']['name'] }} -
                {{ $file['model']['name'] }} -
                {{ $file['name'] }} -
                {{ $modelName }}
            @else
                <strong>No files added</strong>
            @endif
            @error('title')
                <br>
                <strong class="text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}
                </strong>
            @enderror
        </strong>
    </div>
    <div class="card-body">
        <table id="table" class="table table-striped  text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Data Time</th>
                    <th>Created By</th>
                    <th class="">Actions</th>
                </tr>
            </thead>

            @foreach ($files as $item)
                <tbody>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ @$item->title }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y / H:i:s') }}
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        <a href="{{ route('video.watch', ['id' => $item->id, 'name' => $modelName]) }}"
                            class="btn btn-sm btn-outline-warning">
                            Watch
                        </a>
                        <a href="{{ route('video.Down', ['id' => $item->id, 'name' => $modelName]) }}"
                            class="btn btn-sm btn-outline-info">
                            Download
                        </a>
                        @if (in_array(Auth::user()->role_id, [1, 2]))
                            <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                                data-bs-target="#EditModal" class="btn btn-danger" data-file_id={{ $item->id }}
                                data-name={{ $modelName }}>
                                Edit Title
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#DeleteModal" class="btn btn-danger" data-file_id={{ $item->id }}
                                data-name={{ $modelName }}>
                                Delete
                            </button>
                        @endif
                    </td>
                </tbody>
            @endforeach
        </table>

        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                {{ $files->links() }}
            </div>
        </div>

        {{-- edit modal  --}}
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-white " style="background-color: rgb(52, 58, 64);">
                        <h5 class="modal-title " id="exampleModalLabel">Edit Title</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('video.update', 'test') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="file_id" id="file_id">
                            <input type="hidden" name="name" id="name">
                            <label>
                                <strong>Title :</strong>
                            </label>

                            <div class="form-group">
                                <input type="text" name="title" class="form-control-file form-control"
                                    placeholder="Write new Title">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm text-white"
                                style="background-color: rgb(52, 58, 64);">
                                Save changes
                            </button>
                        </div>
                    </form>
                    {{-- <form action="{{ route('video.update') }}" method="post" autocomplete="off">
                        @csrf
                        
                    </form> --}}
                </div>
            </div>
        </div>

        {{-- delete modal  --}}
        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white bg-danger">
                        <h5 class="modal-title" id="deleteSubTaskLabel">
                            <i class="fa-solid fa-trash-can"></i>
                            #Destroy Video
                        </h5>
                    </div>

                    <form action="{{ route('video.delete', 'test') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="file_id" id="file_id">
                            <input type="hidden" name="name" id="name">
                            &#x2022; Are you sure you want to delete this Video ? <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm text-white"
                                    style="background-color: rgb(255, 0, 0,0.7);">
                                    Yes, Delete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
