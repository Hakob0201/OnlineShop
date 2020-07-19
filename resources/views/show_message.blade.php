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
              <div id="message_us" class="AdminInboxComponet">

              </div>
            </div>
            @include('profil-menu')
        </main>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/magazin/message.js') }}"></script>
@endsection

