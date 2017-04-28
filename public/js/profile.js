var manageProfile = {
    fname: {},
    lname: {},
    email: {},
    action:'post',
    init: function (action) {
        manageProfile.fname = $('#firstname');
        manageProfile.lname = $('#lastname');
        manageProfile.action = action;
        $(document).on('click', '#new_profile_btn', function (e) {
            e.preventDefault();
            if (manageProfile.validateName()) {
                manageProfile.processCreateProfile();
            }
        });
    },
    validateName: function () {
        if (!/^[a-zA-Z]+(([\'\,\.\-\ ][a-zA-Z])?[a-zA-Z]*)*$/.test(manageProfile.fname.val()) && !/^[a-zA-Z]+(([\'\,\.\-\ ][a-zA-Z])?[a-zA-Z]*)*$/.test(manageProfile.lname.val())) {
            manageProfile.fname.data('error', "First and Last Name can only contain letters and the following characters: ,.'");
            manageProfile.fname.addClass('invalid');
            Msg(manageProfile.fname.data('error'));
            return false;
        }
        if (manageProfile.fname.val().trim() === '' ||  manageProfile.lname.val().trim() === '') {
            manageProfile.fname.data('error', "First and Last Name are Required");
            manageProfile.fname.addClass('invalid');
            Msg(manageProfile.fname.data('error'));
            return false;
        }
        manageProfile.fname.removeClass('invalid');
        return true;
    },
    processCreateProfile: function () {

        $.ajax({
            url: '/api/userprofile',
            data: {
                firstname: manageProfile.fname.val(),
                lastname: manageProfile.lname.val()
            },
            dataType: 'json',
            type: manageProfile.action,
            success: function (xhr, stat) {
                Msg(xhr.message);
                window.location.href = '/profile';
            },
            error: function (xhr, stat) {
                Msg(xhr.responseText);
            }
        });
    }
};
$(document).ready(function () {
    manageProfile.init(action);
});