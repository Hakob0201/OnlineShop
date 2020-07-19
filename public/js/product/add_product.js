$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});




///////////////////////////addproducts//////////////////////////


$(document).on('click','.add-product',function () {
    PMAP($(this).val())


})


/////////////////////////////////print modat add modat function = PMAP////////////////////////////////////////////////////////////
function PMAP(value){
    $('.modal.a-p').remove()
    $("body").append(`<div class="modal a-p">
<p class="modal-remove a-p cursor"><i class="fa fa-times"></i></p>
          <div class="wrapper">
                <header>
                    <h1>Add my product</h1>
                </header>
                <div class="sections">

                    <section class="active">

                        <input type="text" placeholder="Name" name="add_products_name" id="title">
                        <input type="text" placeholder="Description" name="add_products_description" id="title">

                         <div class="select-container w-1">
                                    <div class="text-select w-1">
                                        <select name="add_print_products_categories" class="w-1">
                                        <option selected="" disabled="">Categories</option>
                                        </select>
                                    </div>
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
                                     <input type="text" placeholder="Count" name="add-product-add-count">
                                 </div>
                                 <div>
                                     <input type="text" placeholder="Price" name="add-product-add-Price">
                                     <div class="text-select w-1">
                                            <select name="add_print_products_valuable" class="w-2">
                                            <option selected="" disabled="">Valuable</option>
                                            <option value="USD">USD</option>
                                            <option value="RUB">RUB</option>
                                            <option value="AMD">AMD</option>
                                            </select>
                                      </div>
                                  </div>
                                 </div>

                        <div class="images add-products-images">
                   <div class="pic add-products-images">
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
                        <li><span id="add-products-reset" value="${value}">reset</span></li>
                        <li><span id="add-products-send" value="${value}">send</span></li>
                    </ul>
                </footer>
          </div>

    </div>`)

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
                    $("select[name=add_print_products_categories]").append(`<option value="${item.name}">${item.name}</option>`)
                })
            }
        }
    })
    AddProducts()
}
/////////////////////////////////end print modat add modat function = PMAP////////////////////////////////////////////////////////////
function AddProducts() {


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
                        $('.product-sizes-container .sizes').append(`


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
                        $('.product-lengths-container .lengths').append(`


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
    var new_AddProduct = new FormData();
    var photo = [];
    var photos = [];
    var onchange_add_my_shop_images = false;
    var  onchange_add_product_category = false;
    var onchange_add_product_valuable = false;
    var  add_product_sizes = false;
    var  add_product_lengths = false;
    var  add_product_colors = false;
    var button = $('.images.add-products-images .pic.add-products-images')
    var uploader = $('<input type="file" accept="image/*" />')
    var images = $('.images.add-products-images')




    photo.forEach(function (item) {
    })
    button.on('click', function () {
        uploader.click()
    })

    uploader.on('change', function () {
        var reader = new FileReader()
        reader.onload = function(event) {
            images.prepend('<div class="img add-products-images" value="'+uploader[0].files[0].name+'" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span class="addproductremoveimages">remove</span><span class="addproductmainimages">main</span></div>')
        }
        reader.readAsDataURL(uploader[0].files[0])
        photos.push(uploader[0].files[0])

        return onchange_add_my_shop_images = true;
    })

    $(document).on('click','.addproductremoveimages',function () {

        let removed = photos.findIndex(item => item.name == $(this).parent().attr('value'))
        photos.splice(removed)
        $(this).parent().remove()
        // FileReader remove item
    })

    $(document).on('click','.addproductmainimages',function () {
        $('.addproductmainimages').css('color','#34ffec')
        let main = $(this)
        main.css('color','red')
        new_AddProduct.append('add_product_photo_main',$(this).parent().attr('value'))
        // Photos main item
    })

    $("select[name=add_print_products_categories]").on('change', function () {
        new_AddProduct.append('add_product_category',$(this).val())
        return onchange_add_product_category = true;
    })

    $("select[name=add_print_products_valuable]").on('change', function () {
        new_AddProduct.append('add_product_valuable',$(this).val())
        return onchange_add_product_valuable = true;
    })

    $(document).on('click','.product-sizes-container .sizes .sizes-box',function () {
        $(this).css('border','3px solid red')
        new_AddProduct.append('add_product_sizes[]',$(this).attr('value'))
        return add_product_sizes = true;
    })

    $(document).on('click','.product-lengths-container .lengths .lengths-box',function () {
        $(this).css('border','3px solid red')
        new_AddProduct.append('add_product_lengths[]',$(this).attr('value'))
        return add_product_lengths = true;
    })

    $(document).on('click','.product-colors-container .colors .color-box',function () {
        $(this).css('border','3px solid red')
        new_AddProduct.append('add_product_colors[]',$(this).attr('value'))
        return add_product_colors = true;
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


    $(document).on('click','#add-products-send',function(e) {
        e.preventDefault();
        var name = $("input[name=add_products_name]").val();
        var description = $("input[name=add_products_description]").val();
        var count = $("input[name=add-product-add-count]").val();
        var price = $("input[name=add-product-add-Price]").val();
        new_AddProduct.append('name',name);
        new_AddProduct.append('description',description);
        new_AddProduct.append('count',count);
        new_AddProduct.append('price',price);
        new_AddProduct.append('myshop_id',$(this).attr('value'));
        for(var i = 0;i<photos.length;i++)
        {
            new_AddProduct.append('add_product_photos[]', photos[i])
        }
        if (onchange_add_my_shop_images == false)
        {
            new_AddProduct.append('add_product_photos','')
        }

        if (onchange_add_product_category == false)
        {
            new_AddProduct.append('add_product_category','')
        }

        if (onchange_add_product_valuable == false)
        {
            new_AddProduct.append('add_product_valuable','')
        }

        if (add_product_sizes == false)
        {
            new_AddProduct.append('add_product_sizes','')
        }

        if (add_product_lengths == false)
        {
            new_AddProduct.append('add_product_lengths','')
        }

        if (add_product_colors == false)
        {
            new_AddProduct.append('add_product_colors','')
        }

        $.ajax({

            type: 'POST',

            url: '/new_AddProduct',

            data: new_AddProduct,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.product){
                    autoDequeueSavehref('The product has been added',`product/not/${data.product}`)
                    $('.modal.a-p').remove()
                }
                else
                {
                    if (data.length > 0)
                    {
                        for (var i = 0;i<data.length;i++){
                            autoDequeueEror(data[i])
                        }
                    }
                }
            }
        })
        ////////////////////////end add product////////////////////////////////////
    })
}

