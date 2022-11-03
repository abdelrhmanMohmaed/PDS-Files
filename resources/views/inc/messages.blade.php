@if (session('success'))
    <div id="success-Alert" class="contact-form h-75">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        {{ Session::forget('success') }}
    </div>
@endif
{{-- @if ($errors->any())
    <div class="contact-form h-75">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p style="padding: 1px">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif --}}

@if (session('wrong'))
    <div class="contact-form h-75">
        <div class="alert alert-danger">
            {{ session('wrong') }}
        </div>
    </div>
@endif
