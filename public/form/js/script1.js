$(document).ready(function(){
    $("#reg_in").click(function () {
           let gender= $("#gender input[name='example']:checked").val();
           let last_name= $(".last_name").val();
           let first_name = $(".first_name").val();
           let mobile_email = $(".mobile_email").val();
           let new_password = $(".new_password").val();
           let day = $("#day").val();
           let months = $("#months").val();
           let year = $("#year").val();
           let confirm_password = $(".confirm_password").val();
           let term = $(".confirm input[name='confirm']:checked").val();
           console.log(gender)
           if (!gender){
               gender=''
           }
        if (!term){
            term=''
        }

           $.ajax({
                url: "server.php",
                type: "post",
                data: {gender:gender,last_name:last_name, first_name:first_name, mobile_email:mobile_email, new_password:new_password,day:day,months:months,year:year,confirm_password:confirm_password,term:term,action:"registracia"},
                success: function(r) {
                    result = JSON.parse(r)
                    for (var key of Object.keys(result)) {
                        $('#' + key ).css({
                            border:"1px solid red",
                        })
                        $('#' + key).append(`<span class="error-msg">${result[key]}</span>`)
                        $('#' + key ).each(function () {
                            $(this).click(function () {
                                $(this).css("border","none")
                                $(".error-msg").remove();
                            })
                        })
                    }
                    if (Object.keys(result).length == 0) {
                        location.href ='user.php'
                    }

                }

           })
    })

    $("#log_in").click(function () {
        let mobile_email = $(".mobile-email").val();
        let password = $(".password").val();
        $.ajax({
            url: "server.php",
            type: "post",
            data: {mobile_email:mobile_email,password:password,action:"log_in"},
            success: function(r) {
                $(".erors").empty();
                result = JSON.parse(r)
                for (var key of Object.keys(result)) {
                    $(".erors").append(result[key]);
                }

                if (Object.keys(result).length == 0) {
                    location.href ='user.php'
                }
                $(".del-eror").each(function () {
                    $(this).click(function () {
                        $(".erors").empty();
                    })
                })
            }
        })
    })

    $(document).on('keypress','.del-eror',function(e){
        if(e.key == 'Enter' && e.shiftKey != true){
            let mobile_email = $(".mobile-email").val();
            let password = $(".password").val();
            $.ajax({
                url: "server.php",
                type: "post",
                data: {mobile_email:mobile_email,password:password,action:"log_in"},
                success: function(r) {
                    $(".erors").empty();
                    result = JSON.parse(r)
                    for (var key of Object.keys(result)) {
                        $(".erors").append(result[key]);
                    }

                    if (Object.keys(result).length == 0) {
                        location.href ='user.php'
                    }
                    $(".del-eror").each(function () {
                        $(this).click(function () {
                            $(".erors").empty();
                        })
                    })
                }
            })
        }
    })

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $(".forgot-password").click(function (e) {
        e.preventDefault();
        let for_pass = new FormData();
        for_pass.append('mail',$(this).prev().val())

        $.ajax({

            type: 'POST',

            url: '/forgot_password',

            data: for_pass,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                if (!data.success ) {
                    $('.f-p').empty()
                    $('.f-p').append(`
    <div class="form-body">
      <div class="row">
        <input type="text" placeholder="New_password*" name="new_password" class="new_password_Confirm">
        <input type="text" placeholder="Confirm password*" name="confirm_password" class="confirm_password_Confirm">
      </div>
      <div class="row">
        <input type="text" placeholder="Confirmation code*" name="confirmation_code" class="confirmation_code_Confirm">
      </div>
    </div>
    <div class="rule"></div>
<div class="form-footer">
<a class="f-p-confirmation">confirmation</a>

</div>`)
                }
                else {
                   console.log(data.success)
                }
            }
        })
    })

    $(document).on('click',".f-p-confirmation",function (e) {
        alert()
        e.preventDefault();
        let con_code = new FormData();
        let new_password = $('.new_password_Confirm').val()
        let confirm_password = $('.confirm_password_Confirm').val()
        let confirmation_code = $('.confirmation_code_Confirm').val()
        con_code.append('new_password',new_password)
        con_code.append('confirm_password',confirm_password)
        con_code.append('confirmation_code',confirmation_code)

        $.ajax({

            type: 'POST',

            url: '/confirmation_code',

            data: con_code,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                if (!data.success ) {
                    $('.f-p').empty()
                    $('.f-p').append(`<input type="text" placeholder="Confirmation code:" name="confirmation-code" class="f-p-i"><div class="confirmation-code f-p-b"><span>Send</span></div>`)
                }
                else {
                    console.log(data.success)
                }
            }
        })
    })
})
