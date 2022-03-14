<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- meta token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="{{ asset('web/img/samaya-logo.jpg') }}" type="image/x-icon">
    <title>Moulding PDS - @yield('title')</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
    <!-- Font Awesome Icon -->
    <link rel=" stylesheet" href="{{ asset('web/css/fontawesome.all.css') }}" />

    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">


    @yield('style')

</head>

<body>
    {{-- start form hidden to can logOut in any page --}}
    <form id="logout-form" action="{{ url('/logout') }}" method="post" style="display: none;">
        @csrf
    </form>
    {{-- End form hidden to can logOut in any page --}}

    {{-- start share component navbar and img --}}
    <x-navbar></x-navbar>
    {{-- End share component navbar and img --}}

    {{-- start main in all pages --}}
    <div id="bg">
        @yield('main')
    </div>
    {{-- end main in all pages --}}


    {{-- jQ --}}
    <script src="{{ asset('web/js/jquery.min.js') }}"></script>
    {{-- popper --}}
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('web/js/main.js') }}"></script>

    @yield('script')
    <script>
        $(document).ready(function() {
            $(".js-example-placeholder-single").select2({
                // theme: "classic",
                placeholder: "Search P-Number",
                allowClear: true,
            });
            //start fun to can logOut in any page 
            $('#logout-link').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
            });
            //End fun to can log Out in any page
            // start ajax request search in any page
            $('#search').change(function() {
                //start chack in value not empty and take the companyId and token 
                if ($(this).val() != '') {
                    var partId = $(this).val();
                    // console.log(partId);
                    top.location.href = "/model/part-number/" + partId;
                };
                //end chack in value not empty 
            })
            // End ajax request search in any page
        });
    </script>
</body>

</html>
{{-- // $('#search').change(function() {
// var partId = $(this).val();
// //start chack in value not empty and take the companyId and token
// if ($(this).val() != '') {
// console.log(partId);
// top.location.href = "car-model/parts/" + partId;
// };
// //make link in controller due to href location not work in "car-model/parts/" + partId;
// });
// start ajax request to get items to cars by model Id
// $('#search').change(function() {
// //start chack in value not empty and take the companyId and token
// if ($(this).val() != '') {
// var partId = $(this).val();
// var _token = $('input[name="_token"]').val();
// // console.log(partId);
// // top.location.href = "car-model/parts/" + partId;
// };
// $.ajax({
// headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// },
// url: "search",
// method: "get",
// data: {
// partId: partId,
// _token: _token,
// },
// success: function(result) {
// // console.log(result);
// console.log(result);
// }
// });
// //end chack in value not empty
// }); --}}
