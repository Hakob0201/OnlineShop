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
              @foreach($data_cart as $key)
                <div class="basket-product" value="{{$key->id}}">
                    <div class="item">
                        <div class="product-image">
                            <img src="{{asset($key->images)}}" alt="Placholder Image 2" class="product-frame">
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
                        <button value="{{$key->id}}"><a href="/removeCart/{{$key->id}}">Remove</a></button>
                        <button style="float: left" ><a href="/card/stripe/{{$key->id}}">To buy</a></button>
                    </div>
                </div>
                  @endforeach
            </div>
            <aside>
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
                    <div class="summary-subtotal">
                        <div class="subtotal-title">Subtotal</div>
                        <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                        <div class="summary-promo hide">
                            <div class="promo-title">Promotion</div>
                            <div class="promo-value final-value" id="basket-promo"></div>
                        </div>
                    </div>
{{--                    <div class="summary-delivery">--}}
{{--                        <select name="delivery-collection" class="summary-delivery-selection">--}}
{{--                            <option value="0" selected="selected">Select Collection or Delivery</option>--}}
{{--                            <option value="collection">Collection</option>--}}
{{--                            <option value="first-class">Royal Mail 1st Class</option>--}}
{{--                            <option value="second-class">Royal Mail 2nd Class</option>--}}
{{--                            <option value="signed-for">Royal Mail Special Delivery</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="summary-total">
                        <div class="total-title">Total</div>
                        <div class="total-value final-value" id="basket-total">130.00</div>
                    </div>
                    <div class="summary-checkout">
                        <a href="/card/stripe" class="checkout-cta">Go to Secure Checkout</a>
                    </div>
                </div>
            </aside>
        </main>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/magazin/cart.js')}}"></script>
@endsection