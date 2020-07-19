@extends('layouts.app')

@section('content')
    <div class="top-viewing-games">
        <div class="carusel-btn">
            <div class="text">Live</div>
            <div class="carusel_btn">
                <span class="topgame_btn_next" id="topgame_btn_next"></span>
                <span class="topgame_btn_prev" id="topgame_btn_prev"></span>
                <div class="carusel-btn-box">
                    <span><img src="{{asset('images/magazin/images/Pause.png')}}" class="pausa" id="topgame_btn_pauze"/><img src="{{asset('images/magazin/images/Play.png')}}" class="play" id="topgame_btn_play"/></span>
                </div>
            </div>
        </div>
        <div id="game-vertical-ticker">
            <div class="video-box page1">
                <div class="videobox">
                    <figure>
                        <!-- Video Thumbnail Start -->
                        <a href="video-detail-double-sidebar.html">
                            <img src="{{asset("images/magazin/images/3.jpg")}}" alt="" class="img-responsive hovereffect" />
                        </a>
                        <!-- Video Thumbnail End -->
                        <!-- Video Title + Info Start -->
                        <figcaption>
                            <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>
                            <ul>
                                <li><i class="fa fa-heart"></i>1056</li>
                                <li><i class="fa fa-comments"></i>58</li>
                                <li><i class="fa fa-clock-o"></i>12:23</li>
                            </ul>
                        </figcaption>
                        <!-- Video Title + Info End -->
                    </figure>
                </div>
            </div>
            <div class="video-box page1">
                <div class="videobox">
                    <figure>
                        <!-- Video Thumbnail Start -->
                        <a href="video-detail-double-sidebar.html">
                            <img src="{{asset("images/magazin/images/4.jpg")}}" alt="" class="img-responsive hovereffect" />
                        </a>
                        <!-- Video Thumbnail End -->
                        <!-- Video Title + Info Start -->
                        <figcaption>
                            <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>
                            <ul>
                                <li><i class="fa fa-heart"></i>1056</li>
                                <li><i class="fa fa-comments"></i>58</li>
                                <li><i class="fa fa-clock-o"></i>12:23</li>
                            </ul>
                            <div class="clearfix"></div>
                        </figcaption>
                        <!-- Video Title + Info End -->
                    </figure>
                </div>
            </div>
            <div class="video-box page1">
                <div class="videobox">
                    <figure>
                        <!-- Video Thumbnail Start -->
                        <a href="video-detail-double-sidebar.html">
                            <img src="{{asset("images/magazin/images/9.jpg")}}" alt="" class="img-responsive hovereffect" />
                        </a>
                        <!-- Video Thumbnail End -->
                        <!-- Video Title + Info Start -->
                        <figcaption>
                            <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>
                            <ul>
                                <li><i class="fa fa-heart"></i>1056</li>
                                <li><i class="fa fa-comments"></i>58</li>
                                <li><i class="fa fa-clock-o"></i>12:23</li>
                            </ul>
                            <div class="clearfix"></div>
                        </figcaption>
                        <!-- Video Title + Info End -->
                    </figure>
                </div>
            </div>
            <div class="video-box page1">
                <div class="videobox">
                    <figure>
                        <!-- Video Thumbnail Start -->
                        <a href="video-detail-double-sidebar.html">
                            <img src="{{asset("images/magazin/images/7.jpg")}}" alt="" class="img-responsive hovereffect" />
                        </a>
                        <!-- Video Thumbnail End -->
                        <!-- Video Title + Info Start -->
                        <figcaption>
                            <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>
                            <ul>
                                <li><i class="fa fa-heart"></i>1056</li>
                                <li><i class="fa fa-comments"></i>58</li>
                                <li><i class="fa fa-clock-o"></i>12:23</li>
                            </ul>
                            <div class="clearfix"></div>
                        </figcaption>
                        <!-- Video Title + Info End -->
                    </figure>
                </div>
            </div>
            <div class="video-box page1">
                <div class="videobox">
                    <figure>
                        <!-- Video Thumbnail Start -->
                        <a href="video-detail-double-sidebar.html">
                            <img src="{{asset("images/magazin/images/7.jpg")}}" alt="" class="img-responsive hovereffect" />
                        </a>
                        <!-- Video Thumbnail End -->
                        <!-- Video Title + Info Start -->
                        <figcaption>
                            <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>
                            <ul>
                                <li><i class="fa fa-heart"></i>1056</li>
                                <li><i class="fa fa-comments"></i>58</li>
                                <li><i class="fa fa-clock-o"></i>12:23</li>
                            </ul>
                            <div class="clearfix"></div>
                        </figcaption>
                        <!-- Video Title + Info End -->
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="categori-game-container">
{{--        <div class="categori-game-item new-video-game">--}}
{{--            <div class="text">--}}
{{--                <div>--}}
{{--                    <p>NEWS</p>--}}
{{--                </div>--}}
{{--                <div class="text-select">--}}
{{--                    <select name="new-video" id="new-video">--}}
{{--                        <option selected disabled>Filtr</option>--}}
{{--                        <option value="pdf">PDF</option>--}}
{{--                        <option value="txt">txt</option>--}}
{{--                        <option value="epub">ePub</option>--}}
{{--                        <option value="fb2">fb2</option>--}}
{{--                        <option value="mobi">mobi</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div id="new-topviewing-ticker">--}}
{{--                <div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset("images/magazin/images/3.jpg")}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset("images/magazin/images/10.jpg")}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset("images/magazin/images/9.jpg")}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset("images/magazin/images/8.jpg")}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset("images/magazin/images/7.jpg")}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carusel-btn">--}}
{{--                <div class="carusel_btn">--}}
{{--                    <span class="topgame_btn_next" id="newgame_btn_next"></span>--}}
{{--                    <span class="topgame_btn_prev" id="newgame_btn_prev"></span>--}}
{{--                    <div class="carusel-btn-box">--}}
{{--                        <span><img src="{{asset('images/magazin/images/Pause.png')}}" class="pausa" id="newgame_btn_pauze"/><img src="{{asset('images/magazin/images/Play.png')}}" class="play" id="newgame_btn_play"/></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="categori-game-item">
            <!--            <div class="image2">-->
            <!--                <div>-->
            <!--                <img class="ii"  src="5.jpg" alt="">-->
            <!--                </div>-->
            <!--                <div>-->
            <!--                <img class="ii" src="6.jpg" alt="">-->
            <!--            </div>-->
            <!--                <div>-->
            <!--                <img class="ii" src="7.jpg" alt="">-->
            <!--        </div>-->
            <!--                <div>-->
            <!--                <img class="ii" src="8.jpg" alt="">-->
            <!--    </div>-->
            <!--            </div>-->
            <!--            <div class="pre">-->
            <!--                <a onclick="this.parentElement.style.display='none'"><i class="fa fa-times" aria-hidden="true"></i></a>-->
            <!--                <img id="p" src="6.jpg" alt="">-->
            <!--            </div>-->
            <div class="all-game-video">
                @foreach($products as $key)



                    <div class="video-box">
                        <div class="videobox">
                            <figure>
                                <!-- Video Thumbnail Start -->
                                <a href="/product/{{$key->category}}/{{$key->id}}">
                                    @foreach($key->ProductPhoto as $value)
                                        @if($value->status == 'main')
                                    <img src="{{asset("$value->name")}}" alt="" class="img-responsive hovereffect" />
                                        @endif
                                    @endforeach
                                </a>
                                <!-- Video Thumbnail End -->
                                <!-- Video Title + Info Start -->
                                <figcaption>
                                    <h2><a href="/product/{{$key->category}}/{{$key->id}}">{{$key->name}}</a></h2>
                                </figcaption>
                                <!-- Video Title + Info End -->
                            </figure>
                        </div>
                    </div>
                    @endforeach


            </div>
        </div>
{{--        <div class="categori-game-item many-views-game">--}}
{{--            <div class="text">--}}
{{--                <div>--}}
{{--                    <p>Many Views</p>--}}
{{--                </div>--}}
{{--                <div class="text-select">--}}
{{--                    <select name="many-views" id="many-views">--}}
{{--                        <option selected disabled>Filtr</option>--}}
{{--                        <option value="pdf">PDF</option>--}}
{{--                        <option value="txt">txt</option>--}}
{{--                        <option value="epub">ePub</option>--}}
{{--                        <option value="fb2">fb2</option>--}}
{{--                        <option value="mobi">mobi</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div id="game-topviewing-ticker">--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset('images/magazin/images/3.jpg')}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset('images/magazin/images/4.jpg')}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset('images/magazin/images/5.jpg')}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset('images/magazin/images/6.jpg')}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="video-box page1">--}}
{{--                    <div class="videobox">--}}
{{--                        <figure>--}}
{{--                            <!-- Video Thumbnail Start -->--}}
{{--                            <a href="video-detail-double-sidebar.html">--}}
{{--                                <img src="{{asset('images/magazin/images/7.jpg')}}" alt="" class="img-responsive hovereffect" />--}}
{{--                            </a>--}}
{{--                            <!-- Video Thumbnail End -->--}}
{{--                            <!-- Video Title + Info Start -->--}}
{{--                            <figcaption>--}}
{{--                                <h2><a href="video-detail-double-sidebar.html">Tempor ac ac, nisi</a></h2>--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-heart"></i>1056</li>--}}
{{--                                    <li><i class="fa fa-comments"></i>58</li>--}}
{{--                                    <li><i class="fa fa-clock-o"></i>12:23</li>--}}
{{--                                </ul>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </figcaption>--}}
{{--                            <!-- Video Title + Info End -->--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carusel-btn">--}}
{{--                <div class="carusel_btn">--}}
{{--                    <span class="topgame_btn_next" id="manyame_btn_next"></span>--}}
{{--                    <span class="topgame_btn_prev" id="manygame_btn_prev"></span>--}}
{{--                    <div class="carusel-btn-box">--}}
{{--                        <span><img src="{{asset('images/magazin/images/Pause.png')}}" class="pausa" id="manygame_btn_pauze"/><img src="{{asset('images/magazin/images/Play.png')}}" class="play" id="manygame_btn_play"/></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection

