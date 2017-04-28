var stashItemAvailFields = {
    init: function () {
        siteAdmin.theme = $('#theme_div').val();
        $('#esidf_btn').click(function () {
            siteAdmin.formDataUrl = '/api/stashitemavailfields';
            siteAdmin.formTitle = 'Stash Item Fields';
            siteAdmin.formInfoType = 'Stash Item Fields';
            siteAdmin.formDataFields = {
                name: {
                    header: 'Name',
                    editable: true,
                    inputType: 'text',
                    pattern: '[a-zA-Z0-9_ \-]+',
                    required: true,
                    visible: true
                },
                stashitemfielddatatypeId: {
                    header: 'Data Type',
                    editable: true,
                    inputType: 'select',
                    required: true,
                    visible: true,
                    dataUrl: '/api/stashitemfielddatatypes'
                },
                stashtypeId: {
                    header: 'Stash Type',
                    editable: true,
                    inputType: 'select',
                    required: true,
                    visible: true,
                    dataUrl: '/api/stashtypes'
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
stashItemAvailFields.init();

