@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <video autoplay muted controls>

                        <source type="video/mp4"
                            src="{{ "http://10.107.32.26/injection/storage/app/videos/Video/$file->file" }}">
                    </video>

                    <h1></h1>



                </div>
            </div>
        </div>
    </div>
@endsection
