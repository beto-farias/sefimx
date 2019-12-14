$(document).ready(function () {

    $(window).focus(formInit(200));

    function formInit(time) {
        setTimeout(function () {
            $('.login-form-wrapper').addClass('showLogin');
        }, time);
    }

});