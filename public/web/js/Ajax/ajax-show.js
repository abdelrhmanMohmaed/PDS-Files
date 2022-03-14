$(document).ready(function () {
    displayPds();
    $("#pds-link").click(function () {
        displayPds();
    });
    // start get all data pdsfiles 
    function displayPds() {
        var partId = $('#partId').val();
        var _token = $('input[name="_token"]').val();
        // console.log(partId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getData/pds",
            method: "post",
            data: {
                partId: partId,
                _token: _token,
            },
            success: function (result) {
                // console.log(result);
                $('#table').html(result);
            }
        });
    };
    // start get all data pdsfiles 
    // start get all data workfiles 
    $("#work-link").click(function (e) {
        e.preventDefault();
        var partId = $('#partId').val();
        var _token = $('input[name="_token"]').val();
        // console.log(partId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getData/work-instruction",
            method: "post",
            data: {
                partId: partId,
                _token: _token,
            },
            success: function (result) {
                // console.log(result);
                $('#table').html(result);
            }
        });
    })
    // end get all data workfiles 
    // start get all data packfiles 
    $("#pack-link").click(function (e) {
        e.preventDefault();
        var partId = $('#partId').val();
        var _token = $('input[name="_token"]').val();
        // console.log(partId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getData/pack-instruction",
            method: "post",
            data: {
                partId: partId,
                _token: _token,
            },
            success: function (result) {
                // console.log(result);
                $('#table').html(result);
            }
        });
    })
    // end get all data packfiles 
})




//     $('#store-file').click(function () {
//         if ($('#store-file-form')[0].checkValidity()) {
//             e.preventDefault();
//            let partId= $('#partId').val();
//             console.log(partId);
//         $.ajax({
//             url: "parts/store/"+ partId,
//             method: "POST",
//             // data: $("#edit-note-form").serialize() + "&action=update-note",
//         })
//     };
//     console.log(partId);

// })
//         //start chack in value not empty and take the companyId and token
//     //     if ($(this).val() != '') {
//     //         var companyId = $(this).val();
//     //         var _token = $('input[name="_token"]').val();
//     //     }
//     //     //end chack in value not empty and take the companyId and token
//     //     // the defualt option in model Not selected and items
//     //     $('#modelId').html('<option value="">Select Model</option>')
//     //     // start ajax request to get models to cars by companyId
//     //     $.ajax({
//     //         headers: {
//     //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //         },
//     //         url: "/car-models",
//     //         method: "POST",
//     //         data: {
//     //             companyId: companyId,
//     //             _token: _token,
//     //         },
//     //         success: function (result) {
//     //             // console.log(result);
//     //             $('#modelId').html(result);
//     //         }
//     //     });
//     // });











//     // End ajax request to get items to cars by model Id
//     // start ajax request to upload fille by id
//     // $('body').on('change', '#uploadBtn', function (e) {
//     //     // e.preventDefault();
//     //     var itemId = $(this).val();
//     //     console.log(itemId);
//     // })
//     // // End ajax request to upload fille by id
//     // $('body').on('click', '#select2-partId-container', function (e) {
//     //     //start chack in value not empty and take the companyId and token
//     //     // if ($(this).val() != '') {
//     //     // var companyId = $(this).val();
//     //     var _token = $('input[name="_token"]').val();
//     //     // }
//     //     //end chack in value not empty and take the companyId and token 