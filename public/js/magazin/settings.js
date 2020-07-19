///////////////////////////////////Editpersonalinformation////////////////////////////////////////////////
Editpersonalinformation()
function Editpersonalinformation() {


    var newEditpersonalinformation = new FormData();
    var onchange_edit_personal_day = false;
    var onchange_edit_personal_months = false;
    var onchange_edit_personal_year = false;
    var onchange_edit_personal_photo = false;
    var button = $('.images.images.edit-uesr-photo .pic.edit-uesr-photo')
    var uploader = $('<input type="file" accept="image/*" />')
    var images = $('.images.edit-uesr-photo')
    console.log(images)

    button.on('click', function () {
        uploader.click()
    })

    uploader.on('change', function () {
        var reader = new FileReader()
        reader.onload = function(event) {
            // $(".img.editpersonalinformation").remove()
            images.prepend('<div class="img editpersonalinformation" style="background-image: url(\'' + event.target.result + '\');"></div>')
        }
        reader.readAsDataURL(uploader[0].files[0])
        console.log(uploader[0].files[0])
        newEditpersonalinformation.append('edit_personal_photo',uploader[0].files[0])
        return onchange_edit_personal_photo = true;
    })

    $("select[name=edit_personal_day]").on('change', function () {
        newEditpersonalinformation.append('edit_personal_day',$(this).val())
        return onchange_edit_personal_day = true;
    })

    $("select[name=edit_personal_months]").on('change', function () {
        newEditpersonalinformation.append('edit_personal_months',$(this).val())
        return onchange_edit_personal_months = true;
    })

    $("select[name=edit_personal_year]").on('change', function () {
        newEditpersonalinformation.append('edit_personal_year',$(this).val())
        return onchange_edit_personal_year = true;
    })

    $("#edit-personal-information-reset").click(function () {
        onchange_edit_personal_day = false;
        onchange_edit_personal_months = false;
        onchange_edit_personal_year = false;
        onchange_edit_personal_photo = false;
        $("input[name=edit_personal_name]").val('');
        $("input[name=edit_personal_surname]").val('');
        $("select[name=edit_personal_day]").val('Day');
        $("select[name=edit_personal_months]").val('Months')
        $("select[name=edit_personal_year]").val('Year')
        $(".img.editpersonalinformation").remove()
        newEditpersonalinformation.delete('edit_personal_photo')
        // newEditpersonalinformation.append('edit_personal_photo','')
    })


    $("#edit-personal-information").click(function (e) {
        e.preventDefault();
        var name = $("input[name=edit_personal_name]").val();
        var surname = $("input[name=edit_personal_surname]").val();

        if (onchange_edit_personal_photo == false){
            newEditpersonalinformation.append('edit_personal_photo','')
        }

        if (onchange_edit_personal_day == false){
            newEditpersonalinformation.append('edit_personal_day','')
        }

        if (onchange_edit_personal_months == false){
            newEditpersonalinformation.append('edit_personal_months','')
        }

        if (onchange_edit_personal_day == false){
            newEditpersonalinformation.append('edit_personal_year','')
        }

        newEditpersonalinformation.append('edit_name',name)
        newEditpersonalinformation.append('edit_surname',surname)

        $.ajax({

            type:'POST',

            url:'/Editpersonalinformation',

            data:newEditpersonalinformation,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                    if (data.length>0)
                    {
                        for (var i = 0; i < data.length; i++) {
                            autoDequeueSave(`The field of your ${data[i]} has changed`)
                        }
                        UserInformation()
                        onchange_edit_personal_day = false;
                        onchange_edit_personal_months = false;
                        onchange_edit_personal_year = false;
                        onchange_edit_personal_photo = false;
                        $("input[name=edit_personal_name]").val('');
                        $("input[name=edit_personal_surname]").val('');
                        $("select[name=edit_personal_day]").val('Day');
                        $("select[name=edit_personal_months]").val('Months')
                        $("select[name=edit_personal_year]").val('Year')
                        $(".img.editpersonalinformation").remove()
                        newEditpersonalinformation.delete('edit_personal_photo')
                    }
                    else
                        {
                        autoDequeueEror(`Fill in the fields for changes`)
                    }

            }

        });

    })
}


//////////////////////////////////End Editpersonalinformation/////////////////////////////////////////////



//////////////////////////////////Delivery Addresses append///////////////////////////////////////////////////////




$("#append_delivery_addresses_reset").click(function () {
    receiver_name = $("input[name=receiver_name]").val('');
    country_region = $("input[name=country_region]").val('');
    street_house_flat = $("input[name=street_house_flat]").val('');
    city = $("input[name=city]").val('');
    postcode = $("input[name=postcode]").val('');
    mobile_phone = $("input[name=mobile_phone]").val('');
})

$("#append_delivery_addresses").click(function (e) {
    e.preventDefault();
    var newappenddeliveryaddresses = new FormData();
    var receiver_name = $("input[name=receiver_name]").val();
    var country_region = $("input[name=country_region]").val();
    var street_house_flat = $("input[name=street_house_flat]").val();
    var city = $("input[name=city]").val();
    var postcode = $("input[name=postcode]").val();
    var mobile_phone = $("input[name=mobile_phone]").val();


    newappenddeliveryaddresses.append('receiver_name',receiver_name)
    newappenddeliveryaddresses.append('country_region',country_region)
    newappenddeliveryaddresses.append('street_house_flat',street_house_flat)
    newappenddeliveryaddresses.append('city',city)
    newappenddeliveryaddresses.append('postcode',postcode)
    newappenddeliveryaddresses.append('mobile_phone',mobile_phone)


    $.ajax({

        type:'POST',

        url:'/appenddeliveryaddresses',

        data:newappenddeliveryaddresses,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){

            if (data)
            {
                for (var i = 0; i < data.errors.length; i++) {

                    autoDequeueEror(data.errors[i])
                }
            }
            else
            {
                autoDequeueSave(`Your fields have changed`)
                receiver_name = $("input[name=receiver_name]").val('');
                country_region = $("input[name=country_region]").val('');
                street_house_flat = $("input[name=street_house_flat]").val('');
                city = $("input[name=city]").val('');
                postcode = $("input[name=postcode]").val('');
                mobile_phone = $("input[name=mobile_phone]").val('');
            }
        }

    });

})





//////////////////////////////////End Delivery Addresses Append///////////////////////////////////////////////////////




//////////////////////////////////Edit email///////////////////////////////////////////////////////




$("#edit_email_user_reset").click(function () {
    let old_email_address = $("input[name=old_email_address]").val('');
    let new_email_address = $("input[name=new_email_address]").val('');
    let repeat_email_address = $("input[name=repeat_email_address]").val('');
})

$(document).on("click","#edit_email_user",function (e) {
    e.preventDefault();
    let neweditemail = new FormData();
    let old_email_address = $("input[name=old_email_address]").val();
    let new_email_address = $("input[name=new_email_address]").val();
    let repeat_email_address = $("input[name=repeat_email_address]").val();


    neweditemail.append('old_email_address',old_email_address)
    neweditemail.append('new_email_address',new_email_address)
    neweditemail.append('repeat_email_address',repeat_email_address)



    $.ajax({

        type:'POST',

        url:'/neweditemail',

        data:neweditemail,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
                            if ( data.errors_old)
                {
                    autoDequeueEror(data.errors_old)

                }
                else if (data.errors)
                {
                    for (var i = 0; i < data.errors.length; i++) {

                        autoDequeueEror(data.errors[i])
                    }
                }

            else
            {
                $("input[name=old_email_address]").remove();
                $("input[name=new_email_address]").remove();
                $("input[name=repeat_email_address]").remove();
                $('.a-p-e-m').append(`
                <p class="a-p-e-m-t">${data.email}</p>
                <input type="text" placeholder="Confirmation code" name="new_email_confirmation_code">
                `)
                $('#edit_email_user').attr('id','edit_email_user_confirmation');
                autoDequeueSave(`Check your e-mail address for identification`);
                edit_email_user_confirmation(data.email);

            }

        }

    });

})

function edit_email_user_confirmation(code_email) {
    $(document).on("click", "#edit_email_user_confirmation", function () {

        let newedit_email_user_confirmation = new FormData();
        let email = code_email;
        let new_email_confirmation_code =  $("input[name=new_email_confirmation_code]").val();
        newedit_email_user_confirmation.append('new_email_confirmation_code',new_email_confirmation_code)
        newedit_email_user_confirmation.append('email',email)
        $.ajax({

            type:'POST',

            url:'/newedit_email_user_confirmation',

            data:newedit_email_user_confirmation,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                if ( data.errors_old)
                {
                    autoDequeueEror(data.errors_old)

                }
                else if (data.errors)
                {
                    for (var i = 0; i < data.errors.length; i++) {

                        autoDequeueEror(data.errors[i])
                    }
                }

                else
                {
                    $("input[name=new_email_confirmation_code]").remove()
                    $('.a-p-e-m-t').remove()
                    $('.a-p-e-m').append(`
               <input type="text" placeholder="Old email address" name="old_email_address">
                <input type="text" placeholder="New email address" name="new_email_address">
                <input type="text" placeholder="Repeat the new email address" name="repeat_email_address">
                `)
                    $('#edit_email_user_confirmation').attr('id','edit_email_user');
                    autoDequeueSave(`Your fields have changed`);
                }
            }
        });
    })
}




//////////////////////////////////End Edit email///////////////////////////////////////////////////////





//////////////////////////////////Edit password///////////////////////////////////////////////////////




$("#edit_paswors_user_reset").click(function () {
    let old_password = $("input[name=old_password]").val('');
    let new_password = $("input[name=new_password]").val('');
    let repeat_password = $("input[name=repeat_password]").val('');
})

$("#edit_paswors_user").click(function (e) {
    e.preventDefault();
    let neweditpassword = new FormData();
    let old_password = $("input[name=old_password]").val();
    let new_password = $("input[name=new_password]").val();
    let repeat_password = $("input[name=repeat_password]").val();


    neweditpassword.append('old_password',old_password)
    neweditpassword.append('new_password',new_password)
    neweditpassword.append('repeat_password',repeat_password)



    $.ajax({

        type:'POST',

        url:'/neweditpassword',

        data:neweditpassword,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            old_password = $("input[name=old_password]").val('');
            new_password = $("input[name=new_password]").val('');
            repeat_password = $("input[name=repeat_password]").val('');
            if (data)
            {

                if ( data.errors_old)
                {
                    autoDequeueEror(data.errors_old)

                }
                else if (data.errors)
                {
                    for (var i = 0; i < data.errors.length; i++) {

                        autoDequeueEror(data.errors[i])
                    }
                }
            }
            else
            {
                autoDequeueSave(`Your fields have changed`)
                receiver_name = $("input[name=receiver_name]").val('');
                country_region = $("input[name=country_region]").val('');
                street_house_flat = $("input[name=street_house_flat]").val('');
                city = $("input[name=city]").val('');
                postcode = $("input[name=postcode]").val('');
                mobile_phone = $("input[name=mobile_phone]").val('');
            }

        }

    });

})





//////////////////////////////////End Edit password///////////////////////////////////////////////////////