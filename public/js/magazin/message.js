$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$.ajax({

    type: 'POST',

    url: '/print_message',

    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
       data.forEach(function (item) {
            $('#message_us').append(`<div class="content-wrapper"><a href="/profile/message/${item.id}" class=""><div class="image"><img src="/${item.message_sender.photo}"></div> <div class="name"><span>${item.message_sender.name}</span></div> <div class="subject"><div class="actions"><a href="#" class="pinned-msg"><i class="fa fa-thumb-tack"></i></a></div> <div class="content"><span class="fs">${ item.subject}</span><span> - </span><span class="sn">${ item.message_text }</span></div></div></a></div>`)
       })
    }

})