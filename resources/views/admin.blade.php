@extends('layouts.app')

@section('content')
    <div class="profil-home mg us">
{{--        <div class="nav">--}}
{{--            <div class="wrap">--}}
{{--                <ul>--}}
{{--                    <li>Мои заказы</li>--}}
{{--                    <li>Адреса доставки</li>--}}
{{--                    <li>Смена пароля</li>--}}
{{--                    <li><a href="/profil/add_scores">Добавить оценки</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
        <main>
            <div class="basket">

                <div id="app">

                </div>
            </div>
            @include('profil-menu')
        </main>
    </div>


@endsection

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
