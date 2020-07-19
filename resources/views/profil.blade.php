@extends('layouts.app')

@section('content')
    <div class="profil-home mg us">
        <main>
            <div class="basket">
                <div class="container">
                    <div class="box">
                        <div class="img div"></div>
                        <div class="div">
                            <p class="n-10"></p>
                            <p><a href="/profile/message"><i class="fa fa-envelope" aria-hidden="true"></i></a><span>Непрочитанные сообщения:</span></p>
                        </div>
                    </div>
                </div>
                <div class="basket-labels p-u">
                    <ul>
                        <li class="item item-heading cursor add-my-shop ">Add my shop</li>
                        <li class="quantity wid-15"><a href="/profil/myorders">My orders</a></li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
            </div>
            @include('profil-menu')
        </main>
    </div>


@endsection

@section('js')
    <script src="{{ asset('js/product/add_product.js') }}"></script>
@endsection
