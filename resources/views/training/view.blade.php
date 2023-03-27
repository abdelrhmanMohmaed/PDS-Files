@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header bg-info">
                            <strong>
                                Training :
                                {{ @$trainings[0]['training']['name'] }}
                            </strong>
                        </div>
                        <div class="card-body">
                            @include('inc.messages')

                            <table id="table" class="table table-striped  text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Video Name</th>
                                        <th>Data Time</th>
                                        <th>Created By</th>
                                        <th class="">Actions</th>
                                    </tr>
                                </thead>
                                @forelse ($trainings as $item)
                                    <tbody>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>
                                            {{ substr($item->file, 11) }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse(@$item->created_at)->format('d M, Y / H:i:s') }}
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
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#DeleteModal"
                                                    class="btn btn-danger" data-file_id={{ $item->id }}
                                                    data-name={{ $modelName }}>
                                                    Delete
                                                </button>
                                            @endif
                                        </td>
                                    </tbody>
                                @empty
                                    <h5 class="text-center">No Videos available</h5>
                                @endforelse

                            </table>

                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight">
                                    {{ $trainings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
