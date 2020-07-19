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
                <div class="p-10">
                    @foreach($key->MyShopProducts as $product)
                        <div class="p-s {{$product->id}}">
                            <div class="container">

                                <div class="top" style="">
                                    @foreach($product->ProductPhoto as $photo)
                                    @if ($photo->status == 'main' )

                                        <img src="{{asset($photo->name)}}" alt="">
                                    @endif
                                    @endforeach
                                </div>

                                <div class="bottom">
                                    <div class="left">
                                        <div class="details">
                                            <h1>{{$product->name}}</h1>
                                            <p>{{$product->price}}</p>
                                        </div>
                                        <div class="buy"><i class="fa fa-pencil e-p-u-s" value="{{$product->id}}"></i><i class="fa fa-times-circle e-p-u-r" value="{{$product->id}}"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="inside">
                                <div class="icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                                <div class="contents">
                                {{$product->description}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            @endforeach
            @include('profil-menu')
        </main>
    </div>


@endsection

