@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <video autoplay muted controls style="height: 750px;">
                        <source type="video/mp4" {{-- src={{"http://127.0.0.1:8000/storage/app/videos/Video/$file->file"}}> --}}
<<<<<<< HEAD
                            src="{{ "http://10.107.32.26/injection/storage/app/videos/$modelName/$file->file" }}">
                    </video> 
=======
                            src="{{ "http://127.0.0.1:8000/injection/storage/app/videos/$modelName/$file->file" }}">

                    </video>
                    @dump($modelName)
>>>>>>> 75b9220b29bde1aa8c9c706fc738f22b5a1d9f75
                </div>
            </div>
        </div>
    </div>
@endsection
