var stashItemTypes = {
    init: function () {
        siteAdmin.theme = $('#theme_div').val();
        $('#esit_btn').click(function () {
            siteAdmin.formDataUrl = '/api/stashitemtypes';
            siteAdmin.formTitle = 'Stash Item Types';
            siteAdmin.formInfoType = 'Stash Item Type';
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
stashItemTypes.init();

