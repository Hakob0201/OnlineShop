function PrintAdminCategoria(Class,append) {
    $.ajax({

        type: 'POST',
        url: '/PrintAdminCategoria',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
        }
    })
}

function PrintAdmincolor() {
    $.ajax({

        type: 'POST',
        url: '/PrintAdmincolor',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            console.log(data);
        }
    })
}

function PrintAdminsizes() {
    $.ajax({

        type: 'POST',
        url: '/PrintAdmincolor',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            console.log(data);
        }
    })
}

PrintAdminCategoria()



































