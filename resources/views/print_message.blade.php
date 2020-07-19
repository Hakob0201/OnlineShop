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
                <div class="AdminShowMessageComponent">
                    @foreach($data as $key)
                    <div class="mail-wrapper" style="display: block;">
                        <div class="mail-top shadow">
                            <div class="mail-subject">Feedback: {{$key->MessageSender->email}} Subjeqt: {{$key->subject}}</div>
                            <div class="mail-action">

                            </div>
                        </div>
                        <div class="mail-content" style="display: block;">
                            <div class="mail-body ">
                                <div class="image"><img src="/images/difold/user_male.png">
                                </div> <div class="someClass"><div class="sender">
                                        <span>{{$key->MessageSender->name}}</span>
                                        <span>{{$key->MessageSender->surname}}</span>
                                    </div>
                                    <div class="message">
                                        {{$key->message_text}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @include('profil-menu')
        </main>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/magazin/message.js') }}"></script>
@endsection

