$(document).ready(function(){

    class User{
        constructor(a,b)
        {
            this.username = a;
            this.password = b;
        }
        validation(){
            let isEmpty = false;
            if (user.username=="" || user.username=="Please fill in the field" ) {
                $("#user").val("Please fill in the field")
                isEmpty = true;
            }

            if (user.password==""|| user.password=="Please fill in the field") {
                $("#pass").val("Please fill in the field")
                isEmpty = true;
            }
            return isEmpty
        }
    }
    let user = new User($("#user").val(),$("#pass").val());
    // $("#log_in").click(function () {
    //     user.validation()
    // })

    $("#registracia").click(function () {
        $(".modal").css('display','block');
    })
    $(".close").click(function () {
        $(".modal").css('display','none');
    })

    // $(document).click(function(event) {
    //     if (event.target.nodeName == "id01") {
    //         $(".modal").css('display','none');
    //     }
    // });




    $(".envelope").click(function () {
    $(".overlay").toggleClass("active")

    })
    $(".container .close").click(function () {
        $(".overlay").toggleClass("active")
    })

    function DateUser() {

        var d = new Date();
        var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
        for (var i = 1;i <= 31;i++)
        {
            $(".day").append(`<option value="${i}">${i}</option>`)
        }
        for (var i = 1950;i <= d.getFullYear();i++)
        {
            $(".year").append(`<option value="${i}">${i}</option>`)
        }
        console.log(strDate)
    }

    DateUser();



});
