$(function () {
    $('#btn_upload_competicao_img').change(function(){
        uploadImg($(this), $('#competicao_img_path'), $('#competicao_img'));
    });
})