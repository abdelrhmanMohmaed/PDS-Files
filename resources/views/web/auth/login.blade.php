@extends('layout')
@section('title')
    Sign In
@endsection
@section('main')
    <section id="bg2">
        <!-- Main content -->
        <div class="content d-flex justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        <h3 class="card-title">LogIn</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @include('web.inc.messages')

                    <form method="POST" action="{{ url('login') }}" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="seel_code" class="col-sm-2 col-form-label">Seel code</label>
                                <div class="col-sm-10">
                                    <input name="seel_code" type="number" class="form-control" id="seel_code"
                                        placeholder="Seel code" required>
                                    {{-- @error('seel_code')
                                        <span class="text-danger">
                                            {{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="pass"
                                        placeholder="Password" required>
                                    {{-- @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right mb-2">Sign in</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
