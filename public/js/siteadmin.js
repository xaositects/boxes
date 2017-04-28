var siteAdmin = {
    theme: '',
    formDataUrl: '',
    formTitle: '',
    formInfoType: '',
    formDataFields: {},
    rowData: {},
    selectOpts: {},
    _add: function () {
        var data = {};
        $.each(siteAdmin.formDataFields, function (name, obj) {
            if (obj.editable === false || obj.visible === false) {
                return;
            }
            data[name] = $('#sa_add_' + name).val();
            if (obj.inputType === 'select') {
                data[name] = $('#sa_add_' + name).val();
            }
        });
        $.ajax({
            url: siteAdmin.formDataUrl,
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data, stat) {
                if (stat === 'success') {
                    Msg(siteAdmin.formInfoType + ' Created', 5000);
                    siteAdmin.loadDataForm();
                }
            },
            error: function (data, stat) {
                console.log(data);
                Msg('There was an error!');
            }
        });
    },
    _del: function (id) {
        window.event.preventDefault();
        $.ajax({
            url: siteAdmin.formDataUrl,
            data: {
                id: id
            },
            type: 'delete',
            dataType: 'json',
            success: function (data, stat) {
                if (stat === 'success') {
                    Msg(siteAdmin.formInfoType + ' Deleted', 5000);
                    siteAdmin.loadDataForm();
                }
            },
            error: function (data, stat) {
                console.log(data);
                Msg('There was an error!');
            }
        });
    },
    _upd: function (id) {
        var data = {};
        data['id'] = id;
        $.each(siteAdmin.formDataFields, function (name, obj) {
            if (obj.editable === false || obj.visible === false) {
                return;
            }
            data[name] = $('#sa_upd_' + name).val();
            if (obj.inputType === 'select') {
                data[name] = $('#sa_upd_' + name).val();
            }
        });
        $.ajax({
            url: siteAdmin.formDataUrl,
            data: data,
            type: 'put',
            dataType: 'json',
            success: function (data, stat) {
                if (stat === 'success') {
                    Msg(siteAdmin.formInfoType + ' Updated', 5000);
                    siteAdmin.loadDataForm();
                }
            },
            error: function (data, stat) {
                console.log(data);
                Msg('There was an error!');
            }
        });
    },
    _updRow: function (id) {
        var data = siteAdmin.rowData[id];
        var row = '';
        var btn = '<button class="btn waves waves-effect sa-upd-btn ' + siteAdmin.theme + '" onclick="siteAdmin._upd(\'' + id + '\');"><i class="material-icons left">save</i></button>';
        row += '<td>' + btn;
        $.each(siteAdmin.formDataFields, function (name, obj) {
            if (obj.editable === false || obj.visible === false) {
                row += '<td>';
                return;
            }
            row += '<td>' + ($.inArray(obj.inputType, ['text', 'number', 'email', 'hidden']) >= 0 ? '<input value="' + data[name] + '" type="' + obj.inputType + '" id="sa_upd_' + name + '" value="" pattern="' + obj.pattern + '"/>' : '');
            if (obj.inputType === 'select') {
                $.ajax({
                    url: obj.dataUrl,
                    type: 'get',
                    dataType: 'json',
                    success: function (gdata, stat) {
                        var arr = objToArr(gdata.data);
                        var selectOpts = [];
                        selectOpts[name] = [];
                        for (var i in arr) {
                            $('#sa_upd_' + name).append('<option ' + (data[name] === arr[i].id ? 'selected="true"' : '') + ' value="' + arr[i].id + '">' + arr[i].name);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                        Msg('There was a problem getting Stash Types');
                    }
                });
                row += '<select class="browser-default" id="sa_upd_' + name + '" name="sa_upd_' + name + '"></select>';
            }
        });
        $('#data_row_' + id).html(row);
    },
    loadDataForm: function () {
        $.ajax({
            url: siteAdmin.formDataUrl,
            type: 'get',
            dataType: 'json',
            success: function (data, stat) {
                if (stat === 'success') {
                    var sa_mdl = $('#sa_modal');
                    var table = '<table class="striped"><tr><th>';
                    $.each(siteAdmin.formDataFields, function (name, obj) {
                        table += '<th>' + obj.header;
                    });
                    var btn = '<button class="btn waves waves-effect sa-add-btn ' + siteAdmin.theme + '" onclick="siteAdmin._add();"><i class="material-icons left">add_box</i></button>';

                    table += '<tr><td>' + btn;
                    $.each(siteAdmin.formDataFields, function (name, obj) {
                        if (obj.editable === false || obj.visible === false) {
                            table += '<td>';
                            return;
                        }
                        table += '<td>' + ($.inArray(obj.inputType, ['text', 'number', 'email', 'hidden']) >= 0 ? '<input type="' + obj.inputType + '" id="sa_add_' + name + '" value="" pattern="' + obj.pattern + '"/>' : '');
                        if (obj.inputType === 'select') {
                            $.ajax({
                                url: obj.dataUrl,
                                type: 'get',
                                dataType: 'json',
                                success: function (data, stat) {
                                    var arr = objToArr(data.data);
                                    var selectOpts = [];
                                    selectOpts[name] = [];
                                    for (var i in arr) {
                                        $('#sa_add_' + name).append('<option value="' + arr[i].id + '">' + arr[i].name);
                                        selectOpts[name][arr[i].id] = arr[i].name;
                                    }
                                },
                                error: function (err) {
                                    console.log(err);
                                    Msg('There was a problem getting Stash Types');
                                }
                            });
                            table += '<select class="browser-default" id="sa_add_' + name + '" name="sa_add_' + name + '"></select>';
                        }
                    });
//                    table += '<td><input type="numeric" id="sa_add_rank" required value="' + (data.profiletypes[(data.profiletypes.length - 1)].rank + 1) + '" />';
                    data.data.forEach(function (datum) {
                        siteAdmin.rowData[datum.id] = datum;
                        var btn = '<button class="btn waves waves-effect sa-del-btn ' + siteAdmin.theme + '"  onclick="siteAdmin._del(\'' + datum.id + '\');"><i class="material-icons left">delete</i></button>';
                        table += '<tr class="data-row clk" id="data_row_' + datum.id + '" data-id="' + datum.id + '"><td>' + btn;
                        $.each(siteAdmin.formDataFields, function (name, obj) {
                            if (obj.inputType === 'select') {
                                var dat = '<td class="td-select" data-name="' + name + '" data-val="' + datum[name] + '" id="select_' + name + '_' + datum.id + '">';
                                table += dat;
                            } else {
                                table += '<td>' + datum[name];
                            }
                        });
                    });

                    table += '</table>';

                    $('.modal-content', sa_mdl).html(table);

                    $('#sa_modal_cncl', sa_mdl).click(function () {
                        sa_mdl.modal('close');
                    });
                    $('.data-row', sa_mdl).each(function () {
                        $(this).click(function () {
                            siteAdmin._updRow($(this).data('id'));
                            $(this).unbind('click');
                        });
                    });
                    sa_mdl.modal({ready:
                                function () {
                                    siteAdmin.loadSelectValues();
                                }
                    }).modal('open');

                    return true;
                } else {
                    Msg(JSON.parse(data).message, 5000);
                    return false;
                }
            },
            error: function (data, stat) {
                var msg = data.responseText;
                if (isJson(data.responseText).message) {
                    msg = JSON.parse(data.responseText).message;
                }
                Msg(JSON.parse(data.responseText).message, 5000);
                console.log(data);
            },
            complete: function(){
                siteAdmin.loadSelectValues();
            }
        });
    },
    loadForm: function () {
        $.ajax({
            url: siteAdmin.formDataUrl,
            type: 'get',
            dataType: 'text',
            success: function (data, stat) {
                if (stat === 'success') {
                    var sa_mdl = $('#sa_modal');
                    $('.modal-content', sa_mdl).html(data);
                    $('#sa_modal_cncl', sa_mdl).click(function () {
                        sa_mdl.modal('close');
                    });
                    sa_mdl.modal().modal('open');
                    return true;
                } else {
                    Msg(JSON.parse(data).message, 5000);
                    return false;
                }
            },
            error: function (data, stat) {
                var msg = data.responseText;
                if (isJson(data.responseText).message) {
                    msg = JSON.parse(data.responseText).message;
                }
                Msg(JSON.parse(data.responseText).message, 5000);
                console.log(data);
            }
        });
    },
    loadSelectValues: function () {
        $.each(siteAdmin.formDataFields, function (name, obj) {
            if (obj.editable === false || obj.visible === false) {
                return;
            }
            if (obj.inputType === 'select') {
                $.ajax({
                    url: obj.dataUrl,
                    type: 'get',
                    dataType: 'json',
                    success: function (gdata, stat) {
                        var arr = objToArr(gdata.data);
                        siteAdmin.selectOpts = {};
                        siteAdmin.selectOpts[name] = {};
                        for (var i in arr) {
                            siteAdmin.selectOpts[name][arr[i].id] = arr[i].name;
                        }
                    },
                    error: function (err) {
                        console.log(err);
                        Msg('There was a problem getting Stash Types');
                    },
                    complete: function () {
                        $('.td-select').each(function () {
                            var thisid = $(this).prop('id');
                            var thisname = $(this).data('name');
                            var thisval = $(this).data('val');
                            if (typeof siteAdmin.selectOpts[thisname] !== 'undefined') {
                                $('#' + thisid).html(siteAdmin.selectOpts[thisname][thisval]);
                            }
                        });
                    }
                });
            }
        });
    }
};


