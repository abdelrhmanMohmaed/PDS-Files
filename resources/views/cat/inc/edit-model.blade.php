<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <strong>Models :</strong>
            <div class="form-group">
                <select name="models" id="model" class="form-control-file form-control ">
                    <option disabled selected>Select Model</option>
                    @foreach ($models as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="mt-4">
            <button type="button" class="btn btn-sm btn-outline-danger float-end mx-1" id="deleteModel"
                data-bs-toggle="modal" data-bs-target="#DeleteModal_model">
                Delete
            </button>

            <button type="button" class="btn btn-sm btn-outline-dark float-end mx-1" id="editModel"
                data-bs-toggle="modal" data-bs-target="#EditModal_model">
                Edit
            </button>

        </div>
    </div>
</div>

{{-- edit modal  --}}
<div class="modal fade" id="EditModal_model" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white " style="background-color: rgb(52, 58, 64);">
                <h5 class="modal-title " id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.edit.model') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="model_id_edit" class="form-control-file form-control">

                    <label>
                        <strong>Models :</strong>
                    </label>

                    <div class="form-group">
                        <input type="text" name="name" class="form-control-file form-control"
                            placeholder="Write new Model">
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
<div class="modal fade" id="DeleteModal_model" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white " style="background-color: rgb(255, 0, 0,0.7);">
                <h5 class="modal-title " id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="{{ route('category.delete.model', 'test') }}" method="post">
                @csrf
                <div class="modal-body w-100 text-center">
                    <input type="hidden" name="id" id="model_id_delete">
                    <h4 class="w-100 text-center text-danger">
                        Are you sure want to delete this Model ?
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
