
$(document).ready(function(){

    $('.js-load').each(function () {
        $(this).on('click',function(){
            console.log("sadf");
            var uuid = $(this).data('uuid');
            $("#uploadform-uuid").val(uuid);
        });
       
    });
});