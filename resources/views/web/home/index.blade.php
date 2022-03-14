@extends('layout')
@section('title')
    Home Page
@endsection
@section('main')
    <!-- section home -->
    <section id="home" class="container py-5">
        {{-- start header in home page --}}
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center tx-dark w-100">
                <h1>Welcome To Moulding PDS - Files</h1>
            </div>
        </div>
        {{-- end header in home page --}}
        {{-- start to select option to choose campany and model and part-number --}}
        <div class="row justify-content-center align-items-center my-4">
            <div class="col-md-3">
                <label for="company" class="tx-dark">Company</label>
                <select class="custom-select" name="" id="company" required>
                    <option selected disabled value="">Select Company</option>
                    @foreach ($allCompany as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Select model by Ajax --}}
            <div class="col-md-3">
                <label for="model" class="tx-dark">Model</label>
                <select class="custom-select" name="" id="model" required>
                    <option selected disabled value="">Select Model</option>
                </select>
            </div>
            {{-- Select Part by Ajax --}}
            <div class="col-md-3">
                <label for="part_Num" class="tx-dark">Part Number</label>
                <select class="custom-select" name="" id="part_Num" required>
                    <option selected value="">Select P-Number</option>
                </select>
            </div>
        </div>
        {{-- End to select option to choose campany and model and part-number --}}
    </section>
@endsection
@section('script')
    {{-- script file to code ajax request --}}
    <script src="{{ asset('web/js/Ajax/ajax-home.js') }}"></script>
@endsection
