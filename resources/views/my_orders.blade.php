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
                            <p><i class="fa fa-envelope" aria-hidden="true"></i><span>Непрочитанные сообщения:</span></p>
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

                @foreach($data as $key)
                    <div class="basket-labels">
                        <ul style="border-bottom: 1px solid#34ffec;">
                            <li class="item item-heading cursor">The total amount of the order payment</li>
                            <li class="subtotal" style="width: auto;    color: #34ff98;">During the order</li>
                            <li class="subtotal product_reviews" style="width: auto;    color: #34ff98;" value="{{$key->id}}">Product reviews</li>
                        </ul>
                        <ul>
                            <li class="item item-heading cursor add-my-shop ">{{$key->sum}}</li>
                            <li class="subtotal"  style="width: auto;color: #34ff98;">{{$key->created_at}}</li>
                        </ul>
                    </div>
                    @foreach($key->MyOrderDetalis as $orderdetalis)
                        <div class="basket-product">
                            <div class="item">
                                @foreach($orderdetalis->OrderDetailisProduct->ProductPhoto as $photo)
                                    @if ($photo->status == 'main')

                                        <div class="product-image">
                                            <img src='{{asset($photo->name)}}' alt="Placholder Image 2" class="product-frame">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="product-details">
                                    <h1><strong><span class="item-quantity">  {{$orderdetalis->OrderDetailisProduct->name}}</span></strong></h1>
                                    <p><strong>Navy, Size 18</strong></p>
                                    <p>Shop Code - 280349731</p>
                                </div>
                            </div>
                            <div class="price"> {{$orderdetalis->price}}</div>
                            <div class="quantity">
                               Count:  {{$orderdetalis->count}}
                            </div>
                            <div class="subtotal"> {{$orderdetalis->subtotal}}</div>
                            <div class="remove">
                                <button>Remove</button>
                            </div>

                        </div>
                    @endforeach
                    <div class="add-productreviews-container"><div class="add-productreviews-input-box"><input type="text" placeholder="Product reviews"> <div class="add-input-button"><i class="fa fa-check product_reviews" value="{{$key->id}}"></i></div></div></div>

                @endforeach
            </div>
            @include('profil-menu')
        </main>
    </div>


@endsection

