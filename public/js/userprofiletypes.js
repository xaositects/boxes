var userProfileTypes = {
    init: function () {
        siteAdmin.theme = $('#theme_div').val();
        $('#ept_btn').click(function () {
            siteAdmin.formDataUrl = '/api/userprofiletypes';
            siteAdmin.formTitle = 'User Profile Types';
            siteAdmin.formInfoType = 'User Profile Type';
            siteAdmin.formDataFields = {
                name: {
                    header: 'Name',
                    editable: true,
                    inputType: 'text',
                    pattern: '[a-zA-Z0-9_ \-]+',
                    required: true,
                    visible: true
                },
                rank: {
                    header: 'Rank',
                    editable: true,
                    inputType: 'number',
                    defaultVal: '++',
                    required: true,
                    visible: true
                },
                createdAt: {
                    header: 'Created At',
                    editable: false,
                    visible: true
                },
                updatedAt: {
                    header: 'Updated At',
                    editable: false,
                    visible: true
                }
            };
            siteAdmin.loadDataForm();
        });
    }
};
userProfileTypes.init();

