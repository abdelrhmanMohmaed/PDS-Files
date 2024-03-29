<div class="card-body p-4">
    <div class="row">
        <form method="post" action="{{ route('category.store.model') }}">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Companies # :</strong>
                    <select name="companies" id="companies" class="item-select form-select form-select-sm "
                        aria-label=".form-select-sm example">
                        <option disabled selected>Open this select menu</option>
                        @foreach ($companies as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Model Name :</strong>
                    <input type="text" name="model" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter Model">
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
