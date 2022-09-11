@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Add New Categories
                            <button id="new-part" type="button" class="btn btn-sm btn-light float-end">
                                Add Part
                            </button>
                            <button id="new-model" type="button" class="btn btn-sm btn-light float-end mx-1">
                                Add Model
                            </button>
                            <button id="new-company" type="button" class="btn btn-sm btn-light float-end mx-1">
                                Add company
                            </button>
                        </strong>
                    </div>
                    <div id="store-model">
                        @include('cat.add-model')
                    </div>
                    <div id="store-part">
                        @include('cat.add-part')
                    </div>
                    <div id="store-company" class="card-body p-4">
                        <div class="row">
                            <form method="post" action="{{ route('category.store.company') }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Company Name :</strong>
                                        <input type="text" name="company" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter Company">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    @include('vendor.errors.message')
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('script')
    <script>
        $('#com').change(function() {
            if ($(this).val() != '') {
                var companyId = $(this).val();
                var _token = $('input[name="_token"]').val();
            }
            modalLoader('POST', 'get/model', 'mod', 'empty', 'empty', {
                companyId,
                _token
            })
            $('#mod').focus();
        });

        $('#mod').change(function() {
            if ($(this).val() != '') {
                var modelId = $(this).val();
                var _token = $('input[name="_token"]').val();
            }
            modalLoader('POST', 'get/part', 'part_num', 'empty', 'empty', {
                modelId,
                _token
            })
            $('#part_num').focus();
        });
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
        $('#store-part').hide();
        models('new-model', 'store-company', 'store-part', 'store-model')
        models('new-part', 'store-company', 'store-model', 'store-part')
        models('new-company', 'store-model', 'store-part', 'store-company')
    </script>
@endsection
@endsection
