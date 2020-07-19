<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Title</title>


    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/magazin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/magazin/futer.css')}}">
    <link rel="stylesheet" href="{{asset('css/magazin/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/magazin/MG_profil.css')}}">
    <link rel="stylesheet" href="{{asset('css/magazin/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/magazin/logo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/magazin/jquery.totemticker.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            // $('#game-vertical-ticker').totemticker({
            //     row_height	:	'100px',
            //     next		:	'#topgame_btn_next',
            //     previous	:	'#topgame_btn_prev',
            //     stop		:	'#topgame_btn_pauze',
            //     start		:	'#topgame_btn_play',
            //     mousestop	:	true,
            //     margin1      :  "marginLeft"
            // });
            $(".play").click(function() {
                $(".play").hide(1000);
                $(".pausa").show(100)
            })
            $(".pausa").click(function () {
                $(".play").show(1000);
                $(".pausa").hide(1000);
            })
        });
        // $(function(){
        //     $('#game-topviewing-ticker').totemticker({
        //         row_height	:	'100px',
        //         next		:	'#newgame_btn_next',
        //         previous	:	'#newgame_btn_prev',
        //         stop		:	'#newgame_btn_pauze',
        //         start		:	'#newgame_btn_play',
        //         mousestop	:	true,
        //         margin1      :  "marginTop"
        //     });
        //     $(".play").click(function() {
        //         $(".play").hide(1000);
        //         $(".pausa").show(100)
        //     })
        //     $(".pausa").click(function () {
        //         $(".play").show(1000);
        //         $(".pausa").hide(1000);
        //     })
        // });
    </script>
</head>
<body>
<header class="header-categoria">
    <nav class="active header_menu navbar-collapse">
        <ul style="float:left;">
            <li><a href="/index">Home</a></li>
            <li><a href="/ubout">Ubout</a></li>
            <li>
                <a href="lang/en"><img class="flag" src="https://c7.hotpng.com/preview/56/913/75/5bbc1df22ed91.jpg" title="english"></a>
            </li>
            <li>
                <a href="lang/ru"><img class="flag" src="https://cdn.countryflags.com/thumbs/russia/flag-round-250.png" title="русский"></a>
            </li>
            <li>
                <a href="lang/hy"><img class="flag" src="https://vectorflags.s3.amazonaws.com/flags/am-sphere-01.png" title="Հայերեն"></a>
            </li>
            </ul>

        <ul class="ul-box">
            <li>
                <div class="user_accaunt">
                    @if (Session::has('id'))
                    <div class="us-inf">
{{--                        <a href="/profile" class="user-img"><img src="" alt=""></a>--}}
                    </div>
{{--                    <p id="open_user_set_mod"><a>{{$data->name}} </a></p>--}}
                        @else
                        <div>
                            <p> <a href="/">log in</a> </p>
                        </div>
                        <p style="padding: 0 0 0 16px;"><a href="/registr"> registracia </a></p>
                        @endif
                </div>
            </li>
        </ul> <!--end navbar-right -->
    </nav>
    <div class="user-settings-bar">
        <div class="buttom">
                <a href="/logout">Log out</a>
        </div>
    </div>

</header>
<section class="logobar">
    <div class="logo-wrap">
        <div class="cube">
            <img src="data:image/png;base64,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" alt="">
            <img src="data:image/png;base64,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" alt="">
            <img src="data:image/png;base64,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" alt="">
            <img src="data:image/png;base64,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" alt="">
            <img src="data:image/png;base64,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" alt="">
            <img src="data:image/png;base64,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" alt="">
        </div>
    </div>
    <div class="searchbox">
        <form action="{{url('/search')}}" method="post">
            {{csrf_field()}}
            <ul>
                <div><input type="text" placeholder="{{ __('translate.Search...') }}" name="search" @if(isset($search_rezult)) value="{{$search_rezult}}"@endif></div>
                <div class="pull-right"><button class="search">GO</button></div>
            </ul>
        </form>
    </div>
    <div class="advertisment-start">
        <a href="#"><img src="{{asset('images/magazin/images/adv.gif')}}" alt=""></a>
    </div>
</section>
<section id="content">
    <header class="header-categoria">
        <nav class="active header_menu navbar-collapse">
            <ul style="float:left;" class="data_categories">
{{--                @foreach($category as $key)--}}
{{--                    <li><a href="/category/{{$key->code}}">  {{$key->name}}</a></li>--}}
{{--                @endforeach--}}
            </ul>
            <ul class="navbar-right">
                <li><a href="/{{md5('productcart')}}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a></li>
            </ul> <!--end navbar-right -->
            <ul class="navbar-right">
                <li><a href="/productcart/wishlist"><i class="fa fa-heart"></i> My desires <span class="badge">3</span></a></li>
            </ul> <!--end navbar-right -->
        </nav>
        <div class="menu-toggle">
            <div class="menu-btn">
                <div class="menu-btn_burger"></div>
            </div>
        </div>
    </header>

@section('content')
    @show

</section>
@if(Auth::id())
<article>
    <div class="floating-btn" id="open-message-platform">
        <div class="btn-wrapper">
            <button class="action-btn"></button>
        </div>
    </div>
</article>
<div class="msg-wrapper">
    <div class="msg-compose-container">
            <div class="empty-cell"></div>
    </div>
</div>
@endif
<div id="top">
    <a href="#"><img src="{{asset('images/magazin/images/top1.gif')}}" alt=""></a>
</div>
<div class="notification"></div>
</body>
@section('js')
@show
<script type="text/javascript" src="{{asset('js/magazin/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/magazin/infoadmin.js')}}"></script>
<script type="text/javascript" src="{{asset('js/magazin/notification.js')}}"></script>


<script type="text/javascript">

    //    var _gaq = _gaq || [];
    //    _gaq.push(['_setAccount', 'UA-36251023-1']);
    //    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    //    _gaq.push(['_trackPageview']);
    //
    // (function() {
    //     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    //     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    //     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    // })();
    var scroll = document.getElementById("top");
    window.addEventListener("scroll",function () {
        var rotate = window.pageYOffset+"deg"
        scroll.style.transform ="rotate("+window.pageYOffset+"deg)"

    })
</script>

<script>
    function myFunction(smallImg) {
        var fullImg = document.getElementById('product-img-box');
        fullImg.src = smallImg.src
    }
</script>

<script>
    var p = $("#p");
    // console.log(p.attr("src"))

    // var o=p.attr("src")
    $(".ii").click(function () {


        console.log(p.attr("src",this.src))

    })

    // console.log(o)
</script>
</html>
