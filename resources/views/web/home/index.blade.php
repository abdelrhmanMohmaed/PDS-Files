@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Select :
                        </strong>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <strong>Company # :</strong>
                                    <select name="company" id="company"
                                        class="item-select js-example-basic-single form-select form-select-sm mt-2"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected>Open this select menu</option>
                                        @foreach ($companies as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('company')
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <strong>Model # :</strong>
                                    <select name="model" id="model"
                                        class="item-select js-example-basic-single form-select form-select-sm mt-2"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected>Open this select menu</option>
                                    </select>
                                </div>
                                @error('model')
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <strong>Part # :</strong>
                                    <select name="part" id="part"
                                        class="item-select js-example-basic-single form-select form-select-sm mt-2"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected>Open this select menu</option>
                                    </select>
                                </div>
                                @error('part')
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('script')
    <script>
        $('#company').change(function() {
            if ($(this).val() != '') {
                var companyId = $(this).val();
                var _token = $('input[name="_token"]').val();
            }
            modalLoader('POST', 'get/model', 'model', 'empty', 'empty', {
                companyId,
                _token
            })
            $('#model').focus();
        });

        $('#model').change(function() {
            if ($(this).val() != '') {
                var modelId = $(this).val();
                var _token = $('input[name="_token"]').val();
            }
            modalLoader('POST', 'get/part', 'part', 'empty', 'empty', {
                modelId,
                _token
            })
            $('#part').focus();
        });

        $('#part').change(function() {
            if ($(this).val() != '') {
                var partId = $(this).val();
            }
            top.location.href = '{{ url('') }}' + '/show/' + partId;
            for (var i = 0; i < $('.item-select').length; i++) {
                $('.item-select')[i].value = "";
            };
        });
    </script>
@endsection
@endsection
