@extends('layouts.app')

@section('content')
    <div class="profil-home mg">
        <div class="nav">
            <div class="wrap">
                <ul>
                    <li>Мои заказы</li>
                    <li>Адреса доставки</li>
                    <li>Смена пароля</li>
                    <li><a href="/profil/add_scores">Добавить оценки</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="box">
                <form class="form-control" enctype="multipart/form-data">
                    <div class="input-box">
                        <label for="">имя</label>
                        <input type="text" name="product-name">
                    </div>
                    <div class="input-box">
                        <label for="">описание</label>
                        <input type="text" name="product-description">
                     </div>
                    <div class="input-box">
                        <label for="">фотографии</label>
                        <input type="file" name="product-photos">
                    </div>
                    <div class="input-box">
                        <button class="add_product">добавить товар</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


{{--    <form >--}}



{{--        <div class="form-group">--}}

{{--            <label>Name:</label>--}}

{{--            <input type="text" name="name" class="form-control" placeholder="Name" required="">--}}

{{--        </div>--}}



{{--        <div class="form-group">--}}

{{--            <label>Password:</label>--}}

{{--            <input type="password" name="password" class="form-control" placeholder="Password" required="">--}}

{{--        </div>--}}



{{--        <div class="form-group">--}}

{{--            <strong>Email:</strong>--}}

{{--            <input type="email" name="email" class="form-control" placeholder="Email" required="">--}}

{{--        </div>--}}



{{--        <div class="form-group">--}}

{{--            <button class="btn btn-success btn-submit">Submit</button>--}}

{{--        </div>--}}



{{--    </form>--}}
@endsection

