$(document).ready(function () {
    // start ajax request to get models to cars by companyId
    $('#company').change(function () {
        //start chack in value not empty and take the companyId and token 
        if ($(this).val() != '') {
            var companyId = $(this).val();
            var _token = $('input[name="_token"]').val();
        }
        //end chack in value not empty and take the companyId and token 
        // the defualt option in model Not selected and items
        $('#model').html('<option value="">Select Model</option>')
        // start ajax request to get models to cars by companyId
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "get-car/model",
            method: "POST",
            data: {
                companyId: companyId,
                _token: _token,
            },
            success: function (result) {
                // console.log(result);
                $('#model').html(result);
            }
        });
    });
    // End ajax request to get models to cars by companyId

    // start ajax request to get model to cars by model Id
    $('#model').change(function () {
        //start chack in value not empty and take the companyId and token 
        if ($(this).val() != '') {
            var modelId = $(this).val();
            var _token = $('input[name="_token"]').val();
        }
        //end chack in value not empty and take the companyId and token 
        // start ajax request to get models to cars by companyId
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "model/part-number",
            method: "POST",
            data: {
                modelId: modelId,
                _token: _token,
            },
            success: function (result) {
                // console.log(result);
                $('#part_Num').html(result);
            }
        });
        // End ajax request to get models to cars by companyId
    });
    // End ajax request to get model to cars by model Id

    // start ajax request to get part_Num to cars by model Id
    $('#part_Num').change(function () {
        //start chack in value not empty and take the companyId and token 
        if ($(this).val() != '') {
            var partId = $(this).val();
            var _token = $('input[name="_token"]').val();
            // console.log(partId);
            top.location.href = "model/part-number/" + partId;
            $('#company').html('<option value="">Select Company</option>');
            $('#model').html('<option value="">Select Model</option>');
            $('#part_Num').html('<option value="">Select P-Number</option>');
        };
        //end chack in value not empty 
    })
    // End ajax request to get part_Num to cars by model Id\
})