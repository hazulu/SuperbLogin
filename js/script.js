function openLogin() {
    $('.pOuter').animate({
        height: '100%'
    }, 300, "easeOutBack", function () {});
    $('.pInner').animate({
        margin: '0px auto auto'
    }, 300, 'easeOutBack', function () {
        $('#exposeMask').animate({
            opacity: '.6'
        }, 300, 'easeOutBack', function () {});
        $('#exposeMask').css({
            'display': 'block'
        });
    });
}

function closeLogin() {
    $('.pOuter').animate({
        height: '0px'
    }, 300, "easeOutBack", function () {});
    $('.pInner').animate({
        margin: '-215px auto auto'
    }, 300, 'easeOutBack', function () {});
    $('#exposeMask').animate({
        opacity: '.0'
    }, 300, 'easeOutBack', function () {
        $('#exposeMask').css({
            'display': 'none'
        });
    });
}

function checkIfEmailInString(text) {
    var re = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
    return re.test(text);
}

jQuery(function ($) {

    $(document).ready(function () {
        $('a.SignInPopup').removeClass('SignInPopup').addClass('SignInSlideDown');
        $('#ctrl_not_registered').prop('disabled', true);

        $("a.SignInSlideDown").click(function (event) {
            event.preventDefault();
        });

        $(".SignInSlideDown").click(function () {
            openLogin();
            
            $("html, body").animate({
                scrollTop: 0
            }, 300);
            
            $('#Form_Email').focus();
        });

        $('input[type=radio][name=register]').click(function () {
            if ($('#ctrl_not_registered').is(':checked')) {
                $('#Form_Password').prop('disabled', true);
                $('#Form_Password').addClass('disabled');
                $('#Form_Password').val('');
                $('.CheckBoxLabel').hide();
                $('#Form_SignIn').prop('value', 'Sign Up');
            }

            if ($('#ctrl_registered').is(':checked')) {
                $('#Form_Password').prop('disabled', false);
                $('#Form_Password').removeClass('disabled');
                $('.CheckBoxLabel').show();
                $('#Form_SignIn').prop('value', 'Sign In');
            }
        });

        $("#Form_SignIn").click(function (event) {
            if ($('#ctrl_not_registered').is(':checked')) {
                var name = $('#loginPanel #Form_Email').val();
                event.preventDefault();
                $("#Body").load(gdn.url('/entry/register&DeliveryType=VIEW'), function () {
                    if (checkIfEmailInString(name)) {
                        $('#Body #Form_Email').val(name);
                    } else {
                        $('#Body #Form_Name').val(name);
                    }

                    $("#Body").addClass('Register');
                });
                closeLogin();
            } else {
                closeLogin();
            }
        });

    });

    $("#exposeMask").click(function () {
        closeLogin();
    });

});