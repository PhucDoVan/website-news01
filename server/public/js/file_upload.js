$(document).ready(function () {
    const baseUrl = $('meta[name=base_url]').attr('content');
    $('body').delegate('.img_select', 'change', function () {
        const formData = new FormData();
        const files = $(this)[0].files[0];
        formData.append('file', files);
        formData.append('type', 'image');
        const parentElement = $(this).closest('.p-fileup__item');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            },
            url: baseUrl + '/admin/ajax/upload_file',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.statusText == 'success') {
                    parentElement.find('.img_tmp').val(data.path);
                    parentElement.find('.notice-error').html('');
                    parentElement.find('.img_preview').html('<img src="/tmp/' + data.path + '">');
                } else {
                    parentElement.find('.img_tmp').val('');
                    parentElement.find('.notice-error').html('フォーマットが正しくありません');
                    parentElement.find('.img_preview').html('');
                }
            },
            error: function (err) {
                console.log('error: ', err);
            },
        });
    });

    $('body').delegate('.document_select', 'change', function () {
        const formData = new FormData();
        const files = $(this)[0].files[0];
        formData.append('file', files);
        formData.append('type', 'document');
        const parentElement = $(this).closest('.p-document__item');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            },
            url: baseUrl + '/admin/ajax/upload_file',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.statusText == 'success') {
                    parentElement.find('.document_tmp').val(data.path);
                    parentElement.find('.notice-error').html('');
                    parentElement.find('.document_preview').html('<span>'+data.path+'</span>');
                } else {
                    parentElement.find('.document_tmp').val('');
                    parentElement.find('.notice-error').html('資料書ファイルではありません。');
                    parentElement.find('.document_preview').html('');
                }
            },
            error: function (err) {
                console.log('error: ', err);
            },
        });
    });

    $('body').delegate('.file_select', 'change', function () {
        const formData = new FormData();
        const files = $(this)[0].files[0];
        formData.append('file', files);
        formData.append('type', 'pdf');
        const parentElement = $(this).closest('.p-filepdf__item');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            },
            url: baseUrl + '/admin/ajax/upload_file',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.statusText == 'success') {
                    parentElement.find('.pdf_tmp').val(data.path);
                    parentElement.find('.notice-error').html('');
                    parentElement.find('.pdf_preview').html('<span>'+data.path+'</span>');
                } else {
                    parentElement.find('.pdf_tmp').val('');
                    parentElement.find('.notice-error').html('PDFタイプのファイルを指定してください。');
                    parentElement.find('.pdf_preview').html('');
                }
            },
            error: function (err) {
                console.log('error: ', err);
            },
        });
    });
});

function clickUploadFile(button) {
    const form = $(button).closest('.p-fileup__item');
    $(form).find('input[type=file]').click();
    return false;
}

// Update File PDF
function clickUpDocument(button) {
    const form = $(button).closest('.p-document__item');
    $(form).find('input[type=file]').click();
    return false;
}

function clickUpFilePDF(button) {
    const form = $(button).closest('.p-filepdf__item');
    $(form).find('input[type=file]').click();
    return false;
}
