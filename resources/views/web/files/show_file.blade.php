@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('web.files.inc.show_file')
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

        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var machine_number = button.data('machine_number')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #machine_number').val(machine_number);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection
@endsection
