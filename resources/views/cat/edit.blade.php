@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Categories
                            <button id="new-part" type="button" class="btn btn-sm btn-light float-end">
                                Parts
                            </button>
                            <button id="new-model" type="button" class="btn btn-sm btn-light float-end mx-1">
                                Models
                            </button>
                            <button id="new-company" type="button" class="btn btn-sm btn-light float-end mx-1">
                                Companies
                            </button>
                            <div class="float-left">
                                @error('name')
                                    <strong class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}
                                    </strong>
                                    <br>
                                @enderror
                            </div>
                        </strong>
                    </div>
                    <div id="store-model" class="card-body p-4">
                        @include('cat.inc.edit-model')
                    </div>
                    <div id="store-company" class="card-body p-4">
                        @include('cat.inc.edit-companies')
                    </div>
                    <div id="store-part" class="card-body p-4">
                        @include('inc.messages')
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <strong>Parts :</strong>
                                    <div class="form-group">
                                        <select name="parts" id="part"
                                            class="form-control-file form-control js-example-basic-single ">
                                            <option disabled selected>Select Part</option>
                                            @foreach ($parts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mt-4">
                                    <button type="button" class="btn btn-sm btn-outline-danger float-end mx-1"
                                        id="deletePart" data-bs-toggle="modal" data-bs-target="#DeleteModal_part">
                                        Delete
                                    </button>

                                    <button type="button" class="btn btn-sm btn-outline-dark float-end mx-1" id="editPart"
                                        data-bs-toggle="modal" data-bs-target="#EditModal_part">
                                        Edit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal  --}}
    <div class="modal fade" id="EditModal_part" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white " style="background-color: rgb(52, 58, 64);">
                    <h5 class="modal-title " id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.edit.part') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="part_id_edit" class="form-control-file form-control">

                        <label>
                            <strong>Part Number :</strong>
                        </label>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control-file form-control"
                                placeholder="Write new Part">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm text-white" style="background-color: rgb(52, 58, 64);">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- delete modal  --}}
    <div class="modal fade" id="DeleteModal_part" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white " style="background-color: rgb(255, 0, 0,0.7);">
                    <h5 class="modal-title " id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ route('category.delete.part', 'test') }}" method="post">
                    @csrf
                    <div class="modal-body w-100 text-center">
                        <input type="hidden" name="id" id="part_id_delete">
                        <h4 class="w-100 text-center text-danger">
                            Are you sure want to delete this Part ?
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm text-white" style="background-color: rgb(255, 0, 0,0.7);">
                            Yes, Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@section('script')
    <script>
        function Moodels(btn, modelEditId, modelDeleteId) {
            if ($('#' + btn).val() != '') {

                let _id = $('#' + btn).val();

                $('#' + modelEditId).val(_id);
                $('#' + modelDeleteId).val(_id);

            }
        }

        $('body').on('change', '#part', function() {

            Moodels('part', 'part_id_edit', 'part_id_delete')
        });

        $('body').on('change', '#model', function() {

            Moodels('model', 'model_id_edit', 'model_id_delete')
        });

        $('body').on('change', '#company', function() {

            Moodels('company', 'company_id_edit', 'company_id_delete')

        })
    </script>

    <script>
        function models(btn, hiden1, hiden2, show) {
            $('#' + btn).on('click', function() {
                $('#' + hiden1).hide();
                $('#' + hiden2).hide();
                $('#' + show).show();
            });
        }
        $('#store-model').hide();
        $('#store-company').hide();
        models('new-model', 'store-part', 'store-company', 'store-model')
        models('new-company', 'store-part', 'store-model', 'store-company')
        models('new-part', 'store-model', 'store-company', 'store-part')
    </script>
@endsection
@endsection
