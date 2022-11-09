<div class="card">
    <div class="card-header bg-info">
        <strong>
            @if ($files)
                {{ $files->part->model->company->name }} -
                {{ $files->part->model->name }} -
                {{ $files->part->name }} -
                {{ @$modelName }}
            @else
                <strong>No files added</strong>
            @endif
        </strong>
    </div>
    <div class="card-body">
        <table id="table" class="table table-striped  text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Data Time</th>
                    <th>Created By</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($files)
                    <th scope="row">{{ $files->id }}</th>
                    <td>
                        {{ @$item->title }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($files->created_at)->format('d M, Y / H:i:s') }}
                    </td>
                    <td>
                        {{ $files->user->name }}
                    </td>
                    <td>
                        <a href="{{ route('video.watch', ['id' => $files->id, 'name' => $modelName]) }}"
                            class="btn btn-sm btn-outline-warning">
                            Watch
                        </a>

                        <a href="{{ route('video.Down', ['id' => $files->id, 'name' => $modelName]) }}"
                            class="btn btn-sm btn-outline-info">
                            Download
                        </a>
                    </td>
                @endif
            </tbody>
        </table>
    </div>
</div>
