$('#nstash_btn').click(function () {
    $('#nstash_modal').modal().modal('open');
});
$('#nstash_sbmt').click(function () {
    var close = true;
    $.ajax({
        url: '/api/stash',
        data: {
            name: $('form#nstash_form #stash_name').val(),
            description: $('form#nstash_form #stash_desc').val(),
            stashtypeId: $('form#nstash_form #stash_type').val()
        },
        type: 'post',
        dataType: 'text',
        success: function (data, stat) {
            if (stat === 'success') {
                window.location.reload();
                return true;
            } else {
                Materialize.toast(JSON.parse(data).message, 5000);
                return false;
            }
        },
        error: function (data, stat, msg) {
            Materialize.toast(JSON.parse(data.responseText).message, 5000);
            console.log(data);
        }
    });
    if ($('#ncol_form.form .ui.warning.message')) {
        close = false;
    }
    return close;
});
$('#nstash_cncl').click(function () {
    $('#nstash_modal').modal('close');
});
$('#up_sbmt').click(function () {
    $('#up_form').submit();
});
$('#sfu_sbmt').click(function () {
    $('#sfu_form').submit();
});
$('.ui.file.input').find('input:text, .ui.button').on('click', function (e) {
    $(e.target).parent().find('input:file').click();
    $('.progress-bar').text('0%');
    $('.progress-bar').width('0%');
});
$('input:file', '.ui.file.input').on('change', function (e) {
    var file = $(e.target);
    var name = '';

    for (var i = 0; i < e.target.files.length; i++) {
        name += e.target.files[i].name + ', ';
    }
    name = name.replace(/,\s*$/, '');
    $('input:text', file.parent()).val(name);
});
$('img').on('error', function () {
    $(this).attr('src', '/images/noimage.png');
});
$('#nsitem_btn').click(function () {
    openNewStashItemModal({modalId: '#nsitem_modal'});
});
var openNewStashItemModal = function (obj) {
    $(obj.modalId).modal().modal('open');
    $('#nsitem_cncl').click(function () {
        $(obj.modalId).modal('close');
    });
    $('#nsitem_sbmt').click(function () {
        $.ajax({
            url: '/stashitem',
            data: {
                stashId: $('form#nsitem_form #stashid').val(),
                name: $('form#nsitem_form #nsitem_name').val(),
                description: $('form#nsitem_form #nsitem_desc').val(),
                stashitemtypeId: $('form#nsitem_form #nsitem_type').val(),
                rank: $('form#nsitem_form #rank').val()
            },
            type: 'post',
            dataType: 'json',
            success: function (data, stat) {
                if (stat === 'success') {
                    window.location.reload();
                    return true;
                } else {
                    Materialize.toast(JSON.parse(data).message, 5000);
                    return false;
                }
            },
            error: function (data, stat) {
                var msg = data.responseText;
                if (isJson(data.responseText).message) {
                    msg = JSON.parse(data.responseText).message;
                }
                Materialize.toast(JSON.parse(data.responseText).message, 5000);
                console.log(data);
            }
        });
    });
};
$('li.stash').each(function () {
    $(this).click(function () {
        if (typeof $(this).data('stashid') !== 'undefined') {
            document.location = '/stash/' + parseInt($(this).data('stashid'));
        } else {
            Materialize.toast('Stash not Found.');
        }
    });
});
$('div.item-image-col').each(function () {
    $(this).click(function () {
        if (typeof $(this).data('itemid') !== 'undefined') {
            $.ajax({
                url: '/stashitem/' + $(this).data('itemid'),
                type: 'get',
                dataType: 'text',
                success: function (data, stat) {
                    if (stat === 'success') {
                        $('#item_modal').html(data);
                        $('#item_modal').modal().modal('open');
                        return true;
                    } else {
                        Materialize.toast(JSON.parse(data).message, 5000);
                        return false;
                    }
                },
                error: function (data, stat) {
                    var msg = data.responseText;
                    if (isJson(data.responseText).message) {
                        msg = JSON.parse(data.responseText).message;
                    }
                    Materialize.toast(JSON.parse(data.responseText).message, 5000);
                    console.log(data);
                }
            });
            
        } else {
            Materialize.toast('Stash Item not Found.');
        }
    });
});
$('#pnn_span').click(function () {
    document.location = '/profile';
});
$('#nfiles_btn').click(function () {
    $('#nfile_modal').modal({}).modal('open');
});
$('#nfile_cncl').click(function () {
    $('#nfile_modal').modal('close');
});
$('#nfile_sbmt').click(function (e) {
    var files = $('#nfile_browse').get(0).files;
    if (files.length > 0) {
        var formData = new FormData();
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            formData.append('nfiles[]', file, file.name);
        }
        formData.append('short_name', $('div#nfile_modal #file_name').val());
        formData.append('description', $('div#nfile_modal #file_desc').val());
        formData.append('userfiletypeId', $('div#nfile_modal #file_type').val());
    }
    $.ajax({
        url: '/fileuploader',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data, stat) {
            if (stat === 'success') {
                window.location.reload();
                return true;
            } else {
                errorMsg('#nfile_modal div.content', JSON.parse(data).message);
                return false;
            }
        },
        error: function (data, stat, err) {
            errorMsg('#nfile_modal div.content', JSON.parse(data.responseText).message);
            console.log(data);
        },
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('progress', function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').width(percentComplete + '%');
                    if (percentComplete === 100) {
                        $('.progress-bar').html('Done');
                    }
                }
            }, false);
            return xhr;
        }
    });
    var close = true;
    if ($('#ncol_form.form .ui.warning.message')) {
        close = false;
    }
    return close;
});

$('.profile-activate').each(function(){
    var upid = $(this).data('id');
    $(this).click(function(){
        $.ajax({
            url:'/profile/' + upid,
            type:'post',
            dataType:'json',
            success: function(x, s){
                Msg(x.message);
                window.location.href = '/profile';
            },
            error: function(x,s){
                Msg(x.message);
            }
        });
    });
});


