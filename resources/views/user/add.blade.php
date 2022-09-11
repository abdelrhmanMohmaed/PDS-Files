@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Add User
                        </strong>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <form method="post" action="{{ route('user.store') }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter name">
                                        @error('name')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="exampleInputPassword1" placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password"
                                            placeholder="Password Confirm">
                                        @error('password_confirmation')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if (Auth::user()->role_id == 1)
                                    <label for="password-confirm">Roles</label>
                                    <select name="role_id" id="role"
                                        class="item-select js-example-placeholder-single form-select form-select-sm mt-2"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected>Open this select menu</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
