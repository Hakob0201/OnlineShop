@extends('layouts.app')

@section('content')
    <div class="cart-container c-b">
        <main>
            <div class="basket">
                <div class="basket-module">
                    <label for="promo-code">Enter a promotional code</label>
                    <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                    <button class="promo-code-cta">Apply</button>
                </div>
                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading">Item</li>
                        <li class="price">Price</li>
                        <li class="quantity">Quantity</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
                @foreach($data_wishlist as $key)
                    <div class="basket-product">
                        <div class="item">
                            <div class="product-image">
                                <img src="{{asset($key->images)}}" alt="" class="product-frame">
                            </div>
                            <div class="product-details">
                                <h1><strong><span class="item-quantity">{{$key->count}}</span> x {{$key->name}}</strong></h1>
                                @if($key->size != "null")
                                    <p><strong> Size {{$key->size}}</strong></p>
                                @endif
                                @if($key->length != "null")
                                    <p><strong> Length {{$key->length}}</strong></p>
                                @endif
                                @if($key->color != "null")
                                    <p><strong> Color {{$key->color}}</strong></p>
                                @endif
                                {{--                            <p>Product Code - 232321939</p>--}}
                            </div>
                        </div>
                        <div class="price">{{$key->price}}</div>
                        <div class="quantity">
                            <input type="number" value="{{$key->count}}" min="1" class="quantity-field">
                        </div>
                        <div class="subtotal">{{$key->subtotal}}</div>
                        <div class="remove">
                            <button><a href="/removeWishlist/{{$key->id}}">Remove</a></button>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
@endsection
