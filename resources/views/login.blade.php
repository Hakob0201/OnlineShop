<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<!--    <link rel="stylesheet" type="text/css" href="swiper.min.css">-->
    <link rel="stylesheet" type="text/css" href="{{asset('form/css/style2.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="rain">
    <div class="form_1">
        <div class="form_body">
            <form class="container2" action="{{url('/log/in')}}" method="post">
                    {{csrf_field()}}
                <h2 class="erors">{{$errors->first()}}</h2>
                <div class="row100">
                    <div class="col">
                        <div class="inputBox">
                            <input type="text" name="mobile_email" id="user" required="required" class="mobile-email del-eror">
                            <span class="text">Email addres</span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inputBox">
                            <input type="password" name="password" id="pass" required="required" class="password del-eror">
                            <span class="text">Password</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>

                            <button id="log_in">
                                Log IN
                            </button>


                            <a href="/registr" >
                                Registracia
                            </a>
                <div class="envelope">
                    <p>Forget Password ?</p>
                </div>
                </form>
            </div>
        </div>
    </div>
<div class="overlay">
    <div class="newsletter">
        <div class="close">
            <i class="fa fa-times"></i>
        </div>
        <div class="icons">
            <i class="fa fa-envelope-o"></i>
        </div>
        <h1>Newsletter</h1>
        <p>Stayp up</p>
        <div class="subscribe-form">
            <form class="f-p">
                <input type="email" placeholder="Enter Your Email Address" name="email" class="f-p-i">
                <div class="forgot-password f-p-b"><span>Send</span></div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('form/js/script1.js')}}"></script>
<script src="{{asset('form/js/script.js')}}"></script>
</html>
