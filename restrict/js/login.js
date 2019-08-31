!(function() {
    
    $('#login_form').submit(function(){

        $.ajax({
            type: 'post',
            url: BASE_URL + 'admin/ajax_login',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function(){
                clearErrors();
                $('#btn_login').parent().siblings('help_block').html(loadingImg('verificando...'));
            },
            sucess: function(json){
                if (json['status'] == 1) {
                    clearErrors();
                    $('#btn_login').parent().siblings('help_block').html(loadingImg('logando...'));
                    window.location = BASE_URL + 'admin';
                }else{
                    showErrors(json['error_list']);
                }
            },
            error: function(response){
                console.log(response);
            }
        })

        return false;
    })
})