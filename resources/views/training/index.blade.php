@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Add New Training
                            <button id="edit-btn" type="button" class="btn btn-sm btn-light float-end mx-1">
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-light float-end mx-1" data-bs-toggle="modal"
                                data-bs-target="#training">
                                Upload new Training Video
                            </button>
                        </strong>
                    </div>
                    <div class="card-body p-4">
                        @include('inc.messages')
                        <div class="row" id="store-training">
                            <form method="post" action="{{ route('training.store') }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Training Name :</strong>
                                        <input type="text" name="training_name" class="form-control"
                                            placeholder="Enter Training Name">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    @include('vendor.errors.message')
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- edit --}}
                        <div class="row" id="edit-training">
                            @include('inc.messages')
                            <div class="col-md-10">
                                <div class="form-group">
                                    <strong>Training :</strong>
                                    <div class="form-group">
                                        <select name="training" id="trainings" class="form-control-file form-control ">
                                            <option disabled selected>Select Training</option>
                                            @foreach ($trainings as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mt-4">
                                    <button type="button" disabled class="btn btn-sm btn-outline-danger float-end mx-1"
                                        id="deleteTraining" data-bs-toggle="modal" data-bs-target="#DeleteModal_training">
                                        Delete
                                    </button>

                                    <button type="button" disabled class="btn btn-sm btn-outline-dark float-end mx-1"
                                        id="editTraining" data-bs-toggle="modal" data-bs-target="#EditModal_training">
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

    <!-- create Training Modal -->
    <div class="modal fade" id="training" tabindex="-1" aria-labelledby="trainingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="trainingLabel">New Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('training.training_video.store', ['name' => 'TrainingVideo']) }}" method="POST"
                    class="w-100 modal-body" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Trainings:</label>
                        <select name="training" id="" class="form-control ">

                            <option disabled selected>Open selector</option>
                            @foreach ($trainings as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Video:</label>
                        <input type="file" name="video" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal  --}}
    <div class="modal fade" id="EditModal_training" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white " style="background-color: rgb(52, 58, 64);">
                    <h5 class="modal-title " id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('training.update') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="training_id_edit"
                            class="form-control-file form-control">

                        <label>
                            <strong>Edit Trainings :</strong>
                        </label>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control-file form-control"
                                placeholder="Write new Training name">
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
    <div class="modal fade" id="DeleteModal_training" tabindex="-1" aria-labelledby="deleteModelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white bg-danger">
                    <h5 class="modal-title" id="deleteSubTaskLabel">
                        <i class="fa-solid fa-trash-can"></i>
                        #Destroy
                    </h5>
                </div>

                <form action="{{ route('training.delete.training', 'test') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="training_id_delete">
                        &#x2022; Are you sure you want to delete this training ?<br>
                        <strong class="text-danger">You will delete all videos related to this training</strong> <br>
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
        $('#edit-training').hide();
        models('edit-btn', 'store-training', 'edit-training')

        removeDisabled('trainings', 'deleteTraining', 'editTraining')

        $('body').on('change', '#trainings', function() {
            Moodels('trainings', 'training_id_edit', 'training_id_delete')
        });

        function models(btn, hiden1, show) {
            $('#' + btn).on('click', function() {
                $('#' + hiden1).hide();
                $('#' + show).show();
            });
        }
    </script>
@endsection
@endsection
