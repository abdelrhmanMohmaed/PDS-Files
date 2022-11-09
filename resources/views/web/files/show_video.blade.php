@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (in_array(Auth::user()->role_id, [1, 2]))
                        @include('web.files.inc.show_video')
                    @else
                        @include('web.files.inc.show_video_user')
                    @endif
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_id = button.data('file_id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #file_id').val(file_id);
            modal.find('.modal-body #name').val(name);
        });
    </script>
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
