@extends('layouts.app')

@section('content')
    <div class="container-fluid w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-12 w-100">
                <div class="card">
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
                                <br>
                            @enderror
                            @error('machine_id')
                                <strong class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}
                                </strong>
                                <br>
                            @enderror
                            @error('title')
                                <strong class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}
                                </strong>
                                <br>
                            @enderror
                            @error('video')
                                <strong class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        @include('inc.messages')
                        {{-- loader --}}
                        <div class="row" id="loader" style="display: none">
                            <div class="col-md-12">
                                <div class="card">
                                    <div id="loaderGif" class="card-body text-center">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="store_production">

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PDS Files:</strong> </h5>
                                        <p class="card-text"></p>

                                        {{-- start include store pds --}}
                                        @include('web.files.inc.production.store.store_pds')
                                        {{-- end include store pds --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Work Instruction:</strong> </h5>
                                        <p class="card-text">
                                        </p>

                                        {{-- start include store work --}}
                                        @include('web.files.inc.production.store.store_work')
                                        {{-- end include store work --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>PACK Instruction:</strong> </h5>
                                        <p class="card-text">
                                        </p>

                                        {{-- start include store pack --}}
                                        @include('web.files.inc.production.store.store_pack')
                                        {{-- end include store pack --}}

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Videos:</strong> </h5>
                                        <p class="card-text">
                                        </p>
                                        {{-- start include store video --}}
                                        @include('web.files.inc.production.store.store_video')
                                        {{-- end include store video --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 w-100 mt-5" id="store_quality">
                <div class="card">
                    <div class="card-header bg-success">
                        <strong>
                            Quality Files
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>َQCP:</strong> </h5>
                                        <p class="card-text"></p>

                                        {{-- start include store store_qcp --}}
                                        @include('web.files.inc.quality.store.store_qcp')
                                        {{-- end include store store_qcp --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Care Point:</strong> </h5>
                                        <p class="card-text">
                                        </p>

                                        {{-- start include store Care Point --}}
                                        @include('web.files.inc.quality.store.store_care_point')
                                        {{-- end include store Care Point --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>CC Measurement Method:</strong> </h5>
                                        <p class="card-text">
                                        </p>

                                        {{-- start include store cc --}}
                                        @include('web.files.inc.quality.store.store_cc')
                                        {{-- end include store cc --}}

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Gauges usage method:</strong> </h5>
                                        <p class="card-text">
                                        </p>
                                        {{-- start include store store_gauges --}}
                                        @include('web.files.inc.quality.store.store_gauges')
                                        {{-- end include store store_gauges --}}
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
