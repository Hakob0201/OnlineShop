// removeNotification()
// autoRemoveNotification()
// autoDequeueEror("jhgkjgjk")
// autoDequeueSave("text")


function removeNotification() {
    var close = $('.notification')
    close.on('click', 'span', function () {
        var parent = $(this).parent()
        parent.fadeOut(300)
        setTimeout(function() {
            parent.remove()
        }, 300)
    })
}

function autoRemoveNotification() {
    setInterval(function() {
        var notification = $('.notification')
        var notiPage = $(notification).children('.btn')
        var noti = $(notiPage[0])

        setTimeout(function () {
            setTimeout(function () {
                noti.remove()
            }, 1000)
            noti.fadeOut(1000)
        }, 1000)
    }, 3000)
}

function autoDequeueEror(text) {
    var notification = $('.notification')
    setTimeout(function () {


        notification.append('<div class="error btn"><p><strong>Error:</strong>'+text+'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
    }, 1000)
    autoRemoveNotification()
    removeNotification()
}
function autoDequeueSave(text) {
    var notification = $('.notification')
    setTimeout(function () {
        notification.append('<div class="success btn"><p><strong>Success:</strong>' + text + '</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
    }, 1000)
    autoRemoveNotification()
    removeNotification()
}
function autoDequeueSavehref(text,href) {
    var notification = $('.notification')
    var href = `<a href="${href}">Show</a>`;
    setTimeout(function () {
        notification.append('<div class="success btn"><p><strong>Success:</strong>' + text + '  '+href+'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
    }, 1000)
    autoRemoveNotification()
    removeNotification()
}