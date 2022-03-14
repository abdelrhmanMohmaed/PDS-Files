@extends('layout')
@section('title')
    Add Category
@endsection
@section('main')
    <section id="bg2">
        {{-- <div class="d-flex "> --}}
        <div class="row">
            <div class="col-md-5 py-3">
                <form action="{{ url('dashbourd/store-company') }}" method="post">
                    @csrf
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="companyName">Add Company</label>
                                <input name="companyName" type="text" class="form-control" id="companyName">
                            </div>
                            @error('companyName')
                                <span class="text-danger"> <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}</span><br>
                            @enderror

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div> 
        </div>
        {{--  --}}

        <div class="row w-100">
            <div class="col-md-6  ">
                <form action="{{ url('dashbourd/store-model') }}" method="post">
                    @csrf
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Add New Model</h5>
                            <div class="form-group">
                                <select class="custom-select" name="company" id="company">
                                    <option selected disabled value="">Select Company</option>
                                    @foreach ($allCompany as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                    <span class="text-danger"> <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}</span><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="modelName">Add Model</label>
                                <input name="model" type="text" class="form-control" id="modelName">
                            </div>
                            @error('model')
                                <span class="text-danger"> <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}</span><br>
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            {{--  --}}
             <div class="col-md-6 ">
                <form action="{{ url('dashbourd/store-model') }}" method="post">
                    @csrf
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Add New Model</h5>
                            <div class="form-group">
                                <select class="custom-select" name="company" id="company">
                                    <option selected disabled value="">Select Company</option>
                                    @foreach ($allCompany as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                    <span class="text-danger"> <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}</span><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="modelName">Add Model</label>
                                <input name="model" type="text" class="form-control" id="modelName">
                            </div>
                            @error('model')
                                <span class="text-danger"> <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}</span><br>
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </section>
@endsection
