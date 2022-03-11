@component('mail::message')
Olá, {{$nome}}

Você está recebendo este e-mail porque recebemos uma solicitação de acesso para você no
sistema Comunidade de Cristo.

Para acessar o sistema clique no botão.

@component('mail::button', ['url' => url('/login')])
Acessar
@endcomponent

Saudações,<br>
{{ config('app.name') }}

@slot('subcopy')
    @lang(
        "Se estiver com problemas para clicar no botão Acessar, copie e cole o URL abaixo\n".
        'no seu navegador:',
    ) <br> <span class="break-all"><a href="{{url('/login')}}">{{url('/login')}}</a></span>
@endslot
@endcomponent
