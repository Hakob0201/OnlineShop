@extends('layouts.app')

@section('content')
    <div class="profil-home mg us">
        <main class="w-100">
            <div class="basket" style="width: 100%">
                <div class="container">
                    <div class="box">
                        <div class="img div"></div>
                        <div class="div">
                            <p class="n-10"></p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i><span>Непрочитанные сообщения:</span></p>
                        </div>
                    </div>
                </div>
                @foreach($data as $key)
                <div class="container">
                    <div class="box">
                        <div class="img "><img src="{{asset($key->images)}}"></div>
                        <div class="div">
                            <p class="">{{$key->name}}</p>
                            <p><a href="/profile/myshops/{{$key->id}}/myorders">My orders</a></p>
                        </div>
                    </div>
                </div>
                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading cursor add-my-shop ">Add my shop</li>
                        <li class="quantity wid-15"><a href="/profil/myorders">My orders</a></li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
                <div class="g-2">
                    <div class="add-product-container">
                        <div class="add-product-title">Colors</div>
                        <div class="add-product-box">
                            <div class="colors d-g-colors"></div>
                        </div>
                    </div>
                    <div class="add-product-container">
                            <div class="add-product-title">Sizes</div>
                            <div class="add-product-box">
                                <div class="sizes d-g-colors">
                                </div>
                            </div>
                        </div>
                    <div class="add-product-container">
                        <div class="add-product-title">Lengths</div>
                        <div class="add-product-box">
                            <div class="lengths d-g-colors"></div>
                        </div>
                    </div>
                </div>


                    <div id="div1"  class="add_d_m_p">
                        <div class="c-a-sizes" value="sizes">
                            <div class="product-sizes-container">
                                <div class="sizes-name add_d_m_p_header">Product Sizes</div>
                                <div class="sizes a-p d-n d-g-sizes" id="drag_sizes">
                                </div>
                            </div>
                        </div>
                        <div class="c-a-lengths" value="lengths">
                            <div class="product-lengths-container">
                                <div class="lengths-name add_d_m_p_header">Product lengths</div>
                                <div class="lengths a-p d-n d-g-lengths">
                                </div>
                            </div>
                        </div>
                        <div class="c-a-colors" value="colors">
                            <div class="product-colors-container">
                                <div class="color-name add_d_m_p_header">Product Colors</div>
                                <div class="colors a-p d-n d-g-colors" >
                                </div>
                            </div>
                        </div>
                        <div class="c-s-img-color" value="colors-images">
                            <div class="text add_d_m_p_header">Color images</div>
                            <div class="text-img">
                                <div class="d-images a-p d-n">
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--                    <script>--}}
{{--                        function allowDrop(ev) {--}}
{{--                            ev.preventDefault();--}}
{{--                        }--}}

{{--                        function drag(ev) {--}}
{{--                            ev.dataTransfer.setData("text", ev.target.id);--}}
{{--                        }--}}

{{--                        function drop(ev,el) {--}}
{{--                            ev.preventDefault();--}}
{{--                            var data = ev.dataTransfer.getData("text");--}}

{{--                            el.insertBefore(document.getElementById(data),el.lastElementChild)--}}
{{--                            // ev.target.appendChild(document.getElementById(data));--}}
{{--                            let clas = document.getElementById(data).className;--}}
{{--                            var classvalue= $('#div1' + ' ' + '.'+clas).attr('value');--}}
{{--                            if($('.g-20').find('.'+clas + ' ' +  '.a-p').length > 0)--}}
{{--                            {--}}

{{--                                $('.'+clas).find('.a-p').removeClass('d-n')--}}
{{--                                var ur = `/PrintAdmin${$('#div1' + ' ' + '.'+clas).attr('value')}Product`;--}}
{{--                                console.log( el.lastElementChild)--}}
{{--                                $.ajax({--}}
{{--                                    type: "POST",--}}
{{--                                    url: ur,--}}
{{--                                    success: function(data){--}}
{{--                                        console.log(data)--}}
{{--                                        if (data.length > 0)--}}
{{--                                        {--}}
{{--                                            data.forEach(function (item) {--}}
{{--                                                if (classvalue == 'sizes')--}}
{{--                                                {--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).append(`<div value="${item.name}" class="sizes-box" draggable="true" id="drag1" ondragstart="drag(event)"><p>${item.name}</p></div>`)--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height','auto')--}}
{{--                                                }--}}
{{--                                                if (classvalue == 'lengths') {--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).append(`<div value="${item.name}" class="lengths-box"><p>${item.name}</p></div>`)--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height','auto')--}}
{{--                                                }--}}
{{--                                                if (classvalue == 'colors')--}}
{{--                                                {--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).append(` <div style="background: ${item.name}" value="${item.name}" class="color-box"><p></p></div>`)--}}
{{--                                                    $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height','auto')--}}
{{--                                                }--}}
{{--                                            })--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                });--}}
{{--                                if($('.g-20').find('.'+clas + ' ' +  '.d-images.a-p').length > 0)--}}
{{--                                $('.g-20').find('.'+clas + ' ' +  '.d-images.a-p').append(` <div class="add-color-img">--}}
{{--                                        add--}}
{{--                                    </div>`);--}}
{{--                                console.log($('.g-20').find('.'+clas + ' ' +  '.a-p').length)--}}

{{--                                var button = $('.add-color-img')--}}
{{--                                var uploader = $('<input type="file" accept="image/*" />')--}}
{{--                                var images = $('.d-images.a-p')--}}
{{--                                var photos = [];--}}



{{--                                // photo.forEach(function (item) {--}}
{{--                                // })--}}
{{--                                console.log(button)--}}
{{--                                button.on('click', function () {--}}
{{--                                    uploader.click()--}}
{{--                                })--}}

{{--                                uploader.on('change', function () {--}}
{{--                                    var reader = new FileReader()--}}
{{--                                    reader.onload = function(event) {--}}
{{--                                        images.prepend(`  <div class="grid">--}}
{{--                                <figure class="effect-goliath">--}}
{{--                                    <img src="${event.target.result}" value="${uploader[0].files[0].name}" alt="img24"/>--}}
{{--                                    <p class="remove_color_img">View more</p>--}}
{{--                                    <figcaption>--}}

{{--                                        <p id="d-223">When Goliath comes out, you should run.</p>--}}
{{--                                        <input type="text">--}}

{{--                                    </figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>`)--}}
{{--                                    }--}}
{{--                                    reader.readAsDataURL(uploader[0].files[0]);--}}
{{--                                    photos.push(uploader[0].files[0]);--}}
{{--                                    // photos.push(uploader[0].files[0])--}}

{{--                                    return onchange_add_my_shop_images = true;--}}
{{--                                })--}}

{{--                                $(document).on('click','.remove_color_img',function () {--}}

{{--                                    let removed = photos.findIndex(item => item.name == $(this).prev().attr('value'));--}}
{{--                                    photos.splice(removed);--}}
{{--                                    $(this).parent().remove();--}}
{{--                                    console.log($(this).prev().attr('value'));--}}
{{--                                    // FileReader remove item--}}
{{--                                })--}}
{{--                            }--}}
{{--                            else--}}
{{--                            {--}}
{{--                                $('.'+clas).find('.a-p').addClass('d-n');--}}
{{--                                if($('#div1').find('.'+clas + ' ' +  '.d-images.a-p').length > 0)--}}
{{--                                    $('#div1').find('.'+clas + ' ' +  '.d-images.a-p').empty();--}}
{{--                                console.log($('.g-2').find('.'+ classvalue).empty())--}}
{{--                                console.log($('#div1').find('.'+clas + ' ' +  '.d-images.a-p').length)--}}
{{--                            }--}}

{{--                        }--}}


{{--                    </script>--}}
                    <div class="g-20">
                    <div class="wrapper w-100" style="margin: 10px;">
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
                                            <option value="not">not</option><option value="telefon">telefon</option><option value="phone">phone</option><option value="video">video</option></select>
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
                        <div id="div2" class="w-100 add_d_m_p">

                        </div>
                        <footer>
                            <ul>
                                <li><span id="add-products-reset" value="1">reset</span></li>
                                <li><span id="add-products-send" value="1">send</span></li>
                            </ul>
                        </footer>
                    </div>
                </div>
            </div>
            @endforeach
        </main>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>



    <script>
        controler_drog_menu_add_product_l_c_s()
        function controler_drog_menu_add_product_l_c_s(){


            $( ".add_d_m_p" ).sortable({
                connectWith: ".add_d_m_p",
                handle: ".add_d_m_p_header",
                forcePlaceholderSize: true,
                animation: 150,
                sort: false,
                update: function(event, ui) {
                    if (this === ui.item.parent()[0]) {
                        let clas = $(ui.item).attr('class');
                        var classvalue = $(ui.item).attr('value');
                        if ($('.g-20').find('.' + clas + ' ' + '.a-p').length > 0) {

                            $('.' + clas).find('.a-p').removeClass('d-n')
                            var ur = `/PrintAdmin${classvalue}Product`;
                            $.ajax({
                                type: "POST",
                                url: ur,
                                success: function (data) {
                                    if (data.length > 0) {
                                        data.forEach(function (item) {
                                            if (classvalue == 'sizes') {
                                                $('.g-2' + ' ' + '.' + classvalue).append(`<div value="${item.name}" class="sizes-box"><p class="d-g-sizes-box">${item.name}</p></div>`)
                                                $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height', 'auto')
                                            }
                                            if (classvalue == 'lengths') {
                                                $('.g-2' + ' ' + '.' + classvalue).append(`<div value="${item.name}" class="lengths-box"><p class="d-g-lengths-box">${item.name}</p></div>`)
                                                $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height', 'auto')
                                            }
                                            if (classvalue == 'colors') {
                                                $('.g-2' + ' ' + '.' + classvalue).append(` <div style="background: ${item.name}" value="${item.name}" class="color-box"><p class="d-g-colors-box"></p></div>`)
                                                $('.g-2' + ' ' + '.' + classvalue).parent().parent().css('height', 'auto')
                                                controler_drog_menu_add_product_colors()
                                            }
                                        })
                                    }
                                }
                            });
                            if ($('.g-20').find('.' + clas + ' ' + '.d-images.a-p').length > 0)
                                $('.g-20').find('.' + clas + ' ' + '.d-images.a-p').append(` <div class="add-color-img">
                                        add
                                    </div>`);

                            var button = $('.add-color-img')
                            var uploader = $('<input type="file" accept="image/*" />')
                            var images = $('.d-images.a-p')
                            var photos = [];


                            button.on('click', function () {
                                uploader.click()
                            })

                            uploader.on('change', function () {
                                var reader = new FileReader()
                                reader.onload = function (event) {
                                    images.prepend(`  <div class="grid">
                                <figure class="effect-goliath">
                                    <img src="${event.target.result}" value="${uploader[0].files[0].name}" alt="img24"/>
                                    <p class="remove_color_img">View more</p>
                                    <figcaption>

                                       <input type="text">

                                    </figcaption>
                                </figure>
                            </div>`)
                                }
                                reader.readAsDataURL(uploader[0].files[0]);
                                photos.push(uploader[0].files[0]);
                                // photos.push(uploader[0].files[0])

                                return onchange_add_my_shop_images = true;
                            })

                            $(document).on('click', '.remove_color_img', function () {

                                let removed = photos.findIndex(item => item.name == $(this).prev().attr('value'));
                                photos.splice(removed);
                                $(this).parent().remove();
                                // FileReader remove item
                            })
                        } else {
                            $('.' + clas).find('.a-p').addClass('d-n');

                            if ($('#div1').find('.' + clas + ' ' + '.a-p').length > 0)
                                $('.g-2').find('.' + classvalue ).empty();
                            $('.g-2').find('.' + classvalue ).css('padding','0')
                            $('#div1').find('.' + classvalue + ' ' + '.a-p').empty();
                            console.log( $('.g-2').find('.' + classvalue + '.a-p'))
                            $('.g-2' + ' ' + '.' + classvalue).parent().parent().height('')
                        }

                    }
                }
            });
        }

        function controler_drog_menu_add_product_colors() {
            console.log($(".d-g-colors"))
            console.log($(".d-g-colors-box"))
            // $(".d-g-colors").sortable({
            //     connectWith: ".d-g-colors",
            //     handle: ".d-g-colors-box",
            //     forcePlaceholderSize: true,
            //     animation: 150,
            //     sort: false,
            //     update: function (event, ui) {
            //         if (this === ui.item.parent()[0]) {
            //             let clas = $(ui.item).attr('class');
            //             var classvalue = $(ui.item).attr('value');
            //         }
            //     }
            // })



            for (var i = 0; i < $(d-g-colors).length; i++) {
                new Sortable($(d-g-colors)[i], {
                    group: 'nested',
                    animation: 150,
                    fallbackOnBody: true,
                    swapThreshold: 0.65
                });
            }
        }

        function controler_drog_menu_add_product_sizes() {
            $(".d-g-sizes").sortable({
                connectWith: ".d-g-sizes",
                handle: ".d-g-sizes-box",
                forcePlaceholderSize: true,
                animation: 150,
                sort: false,
                update: function (event, ui) {
                    if (this === ui.item.parent()[0]) {
                        let clas = $(ui.item).attr('class');
                        var classvalue = $(ui.item).attr('value');
                    }
                }
            })
        }

        function controler_drog_menu_add_product_lengths() {
            $(".d-g-lengths").sortable({
                connectWith: ".d-g-lengths",
                handle: ".d-g-lengths-box",
                forcePlaceholderSize: true,
                animation: 150,
                sort: false,
                update: function (event, ui) {
                    if (this === ui.item.parent()[0]) {
                        let clas = $(ui.item).attr('class');
                        var classvalue = $(ui.item).attr('value');
                    }
                }
            })
        }
    </script>
@endsection

