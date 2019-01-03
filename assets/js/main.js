class Main{
    constructor(){

    }
    checkPassword(){
        $("#password, #confirm_password").on('keyup',function(){
            if($('#password').val()==="" || $('#confirm_password').val()===""){
                $('#message').html('')
            }
          else if ($('#password').val() == $('#confirm_password').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
      $('#message').html('Not Matching').css('color', 'red');
        })
    }

    enableEdit(editMode){
        if(editMode){
            $("#myaccount :input").prop("disabled",false);
            $("#update").show();
            $("#cancel").show();
            $("#edit").hide();
        }else{
            $("#myaccount :input").attr("disabled",true);
            $("#update").hide();
            $("#cancel").hide();
        }
    }

}