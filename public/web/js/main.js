$("#success-Alert").fadeOut(2300);
// 
$('#store-btn').click(function (e) {
    e.preventDefault();
    $('#store-form').submit();
});

// delete form submit 
$('#delete-btn').click(function (e) {
    e.preventDefault();
    $('#delete-form').submit();
});

// validtion to alert delete and select checked or no
$('body').on('click', '#delete', function (e) {
    if (!$('#deleteFile1').is(":checked") && !$('#deleteFile2').is(":checked") && !$('#deleteFile3').is(":checked")) {
        $('#valiDelete').html('<div class="text-center m-4"><strong>You should select at least one file  to deleted</strong></div>')
        $('#vale').hide()
    }else{
        $('#valiDelete').hide()
        $('#vale').show()

    }
})
// 
window.addEventListener('scroll',function () {
    if (this.window.scrollY>0) {
        $('.back-home').fadeIn(350)
    }else{
        $('.back-home').fadeOut(350)
    }
})