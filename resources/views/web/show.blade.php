@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            {{ $part->model->company->name }} -
                            {{ $part->model->name }} -
                            {{ $part->part_num }}
                        </strong>
                        <div class="float-left">
                            @error('file')
                                <strong class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PDS :</strong> </h5>
                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up
                                            the bulk of the card's content.
                                        </p>
                                        <form action="{{ route('file.store', ['part' => $part->id, 'name' => 'Pdsfile']) }}"
                                            method="POST" class="w-100" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="pds-file">Upload File :</label>
                                                <input id="pds-file" name="file" type="file"
                                                    class="form-control-file form-control">
                                            </div>
                                            <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
                                                <div class="">
                                                    <button class="btn btn-primary " type="submit">Upload</button>

                                                    <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Pdsfile']) }}"
                                                        class="btn btn-secondary">
                                                        View Files
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>WORK :</strong> </h5>
                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up
                                            the bulk of the card's content.
                                        </p>
                                        <form
                                            action="{{ route('file.store', ['part' => $part->id, 'name' => 'Workfile']) }}"
                                            method="POST" class="w-100" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="work_file">Upload File :</label>
                                                <input id="work_file" name="file" type="file"
                                                    class="form-control-file form-control">
                                            </div>
                                            <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
                                                <div class="">
                                                    <button class="btn btn-primary " type="submit">Upload</button>

                                                    <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Workfile']) }}"
                                                        class="btn btn-secondary">
                                                        View Files
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PACK :</strong> </h5>
                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up
                                            the bulk of the card's content.
                                        </p>
                                        <form
                                            action="{{ route('file.store', ['part' => $part->id, 'name' => 'Packfile']) }}"
                                            method="POST" class="w-100" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="pds-file">Upload File :</label>
                                                <input id="pds-file" name="file" type="file"
                                                    class="form-control-file form-control">
                                            </div>
                                            <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
                                                <div class="">
                                                    <button class="btn btn-primary " type="submit">Upload</button>

                                                    <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Packfile']) }}"
                                                        class="btn btn-secondary">
                                                        View Files
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
