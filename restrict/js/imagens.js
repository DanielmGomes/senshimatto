function uploadImg(input_file, img, input_path) {
    
    src_before = img.attr('src'); 
    img_file = input_file[0].files[0];
    form_data = new FormData();

    form_data.append('image_file', img_file);

    $.ajax({

        url: 'ajax_import_img',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        beforeSend: function () {
            //clearErrors();
           // input_path.siblings('.help-block').html(loadingImg('Carregando Imagem...'));
        },
        success: function (response) {
            //clearErrors();
            if (response['status']) {
                img.attr('src', response['img_path']);
                input_path.val(response['img_path']);
            }else{
                img.attr('src', src_before);
                input_path.siblings('.help-block').html(response['error']);
            }
        },
        error: function(){
            img.attr('src', src_before);

        }
    })
}