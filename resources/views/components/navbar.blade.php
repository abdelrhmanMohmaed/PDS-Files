<div class="d-flex justify-content-start">
    <div class="col-md-2 justify-content-center align-items-center">
        <img class="img-fluid" src="{{ asset('web/img/samaya-logo1.jpg') }}" alt="" srcset=""
            style="height: 55px">
    </div>

    <ul class="nav ml-auto py-1">
        @auth
            <li class="form-inline ">
                <select id="search" name="search" class="px-5 js-example-placeholder-single js-states form-control mr-sm-2">
                    <option></option>
                    @foreach ($allParts as $part)
                        <option value="{{ $part->id }}">{{ $part->part_num }}</option>
                    @endforeach
                </select>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            @if (Auth::user()->role->name == 'superAdmin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashbourd/add-category') }}">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashbourd/change-password/') }}">Change password</a>
                </li>
            @endif
            <li class="nav-item">
                <a id="logout-link" class="nav-link" href="#">LogOut&nbsp;<i class="fas fa-sign-out-alt"></i></a>
            </li>
        @endauth
    </ul>
</div>
