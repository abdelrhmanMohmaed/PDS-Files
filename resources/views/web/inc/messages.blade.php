@if (session('success'))
    <div id="success-Alert" class="contact-form h-75 pt-3">
        <div class="alert alert-success text-center">
            <p style="padding: 7px"> {{ session('success') }}</p>
        </div>
    </div>
    {{ Session::forget('success')}}
@endif
@if ($errors->any())
    <div class="contact-form h-75">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p style="padding: 7px">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
@if (session('error'))
    <div id="danger-Alert" class="contact-form h-75 pt-3">
        <div class="alert alert-danger text-center">
            <p style="padding: 7px"> {{ session('error') }}</p>
        </div>
    </div>
@endif
