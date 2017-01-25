$(function () {
    $('.toggleForms').click(function () {
        $('#logInForm').toggle();
        $('#signUpForm').toggle();
    });

    $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss'
    });
});

