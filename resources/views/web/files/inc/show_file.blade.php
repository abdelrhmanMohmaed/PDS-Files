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
            @error('machine')
                <strong class="text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}
                </strong>
            @enderror
        </strong>
    </div>
    <div class="card-body">
        @include('inc.messages')

        <table id="table" class="table table-striped  text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Machine</th>
                    <th>Data Time</th>
                    <th>Created By</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            @foreach ($files as $item)
                <tbody>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ substr($item->file, 11) }}
                    </td>

                    <td>
                        {{ @$item->machine->number ?? 'N/A' }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y / H:i:s') }}
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        <a href="{{ route('file.download', ['id' => $item->id, 'name' => $modelName]) }}"
                            class="btn btn-sm btn-outline-info">
                            Download
                        </a>
                        @if (in_array(Auth::user()->role_id, [1, 2]))
                            @if (@$item->machine->number)
                                <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                                    data-bs-target="#EditModal" data-id={{ $item->id }}
                                    data-name={{ $modelName }}>
                                    Edit machine number
                                </button>
                            @endif

                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#DeleteModal" data-file_id={{ $item->id }}
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
                        <h5 class="modal-title " id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('file.update') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" class="form-control-file form-control">

                            <div class="form-group">
                                <input type="hidden" name="name" id="name"
                                    class="form-control-file form-control">
                            </div>

                            <label><strong>Machine Number :</strong></label>
                            <select name="machine" id="machine" class="form-select w-100"
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

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm text-white"
                                style="background-color: rgb(52, 58, 64);">
                                Save changes
                            </button>
                        </div>
                    </form>
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
                            Destroy File
                        </h5>
                    </div>

                    <form action="{{ route('file.delete', 'test') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="file_id" id="file_id">
                            <input type="hidden" name="name" id="name">
                            &#x2022; Are you sure you want to delete this File ? <br>
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
