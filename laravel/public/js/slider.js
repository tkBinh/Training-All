$(document).ready(function () {
    $('#slider_banner').click(function () {
        $('#choose_picture').toggle();
    });
    $('#btn-edit').click(function () {
            $('#acount_input_number').addClass('form-control').show();
            $('#acount_text_number').hide();
            $(this).css('display','none');
            $('#btn-cancel').css('display','inline');

    });
    $('#btn-cancel').click(function () {
        $('#acount_input_number').addClass('form-control').hide();
        $('#acount_text_number').show();
        $(this).css('display','none');
        $('#btn-edit').css('display','inline');
    });
    $(":checkbox").change(function(){
        var selected = $(this).is(':checked');
        var name = $(this).attr('id'); 
        var id = $(this).val();
        if(name == 'customer.view' || name == 'collaborator.view'){
            if(selected){
                $('#allow-'+id).show();
            }else{
                $('#allow-'+id).hide();
            }
        }else{
            return;
        }
    });
});