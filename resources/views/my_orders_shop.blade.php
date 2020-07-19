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
                    {{count($key->MyShopProducts)}}
                    @if(count($key->MyShopProducts)>0)
                        <div class="basket-labels">
                            <ul style="border-bottom: 1px solid#34ffec;">
                                <li class="item item-heading cursor">The total amount of the order payment</li>
                                <li class="subtotal" style="width: auto;    color: #34ff98;">During the order</li>
                            </ul>
                            <ul>
                                <li class="item item-heading cursor add-my-shop ">{{$key->MyShopProducts[0]->ProductOrderdetalis[0]->OrderProduct->sum}}</li>
                                <li class="subtotal"  style="width: auto;color: #34ff98;">{{$key->MyShopProducts[0]->ProductOrderdetalis[0]->OrderProduct->created_at}}</li>
                            </ul>
                            @foreach($key->MyShopProducts as $product)
                                @foreach($product->ProductOrderdetalis as $order_detalis)
                                    <div class="basket-product">
                                        <div class="item">
                                            @foreach($product->ProductPhoto as $photo)
                                                @if($photo->status == 'main')
                                                    <div class="product-image">
                                                        <img src='{{asset($photo->name)}}' alt="Placholder Image 2" class="product-frame">
                                                    </div>
                                                @endif
                                            @endforeach

                                            <div class="product-details">
                                                <h1><strong><span class="item-quantity">  {{$product->name}}</span></strong></h1>
                                                <p><strong>Navy, Size 18</strong></p>
                                                <p>Shop Code - 280349731</p>
                                            </div>
                                        </div>
                                        <div class="price"> {{$order_detalis->price}}</div>
                                        <div class="quantity">
                                            Count:  {{$order_detalis->count}}
                                        </div>
                                        <div class="subtotal"> {{$order_detalis->subtotal}}</div>
                                        <div class="remove">
                                            <button>Remove</button>
                                        </div>

                                    </div>

                                @endforeach
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            @include('profil-menu')
        </main>
    </div>


@endsection

