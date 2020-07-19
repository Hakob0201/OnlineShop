<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!--    <link rel="stylesheet" type="text/css" href="swiper.min.css">-->
    <link rel="stylesheet" type="text/css" href="{{asset('form/css/style2.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
</head>
<body>
    <div class="rain">
        <div>
            <form action="{{url('/signup/registr')}}" method="post">
                {{csrf_field()}}
                <div class="form_body">
                    <div class="container2">
                        <div class="registracia">
                            <div class="container">
                                <h2>Create a New Account</h2>
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox @if($errors->first('first_name')){{'form_errors'}}@endif" id="first_name">
                                            <input type="text" required="required" name="first_name"  class="first_name" value="{{old('first_name')}}">
                                            <span class="text">First Name</span>
                                            <span class="line"></span>
                                            <span class="error-msg">{{$errors->first('first_name')}}</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox @if($errors->first('last_name')){{'form_errors'}}@endif" id="last_name">
                                            <input type="text" required="required" value="{{old('last_name')}}" name="last_name"  class="last_name">
                                            <span class="text">Last Name</span>
                                            <span class="line"></span>
                                            <span class="error-msg">{{$errors->first('last_name')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox @if($errors->first('mobile_email')){{'form_errors'}}@endif" id="mobile_email">
                                            <input type="text" required="required" name="mobile_email"  class="mobile_email" value="{{old('mobile_email')}}">
                                            <span class="text">Mobile number or email</span>
                                            <span class="line"></span>
                                            <span class="error-msg">{{$errors->first('mobile_email')}}</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox @if($errors->first('new_password')){{'form_errors'}}@endif" id="new_password">
                                            <input type="password"  required="required" name="new_password" class="new_password" value="{{old('new_password')}}">
                                            <span class="text">New password</span>
                                            <span class="line"></span>
                                            <span class="error-msg">{{$errors->first('new_password')}}</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <div class="text-select">

                                                <select name="day" id="day"  class="day  @if($errors->first('day')){{'errors'}}@endif">
                                                    <option selected disabled>Day</option>


                                                </select>

                                                <select name="months" id="months" class="months @if($errors->first('months')){{'errors'}}@endif">
                                                    <option selected disabled>Months</option>
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>
                                                </select>
                                                <select name="year" id="year" class="year @if($errors->first('year')){{'errors'}}@endif">
                                                    <option selected disabled>Year</option>
                                                </select>
                                            </div>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox @if($errors->first('confirm_password')){{'form_errors'}}@endif" id="confirm_password">
                                            <input type="password" required="required" name="confirm_password"  class="confirm_password" value="{{old('confirm_password')}}">
                                            <span class="text">Confirm password</span>
                                            <span class="line"></span>
                                            <span class="error-msg">{{$errors->first('confirm_password')}}</span>
                                        </div>
                                    </div>

                                    <div class="gender" id='gender'>
                                        <label>
                                            <input type="radio" class="option-input radio  @if($errors->first('gender')){{'form_errors'}}@endif" name="gender" value="male"  />
                                            Male
                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio @if($errors->first('gender')){{'form_errors'}}@endif" name="gender" value="female" />
                                            Female
                                        </label>
                                    </div>
                                    <div class="confirm" id="term">
                                        <label>
                                            <input type="radio" class="option-input radio term @if($errors->first('confirm')){{'form_errors'}}@endif" name="confirm" value="true" />
                                            <a>I agree to the terms</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="row100">
                                    <div class="col">
                                        <button>Registr</button>
                                        <a href="/" id="reg_in">
                                            Log IN
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('form/js/script1.js')}}"></script>
<script src="{{asset('form/js/script.js')}}"></script>
</html>
