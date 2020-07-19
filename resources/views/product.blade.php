@extends('layouts.app')

@section('content')
    @foreach($product as $key)
    <div class="product-container">
        <div class="product">
            <div class="photo-box">
            <div class="product-small-img">
                @foreach($key->ProductPhoto as $photo)
                <img src="{{asset($photo->name)}}" onclick="myFunction(this)" alt="">
                    @endforeach
            </div>
            <div class="img-container">
                @foreach($key->ProductPhoto as $photo)
                    @if($photo->status == 'main')

{{--                        <img id="product-img-box" class="product-img-box main" src="{{asset($photo->name)}}" value="{{$photo->name}}" alt="">--}}
                        <img id="product-img-box" class="drift-demo-trigger product-img-box main" data-zoom="{{asset($photo->name)}}" src="{{asset($photo->name)}}" value="{{$key->Productshop->images}}">
                    @endif
                @endforeach
            </div>
            </div>
            <div class="information-box">
                <div class="container">
            <div class="description">
                <h1 class="p-n">{{$key->name}}</h1>
                <p>{{$key->description}}</p>
                <div class="number">
{{--                    <span class="minus">-</span>--}}
                    <input type="number" value="1"/>
{{--                    <span class="plus">+</span>--}}
                    <p class="count"><span>{{$key->count}}</span> шт.</p>
                    <div class="price">{{$key->price}}</div>
                    <div class="valuable">{{$key->valuable}}</div>
                    <div class="subtotal"></div>
                </div>
                @if (count($key->ProductSiazes) > 0)
                    <div class="sizes cart">
                        <div class="text">Sizes</div>
                        <div class="text-sizes">
                            <div class="d-sizes">
                                @foreach($key->ProductSiazes as $sizes)
                                    <div value="{{$sizes->name}}" class="sizes-box c-s"><p>{{$sizes->name}}</p></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if (count($key->ProductLengths) > 0)
                    <div class="lengths cart">
                        <div class="text">Lengths</div>
                        <div class="text-lengths">
                            <div class="d-lengths">
                                @foreach($key->ProductLengths as $lengths)
                                    <div value="{{$lengths->name}}" class="lengths-box c-l"><p>{{$lengths->name}}</p></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="color cart">
                    <div class="text">Color</div>
                    <div class="text-img">
                        <div class="d-color">
                            @foreach($key->ProductColors as $colors)
                                <div style="background: {{$colors->name}}" value="{{$colors->name}}" class="color-box c-c"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="color">
                    <div class="text">Color</div>
                    <div class="text-img">
                        <div class="d-images">
                            <img src="{{asset('images/magazin/img/product01.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product03.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product06.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product08.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product03.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product01.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product03.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product06.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product08.png')}}" onclick="myFunction(this)" alt="">
                            <img src="{{asset('images/magazin/img/product03.png')}}" onclick="myFunction(this)" alt="">
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button class=" add-product  cursor" value="{{$key->id}}">Buy now</button>
                    <button class=" add-product-wishlist  cursor" value="{{$key->id}}"><i class="fa fa-heart"></i></button>
                    <button class=" add-product-cart  cursor" value="{{$key->id}}">Add to Cart</button>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    <div class="shop-info">
        <div class="shop-info item-1">
            @foreach($product as $key)
                <div class="card-container">
                    <span class="pro">PRO</span>
                    <img src="{{asset($key->Productshop->images)}}" alt="user">
                    <h3>{{$key->Productshop->name}}</h3>
{{--                    <h6>Nodia, U.P.</h6>--}}
{{--                    <p>User interface designer and <br> front-end developer</p>--}}
{{--                    <div class="buttons">--}}
{{--                        <button class="primary">--}}
{{--                            Message--}}
{{--                        </button>--}}
{{--                        <button class="primary ghost">--}}
{{--                            Following--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="skills">--}}
{{--                        <h6>Skills</h6>--}}
{{--                        <ul>--}}
{{--                            <li>UI / UX</li>--}}
{{--                            <li>Front End Development</li>--}}
{{--                            <li>HTML</li>--}}
{{--                            <li>CSS</li>--}}
{{--                            <li>JavaScript</li>--}}
{{--                            <li>React</li>--}}
{{--                            <li>Node</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                @endforeach
        </div>
        <div class="shop-info item-2">
            @foreach($fidback as $key)
            <div class="feedback-list-wrap">
                <div class="feedback-item clearfix">
                    <div class="fb-user-info">
									<span class="user-name">
						    						<a>{{$key->MyOrderUsers->name}}</a>
    					    				</span>
                        <div class="user-country"><b class="css_flag css_nl">NL</b></div>            </div>
                    <div class="fb-main">
                        <div class="f-rate-info">
                            <span class="star-view"><span style="width:20%"></span></span>
                        </div>
                        <div class="user-order-info">
                    																									     <span class="first">
									<strong>Price:</strong>
																			 {{$key->MyOrderDetalis[0]->price}}
																	</span>
                            <span>
						  <strong>Delivery: {{$key->MyOrderDetalis[0]->OrderDetailisProduct->name}}</strong>
                        </span>
                        </div>
                        <div class="f-content">
                            <dl class="buyer-review">
                                <dt class="buyer-feedback">
                                    <span>{{$key -> feedback}}</span>
                                    <span class="r-time-new"> {{$key -> updated_at}}</span>
                                </dt>
                                <div class="j-digg-info-new util-right">
                                    <span class="thf-digg-text">Was this review helpful to you?</span>
                                    <span class="thf-digg-useful thf-digg-btn-new">
									<span>Да</span>
									(<span class="thf-digg-num">0</span>)
								</span>
                                    <span class="thf-digg-useless thf-digg-btn-new">
									<span>Нет</span>
									(<span class="thf-digg-num">0</span>)
								</span>
                                    <span class="digg-loading"></span>
                                </div>
                                <input type="hidden" class="digg-token" value="">
                                <input id="feedback-new-10017654404111124" class="feedback-id" type="hidden" value="10017654404111124">
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

<div class="detail">
</div>
@section('js')
    <script type="text/javascript" src="{{asset('js/magazin/product.js')}}"></script>
    <script src="{{asset('js/dist/Drift.js')}}"></script>
    <script>
        // new Drift(document.querySelector('.drift-demo-trigger'), {
        //
        //     .: document.querySelector('.detail'),
        //     inlinePane: 900,
        //     inlineOffsetY: -85,
        //     containInline: true,
        //     hoverBoundingBox: true
        // });
        // $('.drift-demo-trigger').hover(function() {
        //     $('.detail').fadeOut( 100 );
        //     $( '.detail').fadeIn( 100 );
        // });
    </script>
@endsection
