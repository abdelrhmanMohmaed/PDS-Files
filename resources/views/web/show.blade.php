@extends('layouts.app')

@section('content')
    <div class="container w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-12 w-100">
                <div class="card ">
                    <div class="card-header bg-info">
                        <strong>
                            {{ $part->model->company->name }} -
                            {{ $part->model->name }} -
                            {{ $part->name }}
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
                        @include('inc.messages')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PDS Files:</strong> </h5>
                                        <p class="card-text">

                                        </p>
                                        @if (in_array(Auth::user()->role_id, [1, 2]))
                                            <form
                                                action="{{ route('file.store', ['part' => $part->id, 'name' => 'Pdsfile']) }}"
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
                                        @else
                                            <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Pdsfile']) }}"
                                                class="btn btn-secondary">
                                                View Files
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Work Instruction:</strong> </h5>
                                        <p class="card-text">

                                        </p>
                                        @if (in_array(Auth::user()->role_id, [1, 2]))
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
                                        @else
                                            <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Workfile']) }}"
                                                class="btn btn-secondary">
                                                View Files
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PACK Instruction:</strong> </h5>
                                        <p class="card-text">

                                        </p>
                                        @if (in_array(Auth::user()->role_id, [1, 2]))
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
                                        @else
                                            <a href="{{ route('file.show', ['part' => $part->id, 'name' => 'Packfile']) }}"
                                                class="btn btn-secondary">
                                                View Files
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Videos:</strong> </h5>
                                        <p class="card-text">

                                        </p>
                                        @if (in_array(Auth::user()->role_id, [1]))
                                            <form
                                                action="{{ route('video.store', ['part' => $part->id, 'name' => 'Video']) }}"
                                                method="POST" class="w-100" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="video">Upload File :</label>
                                                    <input id="video" name="video" type="file"
                                                        class="form-control-file form-control">
                                                </div>
                                                <div class="d-flex align-items-end flex-column bd-highlight my-3 ">
                                                    <div class="">
                                                        <button class="btn btn-primary " type="submit">Upload</button>

                                                        <a href="{{ route('video.show', ['part' => $part->id, 'name' => 'Video']) }}"
                                                            class="btn btn-secondary">
                                                            View Videos
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <a href="{{ route('video.show', ['part' => $part->id, 'name' => 'Video']) }}"
                                                class="btn btn-secondary">
                                                View Videos
                                            </a>
                                        @endif
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
