var stashTypes = {
    init: function () {
        siteAdmin.theme = $('#theme_div').val();
        $('#est_btn').click(function () {
            siteAdmin.formDataUrl = '/api/stashtypes';
            siteAdmin.formTitle = 'Stash Types';
            siteAdmin.formInfoType = 'Stash Type';
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
stashTypes.init();

