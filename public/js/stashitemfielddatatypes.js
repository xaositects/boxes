var stashItemFieldDataTypes = {
    init: function () {
        siteAdmin.theme = $('#theme_div').val();
        $('#esit_btn').click(function () {
            siteAdmin.formDataUrl = '/api/stashitemfielddatatypes';
            siteAdmin.formTitle = 'Stash Field Data Types';
            siteAdmin.formInfoType = 'Stash Field Data Type';
            siteAdmin.formDataFields = {
                name: {
                    header: 'Name',
                    editable: true,
                    inputType: 'text',
                    pattern: '[a-zA-Z0-9_ \-]+',
                    required: true,
                    visible: true
                },
                validationFunction: {
                    header: 'Rank',
                    editable: true,
                    inputType: 'number',
                    defaultVal: '++',
                    required: true,
                    visible: true
                },
                outputFunction: {
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
stashItemTypes.init();

