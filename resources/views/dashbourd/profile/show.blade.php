@extends('layout')
@section('title')
    Change Password
@endsection
@section('main')
    <section id="bg2">
        <!-- Main content -->
        <div class="content d-flex justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- start form start to change password  -->
                    <div class="card-body">
                        @include('web.inc.messages')
                        <form method="POST" action="{{ url('dashbourd/update-password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="pass">Current Password</label>
                                <input type="password" name="oldPassword" class="form-control" id="pass">
                            </div>
                            <div class="form-group">
                                <label for="newPass">New Password</label>
                                <input type="password" name="newPassword" class="form-control" id="newPass">
                            </div>
                            <div class="form-group">
                                <label for="pass-con">New Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="pass-con">
                            </div>
                            <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                        </form>
                        <!-- end form start to change password  -->
                    </div>
                </div>
            </div>
    </section>
@endsection
