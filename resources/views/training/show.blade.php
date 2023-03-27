@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Select the training you need :
                        </strong>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <strong>Training # :</strong>
                                    <select name="training" id="training"
                                        class="item-select js-example-basic-single form-select form-select-sm mt-2"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected>Open this select menu</option>
                                        @foreach ($trainings as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('training')
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
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
        $('#training').change(function() {
            if ($(this).val() != '') {
                var trainingId = $(this).val();
            }
            top.location.href = '{{ url('') }}' + '/training/show/' + trainingId;
            for (var i = 0; i < $('.item-select').length; i++) {
                $('.item-select')[i].value = "";
            };
        });
    </script>
@endsection
@endsection
