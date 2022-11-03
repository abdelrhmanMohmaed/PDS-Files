<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        a:link,
        a:visited {
            background-color: white;
            color: black;
            border: 2px solid #96CDCD;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        a:hover,
        a:active {
            background-color: #96CDCD;
            color: white;
        }
    </style>
</head>

<body style="border: 1px solid #33A1C9;border-radius: 2px;">

    <div
        style=" background-color:#33A1C9;padding: 5px;text-align: center;font-size: 25px;color: white;box-sizing: border-box;">
        <h2>Hi, {{ $event->files->user->name }}</h2>
    </div>

    <div style="float: left;padding: 20px;width: 100%;height: 300px;text-align: left;box-sizing: border-box;">
        <ul style="padding:15px;">
            <h4>A New
                <span style="color:#33A1C9;">{{ Str::upper($event->modelName) }}</span>
                added By -
                <span style="color:#33A1C9;">{{ $event->files->user->name }}</span>
            </h4>

            <li>File Name:
                <span style="color:#33A1C9;">
                    {{ substr($event->files->file, 11) }}
                </span>
            </li>

            <li>Created at: <span style="color:#33A1C9;">
                    <i>{{ \Carbon\Carbon::parse($event->files->created_at)->format('d M, Y / H:i:s') }}</i>
                </span>
            </li>
            </ hr>
        </ul>
    </div>


    <div style="float: left;padding: 20px;width: 100%;height: 300px;text-align: center;box-sizing: border-box;">

        <p><a href="{{ url('/') }}">APP Link</a></p>

    </div>


    <div style="background-color:#33A1C9;padding: 10px;text-align: center;color: white;box-sizing: border-box;">
        <p>This is an automatic email, <i>By APP</i></p>
    </div>

</body>

</html>
