var signUp = {
    password: {},
    confirm_password: {},
    email: {},
    init: function () {
        $(document).on('click', '#sign_up_btn', function (e) {
            e.preventDefault();
            signUp.processSignUp();
        });
    },
    validatePassword: function () {
        if (!/^(?=.{8,32}$)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*/.test(signUp.password.val())) {
            signUp.password.addClass('invalid');
            Msg(signUp.password.data('error'));
            return false;
        }
        if (signUp.password.val() !== signUp.confirm_password.val()) {
            signUp.confirm_password.data('error', "The Passwords you Supplied Don't Match");
            signUp.confirm_password.addClass('invalid');
            Msg(signUp.confirm_password.data('error'));
            return false;
        }
        signUp.confirm_password.removeClass('invalid');
        return true;
    },
    validateEmail: function () {
        if (!/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(signUp.email.val())) {
            document.getElementById(signUp.email.prop('id')).setCustomValidity("Invalid Email");
            signUp.email.data('error', "Invalid Email Address");
            signUp.email.addClass('invalid');
            Msg(signUp.email.data('error'));
            return false;
        }
        signUp.email.removeClass('invalid');
        return true;
    },
    processSignUp: function () {
        signUp.password = $('#password');
        signUp.confirm_password = $("#confirm_password");
        signUp.email = $('#email');
        signUp.password.onchange = signUp.validatePassword;
        signUp.confirm_password.onkeyup = signUp.validatePassword;
        signUp.email.onchange = signUp.validateEmail;
        if (signUp.validatePassword() && signUp.validateEmail()) {
            $.ajax({
                url: '/api/sign-up',
                data: {
                    email: signUp.email.val(),
                    password: signUp.password.val(),
                    confirm_password: signUp.confirm_password.val()
                },
                dataType: 'json',
                type: 'post',
                success: function (xhr, stat) {
                    window.location.href = ('/create-profile');
                    return true;
                },
                error: function (xhr, stat) {
                    Msg(xhr.responseText.message);
                    return false;
                }
            });
        }
    }
};
$(document).ready(function () {
    signUp.init();
});