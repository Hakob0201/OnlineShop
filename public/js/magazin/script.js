function DateUser() {

    var d = new Date();
    var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
    for (var i = 1;i <= 31;i++)
    {
        $("#day").append(`<option value="${i}">${i}</option>`)
    }
    for (var i = 1950;i <= d.getFullYear();i++)
    {
        $("#year").append(`<option value="${i}">${i}</option>`)
    }
}

DateUser();

$('.minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
});
$('.plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
});


$(document).on("click","#open_user_set_mod", function() {
    $(".user-settings-bar").toggleClass("active");
});


// $("#add_product").on("click", function(e) {
//     e.preventDefault()
//     var product_name = $('.product-name').val();
//     var product_text = $('.product-text').val();
//             $.get('/profil/add_scores',function (data) {
//
//             })
// });












$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

UserInformation()

function UserInformation() {
    $.ajax({

        type:'POST',

        url:'/UserInformation',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
          //  console.log(data);
            data.forEach(function (item) {
                $(".us-inf").empty()
               // console.log(item.name)
                $(".us-inf").append(`<a href="/profile" class="user-img"><img src="/${item.photo}" alt=""></a>`)
                $(".img.div").append(`<img src="/${item.photo}">`)
                $(".us-inf").parent().append(` <p id="open_user_set_mod"><a>${item.name}</a></p>`)
                $(".n-10").append(`${item.name} ${item.surname}`)
                if (item.user_status == 'admin')
                {
                    $('.p-m-u ul').append(`<li><a href="/profil/admin">Admin</a></li>`)
                }
            })
        }

    });
}



///////////////////////////////categories//////////////////////////////////////////

Categories()



function Categories() {
    $.ajax({

        type:'POST',

        url:'/Categories',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            //  console.log(data);
            data.forEach(function (item) {
                $('.navbar-collapse .data_categories').append(`  <li><a href="/category/${item.name}">${item.name}</a></li>`)
            })
        }

    });
}


////////////////////////////////////end categories////////////////////////////////////


///////////////////////////addmyshops//////////////////////////


$(".add-my-shop").click(function () {
    $("body").append(`<div class="modal a-m-s">
<p class="modal-remove a-m-s cursor"><i class="fa fa-times"></i></p>
          <div class="wrapper">
                <header>
                    <h1>Add my shop</h1>
                </header>
                <div class="sections">

                    <section class="active">
                        <input type="text" placeholder="Name" name="add_my_shop_name" id="title">
                        <div class="images add-my-shop-images">
                            <div class="pic add-my-shop-images">
                                add
                            </div>
                        </div>
                    </section>
                    <section>
                        <input type="text" placeholder="Topic" id="topic">
                        <textarea placeholder="something..." id="msg"></textarea>
                    </section>
                </div>
                <footer>
                    <ul>
                        <li><span id="add-my-shop-images-reset">reset</span></li>
                        <li><span id="add-my-shop-images">send</span></li>
                    </ul>
                </footer>
          </div>
    </div>`)
    AddMyShop()
})
function AddMyShop() {
    $(document).on('click','.modal-remove.a-m-s',function () {
    $(".modal.a-m-s").remove()
    })
    var new_AddMyShop = new FormData();
    var onchange_add_my_shop_images = false;
    var button = $('.images.add-my-shop-images .pic.add-my-shop-images')
    var uploader = $('<input type="file" accept="image/*" />')
    var images = $('.images.add-my-shop-images')

    button.on('click', function () {
        uploader.click()
    })

    uploader.on('change', function () {
        var reader = new FileReader()
        reader.onload = function(event) {
            $(".img").remove()
            images.prepend('<div class="img add-my-shop-images" style="background-image: url(\'' + event.target.result + '\');"></div>')
        }
        reader.readAsDataURL(uploader[0].files[0])
        new_AddMyShop.append('photo',uploader[0].files[0])
        return onchange_add_my_shop_images = true;
    })

    $("#add-my-shop-images-reset").click(function () {
        onchange_add_my_shop_images = false;
        $("input[name=add_my_shop_name]").val('');
        $(".img.add-my-shop-images").remove()
        new_AddMyShop.delete('photo')
        // newEditpersonalinformation.append('edit_personal_photo','')
    })

    $(document).on('click','#add-my-shop-images',function(e) {
        e.preventDefault();
        var name = $("input[name=add_my_shop_name]").val();

        if (onchange_add_my_shop_images == false){
            new_AddMyShop.append('photo','')
        }

        new_AddMyShop.append('name',name)
        $.ajax({

            type: 'POST',

            url: '/AddMyShop',

            data: new_AddMyShop,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data)
                {
                    $.each(data, function( key, value ) {
                        for (var i = 0; i<value.length;i++){

                            autoDequeueEror(value[i])
                        }
                    });
                    removeNotification()
                    autoRemoveNotification()
                }
        else{
                    autoDequeueSave("It's done in your case")
                    PrintMyShop()
                    removeNotification()
                    autoRemoveNotification()
                    $("input[name=add_my_shop_name]").val('')
                   return  onchange_add_my_shop_images = false;
                    $(".img").remove()
                }


            }
        })
    })
}




/////////////////////////////////////////////////////////////////





////////////////////////////////////tpum a my shop useri//////////////////////////
PrintMyShop()
function PrintMyShop(){
    $.ajax({

        type: 'POST',
        url: '/PrintMyShop',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $(".profil-home.mg.us main .basket .basket-product.p-u").remove()
            data.forEach(function (item) {
                $('.a-m-s').remove()

        $(".profil-home.mg.us main .basket .basket-labels.p-u").parent().append(`<div class="basket-product p-u">
                    <div class="item">
                        <div class="product-image">
                            <img src="/${item.images}" alt="Placholder Image 2" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h1><strong><span class="item-quantity"><a href="/profile/myshops/${item.id}">${item.name}</a></strong></h1>
                            <p><strong>Navy, Size 18</strong></p>
                            <p>Shop Code - ${item.code}</p>
                        </div>
                    </div>
                    <div class="price">26.00</div>
                    <div class="quantity">
                        <input type="number" value="4" min="1" class="quantity-field">
                    </div>
                    <div class="subtotal">104.00</div>
                    <div class="remove">
                        <button class="remove_my_shop" value="${item.id}">Remove</button>
                      <button class=" add-product  cursor" value="${item.id}">add Product</button>
                    </div>

                </div>`)
            })
        }
    })
}

///////////////////////////////////add to cart///////////////////////////////////////////////

AddToCart()

function AddToCart() {
    var new_AddCart = new FormData();
    var cart_product_color = false;
    $(document).on('click','.cart .c-s',function () {
        $('.cart .c-s p').css('border', '3px solid #15524c')
        $(this).find('p').css('border', '3px solid red')
        new_AddCart.append('product_sizes',$(this).attr('value'));
    })

    $(document).on('click','.cart .c-l',function () {
        new_AddCart.append('product_lengths',$(this).attr('value'));
        $('.cart .c-l p').css('border', '3px solid #15524c')
        $(this).find('p').css('border', '3px solid red')
    })

    $(document).on('click','.cart .c-c',function () {
        $('.cart .c-c').css('border', '3px solid #15524c')
        $(this).css('border', '3px solid red')
        new_AddCart.append('product_color',$(this).attr('value'));
        return  cart_product_color = true;
    })

$('.add-product-cart').click(function () {
    new_AddCart.append('product_count',$('.number input').val())
    new_AddCart.append('product_name',$('.description .p-n').text())
    new_AddCart.append('product_main_images',$('.product-img-box.main').attr('value'))
    new_AddCart.append('product_id',$(this).val())
    if (cart_product_color == false)
    {
        new_AddCart.append('product_color','null');
    }

    $.ajax({

        type: 'POST',

        url: '/new_AddCart',

        data: new_AddCart,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
           if (data) {
               $.each(data, function (k, v) {

                   autoDequeueEror(v)

               })
           }else{
               autoDequeueSave(`Your fields have changed`)
           }
        }
    })

})
}

















//////////////////////////////////end add cart////////////////////////////////////////////////




///////////////////////////////////add to wishlist///////////////////////////////////////////////

AddToWishlist()

function AddToWishlist() {
    $('.add-product-wishlist').click(function () {
        var new_AddWishlist = new FormData();
        new_AddWishlist.append('product_name',$('.description .p-n').text())
        new_AddWishlist.append('product_count',$('.number input').val())
        new_AddWishlist.append('product_price',$('.number .price').text())
        new_AddWishlist.append('product_main_images',$('.product-img-box.main').attr('value'))
        new_AddWishlist.append('product_id',$(this).val())

        $.ajax({

            type: 'POST',

            url: '/new_AddWishlist',

            data: new_AddWishlist,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data == 1 )
                {
                    $('.add-product-wishlist ').css('color','red')
                }
                else
                {
                    $('.add-product-wishlist ').css('color','#34ffec')
                }
            }
        })

    })

}

















//////////////////////////////////end add wishlist////////////////////////////////////////////////



//
// ////////////////////////add my shops////////////////////////////////////
// var new_AddMyShop = new FormData();
// var onchange_add_my_shop_images = false;
// var button = $('.images.add-my-shop-images .pic.add-my-shop-images')
// var uploader = $('<input type="file" accept="image/*" />')
// var images = $('.images.add-my-shop-images')
//
// button.on('click', function () {
//     uploader.click()
// })
//
// uploader.on('change', function () {
//     var reader = new FileReader()
//     reader.onload = function(event) {
//         $(".img").remove()
//         images.prepend('<div class="img add-my-shop-images" style="background-image: url(\'' + event.target.result + '\');"></div>')
//     }
//     reader.readAsDataURL(uploader[0].files[0])
//     new_AddMyShop.append('photo',uploader[0].files[0])
//     return onchange_add_my_shop_images = true;
// })
//
// $("#add-my-shop-images-reset").click(function () {
//     onchange_add_my_shop_images = false;
//     $("input[name=add_my_shop_name]").val('');
//     $(".img.add-my-shop-images").remove()
//     new_AddMyShop.delete('photo')
// })
//
// $(document).on('click','#add-my-shop-images',function(e) {
//     e.preventDefault();
//     var name = $("input[name=add_my_shop_name]").val();
//
//     if (onchange_add_my_shop_images == false){
//         new_AddMyShop.append('photo','')
//     }
//
//     new_AddMyShop.append('name',name)
//     $.ajax({
//
//         type: 'POST',
//
//         url: '/AddMyShop',
//
//         data: new_AddMyShop,
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: function (data) {
//             console.log(data)
//             PrintMyShop()
//         }
//     })
// })
//
// ////////////////////////end my shops////////////////////////////////////



//////////////////////////remov my shop////////////////////////////////


$(document).on('click','.remove_my_shop',function () {

    let newremovmyshop = new FormData();
    newremovmyshop.append('removemyshop',$(this).attr('value'))
    $.ajax({

        type: 'POST',

        url: '/newremovmyshop',

        data: newremovmyshop,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            //console.log(data);
            PrintMyShop()
            autoDequeueSave(`Your fields have changed`)
        }
    })
})



/////////////////////End remov my shop////////////////////////////////////



//////////////////////////////////edit product user  shop//////////////////////////////////////////////////


$(document).on('click','.e-p-u-s',function () {
   PMAPE($(this).attr('value'));
    // Story_of_my_product($(this).attr('value'));
})


/////////////////////////////////print modat add modat function = PMAP////////////////////////////////////////////////////////////

function PMAPE(value){
    $('.modal.a-p').remove()
    $("body").append(`<div class="modal e-p">
<p class="modal-remove e-p cursor"><i class="fa fa-times"></i></p>
          <div class="wrapper">
                <header>
                    <h1>Edit my product</h1>
                </header>
                <div class="sections">

                    <section class="active">

                        <input type="text" placeholder="Name" name="edit_products_name">
                        <input type="text" placeholder="Description" name="edit_products_description" id="title">

                         <div class="select-container w-1">
                                    <div class="text-select w-1">
                                        <select name="edit_print_products_categories" class="w-1">

                                        </select>
                                    </div>
                                </div>
                                <div class="m-c-a-sizes">

                                 </div>
                                 <div class="m-c-a-lengths">

                                 </div>
                                 <div class="m-c-a-colors">

                                 </div>
                                 <div class="m-c-a-images">

                                 </div>
                                <div class="c-a-sizes">
                                 <div class="button-box add-product-add-sizes">Add sizes</div>
                                 </div>
                                 <div class="c-a-lengths">
                                 <div class="button-box add-product-add-lengths">Add lengths</div>
                                 </div>
                                <div class="c-a-colors">
                                 <div class="button-box add-product-add-colors">Add colors</div>
                                 </div>
                                 <div class="c-p-v-container">
                                 <div>
                                     <input type="text" placeholder="Count" name="edit-product-add-count">
                                 </div>
                                 <div>
                                     <input type="text" placeholder="Price" name="edit-product-add-Price">
                                     <div class="text-select w-1">
                                            <select name="edit_print_products_valuable" class="w-2">


                                            </select>
                                      </div>
                                  </div>
                                 </div>

                        <div class="images edit-products-images">
                   <div class="pic edit-products-images">
                                add
                            </div>
                        </div>
                    </section>
                    <section>
                        <input type="text" placeholder="Topic" id="topic">
                        <textarea placeholder="something..." id="msg"></textarea>
                    </section>
                </div>
                <footer>
                    <ul>
                        <li><span id="edit-products-reset" value="${value}">reset</span></li>
                        <li><span id="edit-products-send" value="${value}">send</span></li>
                    </ul>
                </footer>
          </div>

    </div>`)
    EditProducts(value)
}

/////////////////////////////////end print modat add modat function = PMAP////////////////////////////////////////////////////////////



////////////////////////////////////////////////////edtit my product////////////////////////////////////////////////


function EditProducts(product_id) {
    /////////////////////////////////////////////////story of my products///////////////////////////////////////////
    $(document).on('click','.modal-remove.e-p',function () {
        $('.modal.e-p').remove()
    })
        let p_id = new FormData();
        p_id.append('id',product_id);
        $.ajax({
            type: 'POST',
            url: '/story_of_my_product',
            data: p_id,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.error_unauthorized){
                    autoDequeueEror(data.error_unauthorized)
                    $('.modal.e-p').remove()
                }else {
                    data.forEach(function (item) {

                        $("input[name=edit_products_name]").val(item.name);
                        $("input[name=edit_products_description]").val(item.description);
                        $("input[name=edit-product-add-count]").val(item.count);
                        $("input[name=edit-product-add-Price]").val(item.price);
                        $("select[name=edit_print_products_categories]").append(`<option selected="" disabled="">${item.category}</option>`);
                        $("select[name=edit_print_products_valuable]").append(`<option selected="" disabled="">${item.valuable}</option> <option value="USD">USD</option>
                                            <option value="RUB">RUB</option>
                                            <option value="AMD">AMD</option>`);
                        if (item.product_siazes.length > 0) {
                            $('.m-c-a-sizes').append(`<div class="product-sizes-container"><div class="sizes-name">My Sizes</div><div class="sizes m-s">
                               </div></div>`)
                            item.product_siazes.forEach(function (sizes) {
                                $('.m-c-a-sizes .sizes.m-s').append(` <div value="${sizes.name}" class="sizes-box edit_sizes"><p>${sizes.name}</p></div>`)

                            })
                        }

                        if (item.product_lengths.length > 0) {
                            $('.m-c-a-lengths').append(`<div class="product-lengths-container"><div class="lengths-name">My lengths</div><div class="lengths m-l">
                               </div></div>`)
                            item.product_lengths.forEach(function (lengths) {
                                $('.m-c-a-lengths .lengths.m-l').append(` <div value="${lengths.name}" class="lengths-box edit_lengths"><p>${lengths.name}</p></div>`)
                            })
                        }

                        $('.m-c-a-colors').append(`<div class="product-colors-container"><div class="color-name">My colors</div><div class="colors m-c">
                               </div></div>`)
                        item.product_colors.forEach(function (colors) {
                            $('.m-c-a-colors .colors.m-c').append(` <div style="background: ${colors.name}" value="${colors.name}" class="color-box edit_colors"><p></p></div>`)

                        })

                        $('.m-c-a-images').append(`<div class="product-images-container"><div class="images-name">My images</div><div class="images m-i">
                               </div></div>`)
                        item.product_photo.forEach(function (images) {
                            $('.m-c-a-images .images.m-i').append(` <div class="images-box edit_images" value="${images.name}"><img src="/${images.name}" value="${images.name}"><span>Main</span></div>`)

                        })

                    })
                }
            }
        })



    $.ajax({
        type: 'POST',
        url: '/PrintAdminCategoriaProduct',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data.length > 0)
            {
                data.forEach(function (item) {
                    $("select[name=edit_print_products_categories]").append(`<option value="${item.name}">${item.name}</option>`)
                })
            }
        }
    })


    /////////////////////////////////////////////////end story of my products///////////////////////////////////////////////////////////


////////////////////////////////prin add color////////////////////////////////////////////////////////////////
    $(document).on('click','.add-product-add-colors',function () {
        $('.c-a-colors').append(`  <div class="product-colors-container"><div class="color-name">Product Colors</div><div class="colors"></div></div> </div>`)
        $.ajax({
            type: 'POST',
            url: '/PrintAdmincolorProduct',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {


                if (data.length > 0)
                {
                    data.forEach(function (item) {
                        $('.product-colors-container .colors').append(`


                                        <div style="background: ${item.name}" value="${item.name}" class="color-box"><p></p></div>

                               `)
                    })
                }
                $('.add-product-add-colors').remove()
                $('.c-a-colors').append(` <div class="button-box add-product-remove-colors">remove sizes</div>`)
            }
        })
    })


    ////////////////////////end add colors////////////////////////////////////

    ////////////////////////////////prin add sizes////////////////////////////////////////////////////////////////
    $(document).on('click','.add-product-add-sizes',function () {
        $('.c-a-sizes').append(`  <div class="product-sizes-container"><div class="sizes-name">Product Sizes</div><div class="sizes"></div></div> </div>`)
        $.ajax({
            type: 'POST',
            url: '/PrintAdminsizesProduct',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {


                if (data.length > 0)
                {
                    data.forEach(function (item) {
                        $('.c-a-sizes .product-sizes-container .sizes').append(`


                                        <div  value="${item.name}" class="sizes-box"><p>${item.name}</p></div>

                               `)
                    })
                }
                $('.add-product-add-sizes').remove()
                $('.c-a-sizes').append(` <div class="button-box add-product-remove-sizes">remove sizes</div>`)
            }
        })
    })



    ////////////////////////end add sizes////////////////////////////////////


    ////////////////////////////////prin add lengths////////////////////////////////////////////////////////////////
    $(document).on('click','.add-product-add-lengths',function () {
        $('.c-a-lengths').append(`  <div class="product-lengths-container"><div class="lengths-name">Product lengths</div><div class="lengths"></div></div> </div>`)
        $.ajax({
            type: 'POST',
            url: '/PrintAdminlengthsProduct',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {


                if (data.length > 0)
                {
                    data.forEach(function (item) {
                        $('.c-a-lengths .product-lengths-container .lengths').append(`


                                        <div  value="${item.name}" class="lengths-box"><p>${item.name}</p></div>

                               `)
                    })
                }
                $('.add-product-add-lengths').remove()
                $('.c-a-lengths').append(` <div class="button-box add-product-remove-lengths">remove lengths</div>`)
            }
        })
    })



    ////////////////////////end add lengths////////////////////////////////////

    ////////////////////////remov modal////////////////////////////////////
    $(document).on('click','.modal-remove.a-p',function () {
        $(".modal.a-p").remove()
    })

    ////////////////////////end remov modal////////////////////////////////////

    ////////////////////////add product////////////////////////////////////
    var new_EditProduct = new FormData();
    var photo = [];
    var photos = [];
    var onchange_add_my_shop_images = false;
    var  onchange_add_product_category = false;
    var onchange_add_product_valuable = false;
    var  add_product_sizes = false;
    var  add_product_lengths = false;
    var  add_product_colors = false;
    var button = $('.images .pic.edit-products-images')
    var uploader = $('<input type="file" accept="image/*" />')
    var images = $('.images.edit-products-images')




    photo.forEach(function (item) {
    })
    button.on('click', function () {
        uploader.click()
    })

    uploader.on('change', function () {
        var reader = new FileReader()
        reader.onload = function(event) {
            images.prepend('<div class="img edit-products-images" value="'+uploader[0].files[0].name+'" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span class="editproductremoveimages">remove</span><span class="editproductmainimages">main</span></div>')
        }
        reader.readAsDataURL(uploader[0].files[0])
        photos.push(uploader[0].files[0])

        return onchange_add_my_shop_images = true;
    })

    $(document).on('click','.editproductremoveimages',function () {

        let removed = photos.findIndex(item => item.name == $(this).parent().attr('value'))
        photos.splice(removed)
        $(this).parent().remove()
        // FileReader remove item
    })

    $(document).on('click','.editproductmainimages',function () {
        $('.addproductmainimages').css('color','#34ffec')
        let main = $(this)
        main.css('color','red')
        new_EditProduct.append('edit_product_photo_main',$(this).parent().attr('value'))
        // Photos main item
    })

    $("select[name=edit_print_products_categories]").on('change', function () {
        new_EditProduct.append('edit_product_category',$(this).val())
    })

    $("select[name=edit_print_products_valuable]").on('change', function () {
        new_EditProduct.append('edit_product_valuable',$(this).val())
    })

    $(document).on('click','.m-c-a-sizes .product-sizes-container .sizes .edit_sizes',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('edit_product_sizes[]',$(this).attr('value'))
    })

    $(document).on('click','.m-c-a-lengths .product-lengths-container .lengths .edit_lengths',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('edit_product_lengths[]',$(this).attr('value'))
    })

    $(document).on('click','.m-c-a-colors .product-colors-container .colors .color-box.edit_colors',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('edit_product_colors[]',$(this).attr('value'))
    })

    $(document).on('click','.m-c-a-images .product-images-container .images .images-box.edit_images img',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('edit_product_images[]',$(this).attr('value'))
    })

    $(document).on('click','.m-c-a-images .product-images-container .images .images-box.edit_images span',function () {
        $('.m-c-a-images .product-images-container .images .images-box.edit_images span').css('color','#34ffec')
        new_EditProduct.append('my_product_images_main',$(this).prev().attr('value'))
        $(this).css('color','red')
    })

    $(document).on('click','.c-a-sizes .product-sizes-container .sizes .sizes-box',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('add_product_sizes[]',$(this).attr('value'))
    })

    $(document).on('click','.c-a-lengths .product-lengths-container .lengths .lengths-box',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('add_product_lengths[]',$(this).attr('value'))
    })

    $(document).on('click','.c-a-colors .product-colors-container .colors .color-box',function () {
        $(this).css('border','3px solid red')
        new_EditProduct.append('add_product_colors[]',$(this).attr('value'))
    })

    $(document).on('click','.add-product-remove-sizes',function () {
        $('.c-a-sizes').empty()
        $('.c-a-sizes').append(`<div class="button-box add-product-add-sizes">Add sizes</div>`)
        return add_product_sizes = false;
    })

    $(document).on('click','.add-product-remove-lengths',function () {
        $('.c-a-lengths').empty()
        $('.c-a-lengths').append(`<div class="button-box add-product-add-lengths">Add lengths</div>`)
        return add_product_lengths = false;
    })

    $(document).on('click','.add-product-remove-colors',function () {
        $('.c-a-colors').empty()
        $('.c-a-colors').append(`<div class="button-box add-product-add-colors">Add colors</div>`)
        return add_product_colors = false;
    })

    $(document).on('click','#add-products-reset',function () {
        $('.modal.a-p').remove()
        PMAP($(this).val())
    })


    $(document).on('click','#edit-products-send',function(e) {
        e.preventDefault();
        var name = $("input[name=edit_products_name]").val();
        var description = $("input[name=edit_products_description]").val();
        var count = $("input[name=edit-product-add-count]").val();
        var price = $("input[name=edit-product-add-Price]").val();
        new_EditProduct.append('product_id', product_id);
        new_EditProduct.append('edit_product_name',name);
        new_EditProduct.append('edit_product_description',description);
        new_EditProduct.append('edit_product_count',count);
        new_EditProduct.append('edit_product_price',price);

        for(var i = 0;i<photos.length;i++)
        {
            new_EditProduct.append('add_product_photos[]', photos[i])
        }

        $.ajax({

            type: 'POST',

            url: '/new_editProduct',

            data: new_EditProduct,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                    if (data.product)
                    {
                        autoDequeueSave("Your changes are done");
                        $('.modal.e-p').remove();
                        data.product.forEach(function (item) {
                            $(`.p-s.${item.id}`).empty();
                            $(`.p-s.${item.id}`).append(`
                            <div class="container">

                                <div class="top" style=""></div>
                                <div class="bottom">
                                    <div class="left">
                                        <div class="details">
                                            <h1>${item.name}</h1>
                                            <p>${item.price} ${item.valuable}</p>
                                        </div>
                                        <div class="buy"><i class="fa fa-pencil e-p-u-s" value="${item.id}"></i><i class="fa fa-times-circle e-p-u-r" value="${item.id}"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="inside">
                                <div class="icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                                <div class="contents">
                                ${item.description}
                                </div>
                            </div>
                        `)

                           item.product_photo.forEach(function (photo) {
                                if (photo.status == 'main'){
                                    $(`.p-s.${item.id} .container .top`).append(` <img src="/${photo.name}" alt="">`)
                                }
                           })


                        })
                    }
                    else
                    {

                        for (var i = 0;i<data.length;i++)
                        {
                            autoDequeueEror(data[i]);
                        }
                    }
                }
        })
        ////////////////////////end add product////////////////////////////////////
    })
}



/////////////////////////////////////delete product///////////////////////////////////////////////////\
$(document).on('click','.e-p-u-r',function () {
    let remove_id = new FormData();
    remove_id.append('product_id',$(this).attr('value'));
    $.ajax({

        type: 'POST',

        url: '/new_removeProduct',

        data: remove_id,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {

                autoDequeueSave("Your changes are done");
                    $(`.p-s.${data}`).remove();

            }
    })
})


////////////////////////////////////////////////////entedit my product///////////////////////////////////////////////














////////////////////end edit product shop//////////////////////////////////////////////////////////////////////



////////////////////add product reviews/////////////////////////////////////////////////////////////////////////

$(document).on('click','.product_reviews',function () {
    let product_reviews = new FormData();
    product_reviews.append('orders_id',$(this).attr('value'));
    product_reviews.append('feedback',$(this).parent().prev().val());
    $.ajax({

        type: 'POST',

        url: '/product_reviews',

        data: product_reviews,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data.r_errors){
                autoDequeueEror(data.r_errors);
            }
            else if (data == 'errors' )
            {
                autoDequeueEror('Wrong process');
            }else {
                autoDequeueSave("Your changes are done");
            }
        }
    })
    $(this).parent().prev().val('')
})



////////////////////end product reviews///////////////////////////////////////////////////////////////////////////










$(document).on('hover','.drift-demo-trigger',function () {
    $('.detail').show();
})





















































// message box//

$(document).on("click", ".minimize", function(e) {
    e.stopPropagation();
    var $ele = $(this);
    if ($ele.hasClass('minimized')) {
        $ele.removeClass('minimized');
        $ele.parents(".msg-title-bar").siblings().css({
            "display": "block"
        });
        $ele.parents(".msg-compose").css({
            height: '500px',
            width: '480px'
        });
        $ele.parents(".cell").css({
            width: '480px'
        });
    } else {
        $ele.addClass('minimized');
        $ele.parents(".msg-title-bar").siblings().css({
            "display": "none"
        });
        $ele.parents(".msg-compose").css({
            height: '40px',
            width: '240px'
        });
        $ele.parents(".cell").css({
            width: '240px'
        });
    }
});

$(document).on("click",".close",function() {
    $(this).parent().toggle();
});

$(document).on("click", ".close", function(e) {
    e.stopPropagation();
    $(this).parents(".cell").remove();
});

$(".floating-btn button:not(.invite-action)").click(function() {
    var $parent = $("#msg-box");
    var $clone = $(".template>.cell").clone(true, true);
    var $items = $("#msg-box .cell");
    var index = $items.length + 1;

    if (index === 1) {
        $clone = $clone.css({
            "padding-left": "480px"
        });
    }
    $clone.find('.wrap').css({
        "z-index": index
    });
    $parent.prepend($clone);
});

$(".floating-btn button:not(.invite-action)").click(function() {
    var $parent = $("#msg-box");
    var $clone = $(".template>.cell").clone(true, true);
    var $items = $("#msg-box .cell");
    var index = $items.length + 1;

    if (index === 1) {
        $clone = $clone.css({
            "padding-left": "480px"
        });
    }
    $clone.find('.wrap').css({
        "z-index": index
    });
    $parent.prepend($clone);
});



function updateZIndex() {
    var highestIndex = 0;
    var items = $(".msg-wrapper .cell");
    var child = $(this).parents('.cell');
    var index = $(".cell").index(child);

    if (items.length < 1) return;

    items.each(function() {
        var currentIndex = parseInt($(this).find('.wrap').css("zIndex"), 10);
        if (currentIndex > highestIndex) {
            highestIndex = currentIndex;
        }
    });

    changeIndex(items, index, highestIndex);

}

$(".send-btn-stop").click(function(e){
    var rippler = $(this);

    if(rippler.find(".ink").length == 0) {
        rippler.append("<span class='ink'></span>");
    }

    var ink = rippler.find(".ink");

    ink.removeClass("animate");

    if(!ink.height() && !ink.width())
    {
        var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
        ink.css({height: d, width: d});
    }

    var x = e.pageX - rippler.offset().left - ink.width()/2;
    var y = e.pageY - rippler.offset().top - ink.height()/2;

    ink.css({
        top: y+'px',
        left:x+'px'
    }).addClass("animate");
});

function changeIndex(items, fromIndex, highestIndex) {
    for (var i = fromIndex; i >= 0; i--, highestIndex--) {
        var current = $(items[i]).find('.wrap');
        current.css('zIndex', highestIndex);
    }

    for (var i = fromIndex + 1; i < items.length; i++, highestIndex--) {
        var current = $(items[i]).find('.wrap');
        current.css('zIndex', highestIndex);
    }
}

//end message box//


$('#open-message-platform').click(function () {
    $('.msg-wrapper .msg-compose-container').empty();
    $('.msg-wrapper .msg-compose-container').append(` <div id="msg-box" class="row"><div class="cell" style="padding-left: 480px;">
                <div class="wrap" style="z-index: 1;">
                    <div class="msg-compose">
                        <div class="msg-compose-wrapper">
                            <div class="msg-title-bar">
                                <div class="icon left"><i class="fa fa-envelope"></i></div>
                                <div class="compose-actions right">
                                    <a  class="minimize"><i class="fa fa-minus"></i></a><a  class="close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="msg-recipients">
                                <div class="to-list">
                                    <input type="text" placeholder="To" name="to_message"><span class="arrow"></span></div>
                                <div class="cc-list collapse">
                                    <input type="text" placeholder="cc">
                                </div>
                                <div class="bcc-list collapse">
                                    <input type="text" placeholder="Bcc">
                                </div>
                            </div>
                            <div class="msg-subject">
                                <input type="text" placeholder="Subject" name="subject_message">
                            </div>
                            <div class="msg-body">
                                <textarea placeholder="Say something" name="message"></textarea>
                            </div>
                            <div class="msg-footer">
                                <div class="left">
                                    <a  class="send-btn message cursor">SEND</a>
                                    <a href="#"><i class="fa fa-paperclip"></i></a>
                                    <a href="#" class="font"></a>
                                </div>
                                <div class="right"><a href="#"><i class="fa fa-trash"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`);
})


$(document).on('click','.send-btn.message',function () {
    let send_message = new FormData();
    let to_message = $( "input[name='to_message']").val();
    let subject_message = $( "input[name='subject_message']").val();
    let message = $( "textarea[name='message']").val();
    send_message.append('to_message',to_message);
    send_message.append('subject_message',subject_message);
    send_message.append('message',message);
    $.ajax({

        type: 'POST',

        url: '/send_message',

        data: send_message,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data.errors){
                data.errors.forEach(function (item) {
                    autoDequeueEror(item);
                })
            }
            else if (data.email)
            {
                autoDequeueEror(data.email);
            }else {
                autoDequeueSave("Your changes are done");
            }
        }

    })
    $( "input[name='to_message']").val('');
    $( "input[name='subject_message']").val('');
    $( "textarea[name='message']").val('');

})





const sendHttpRequest = (method, url, data) => {
    const promise = new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open(method, url);

        xhr.responseType = 'json';

        if (data) {
            xhr.setRequestHeader('Content-Type', 'application/json');
        }

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response);
            } else {
                resolve(xhr.response);
            }
        };

        xhr.onerror = () => {
            reject('Something went wrong!');
        };

        xhr.send(JSON.stringify(data));
    });
    return promise;
};

const sendData = () => {
    sendHttpRequest('POST', '/PrintMyShop', {
        email: 'eve.holt@reqres.in'
        // password: 'pistol'
    })
        .then(responseData => {
            console.log(responseData);
        })
        .catch(err => {
            console.log(err);
        });
};


sendData()
