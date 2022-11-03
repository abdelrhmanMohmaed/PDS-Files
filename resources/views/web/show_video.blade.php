@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        @if (in_array(Auth::user()->role_id, [1, 2]))
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
                            </strong>
                        @else
                            <strong>
                                @if ($files)
                                    {{ $files->part->model->company->name }} -
                                    {{ $files->part->model->name }} -
                                    {{ $files->part->name }} -
                                    {{ @$modelName }}
                                @else
                                    <strong>No files added</strong>
                                @endif
                            </strong>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped  text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>item Name</th>
                                    <th>Data Time</th>
                                    <th>Created By</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            @if (in_array(Auth::user()->role_id, [1, 2]))
                                @foreach ($files as $item)
                                    <tbody>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            {{ substr($item->file, 11) }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y / H:i:s') }}
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('video.watch', ['id' => $item->id, 'name' => $modelName]) }}"
                                                class="btn btn-sm btn-warning">
                                                Watch
                                            </a>
                                            <a href="{{ route('video.Down', ['id' => $item->id, 'name' => $modelName]) }}"
                                                class="btn btn-sm btn-info">
                                                Download
                                            </a>
                                            @if (in_array(Auth::user()->role_id, [1, 2]))
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteModal" class="btn btn-danger"
                                                    data-file_id={{ $item->id }} data-name={{ $modelName }}>
                                                    Delete
                                                </button>
                                            @endif
                                        </td>
                                    </tbody>
                                @endforeach
                            @else
                                <tbody>
                                    @if ($files)
                                        <th scope="row">{{ $files->id }}</th>
                                        <td>
                                            {{ substr($files->file, 11) }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($files->created_at)->format('d M, Y / H:i:s') }}
                                        </td>
                                        <td>
                                            {{ $files->user->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('video.watch', ['id' => $files->id, 'name' => $modelName]) }}"
                                                class="btn btn-sm btn-warning">
                                                Watch
                                            </a>
                                        
                                            <a href="{{ route('video.Down', ['id' => $files->id, 'name' => $modelName]) }}"
                                                class="btn btn-sm btn-info">
                                                Download
                                            </a>
                                        </td>
                                    @endif
                                </tbody>
                            @endif

                        </table>
                        @if (in_array(Auth::user()->role_id, [1, 2]))
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight">
                                    {{ $files->links() }}
                                </div>
                            </div>
                        @endif
                        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteModelLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('video.delete', 'test') }}" method="post">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header w-100 text-center text-danger">
                                            <h5 class="modal-title w-100 text-center text-danger" id="staticBackdropLabel">
                                                <strong> Delete File</strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body w-100 text-center">
                                            <input type="hidden" name="file_id" id="file_id">
                                            <input type="hidden" name="name" id="name">
                                            <h4 class="w-100 text-center text-danger">
                                                Are you sure want to delete this report ?
                                            </h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Yes
                                                Delete</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_id = button.data('file_id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #file_id').val(file_id);
            modal.find('.modal-body #name').val(name);
        });
    </script>
@endsection
@endsection
