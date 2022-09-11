@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mx-1 mt-1">
                <strong class="text-danger">
                    @foreach ($errors->all() as $message)
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    @endforeach
                </strong>
            </div>
        </div>
    </div>
@endif
