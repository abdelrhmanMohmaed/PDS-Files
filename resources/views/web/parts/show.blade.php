@extends('layout')
@section('title')
    Parts |
    @foreach ($parts as $part)
        {{ $part->part_num }}
    @endforeach
@endsection

@section('main')
    <section id="bg2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <td>
                    </td>
                    @foreach ($parts as $part)
                        @php
                            $model = \App\Models\CarModel::where('id', $part->car_model_id)->first();
                            $company = \App\Models\Company::where('id', $model->company_id )->first();
                        @endphp
                        <input id="partId" type="hidden" name="partId" value="{{ $part->id }}">
                        <span>{{ $company->name }}</span> -
                        <span>{{ $model->name }}</span> -
                        <span>{{ $part->part_num }}</span>
                    @endforeach
                    <div class="card rounded-0 mt-3">
                        <div class="card-header">
                            @include('web.inc.messages')
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a href="#pds" id="pds-link" class="nav-link active font-weight-bold"
                                        data-toggle="tab">PDS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#work-instruction" id="work-link" class="nav-link   font-weight-bold"
                                        data-toggle="tab">Work
                                        Instruction</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pack-instruction" id="pack-link" class="nav-link   font-weight-bold"
                                        data-toggle="tab">Pack
                                        Instruction</a>
                                </li>
                            </ul>
                        </div>
                        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'superAdmin')
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- pds Tab Start -->
                                    <div class="tab-pane container active" id="pds">
                                        <div class="card-deck w-100">
                                            <form action="{{ url("store/pds/$part->id") }}" method="POST"
                                                class="w-100" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="pds-file">PDS File </label>
                                                    <input id="pds-file" name="pdsFile" type="file"
                                                        class="form-control-file form-control">
                                                </div>
                                                <div class="d-flex align-items-end flex-column bd-highlight mb-3 ">
                                                    <div class="">
                                                        <button class="btn btn-info mr-auto" type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- pds Tab End -->
                                    <!-- work-instruction Tab Content Start -->
                                    <div class="tab-pane container fade" id="work-instruction">
                                        <div class="card-deck w-100">
                                            <form action="{{ url("store/work/$part->id") }}" method="POST"
                                                class="w-100" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="work-file">Work
                                                        Instruction</label>
                                                    <input id="work-file" name="workFile" type="file"
                                                        class="form-control-file form-control">
                                                </div>
                                                <div class="d-flex align-items-end flex-column bd-highlight mb-3 ">
                                                    <div class="">
                                                        <button class="btn btn-info mr-auto" type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- work-instruction Tab Content End -->
                                    <!-- pack-instruction Tab Content start -->
                                    <div class="tab-pane container fade" id="pack-instruction">
                                        <div class="card-deck w-100">
                                            <form action="{{ url("store/pack/$part->id") }}" method="POST"
                                                class="w-100" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="pack-file">Pack Instruction</label>
                                                    <input name="packFile" type="file"
                                                        class="form-control-file form-control" id="pack-file">
                                                </div>
                                                <div class="d-flex align-items-end flex-column bd-highlight mb-3 ">
                                                    <div class="">
                                                        <button class="btn btn-info mr-auto" type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- pack-instruction Tab Content End -->
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <table id="table" class="table table-striped mt-5 text-center">
                    {{-- All Data by Ajax Request --}}
                </table>
            </div>
        </div>
        <a href="#bg2" class="back-home ">
            <i class="fa fa-chevron-up"></i>
        </a>
    </section>
@endsection
@section('script')
    <script src="{{ asset('web/js/Ajax/ajax-show.js') }}"></script>
@endsection
