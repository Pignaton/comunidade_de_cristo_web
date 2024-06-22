<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon_io/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon_io/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets') }}/css/linktree.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<!--
           return view('pages.linktree.index', [
                'font_color' => $pagina->op_font_color,
                'profile_image' => url(asset('assets') . '/' . $pagina->op_profile_image),
                'titulo' => $pagina->op_title,
                'descricao' => $pagina->op_description,
                'fb_pixel' => $pagina->op_fb_pixel,
                'bg' => $bg,
                'links' => $links,
-->
<body>

<div>
    <div class="container container--title-image">
        <div class="col-xs-12">
            <div class="text-center" style="padding-top: 5px; padding-bottom: 30px;">
                <img src="{{asset('assets')}}/images/simbolo.png" class="linktree">
                <h5 style="color: #ffffff; padding-top: 20px;">{{$titulo}}</h5>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="social">
            <a href="https://www.instagram.com/comunidade.cristo/" target="_blank" rel="noopener noreferrer"
               class="social_link social_link_circle" style="background-color:#efefef;">
                <img class="social_icon" src="{{ asset('assets') }}/images/svg/instagram.svg">
            </a>
            <a href="https://spotify.com/your-username" target="_blank" rel="noopener noreferrer"
               class="social_link social_link_circle" style="background-color:#efefef;">
                <img class="social_icon" src="{{ asset('assets') }}/images/svg/spotify.svg">
            </a>
            <a href="https://www.youtube.com/@comunidadedecristo9767" target="_blank" rel="noopener noreferrer"
               class="social_link social_link_circle" style="background-color:#efefef;">
                <img class="social_icon" src="{{ asset('assets') }}/images/svg/youtube.svg">
            </a>
            <a href="https://www.facebook.com/comunidade.cristo/?locale=pt_BR" target="_blank" rel="noopener noreferrer"
               class="social_link social_link_circle" style="background-color:#efefef;">
                <img class="social_icon" src="{{ asset('assets') }}/images/svg/facebook.svg">
            </a>
        </div>
        <div class="col-xs-12">
            <div class="text-center">
                @foreach($links as $link)
                    <div style="padding-bottom: 30px;">
                        <button
                            onclick="location.href='{{$link->href}}'"
                            type="button" class="btn btn-outline-light {{$link->op_border_type}}"
                            style="width: 100%; padding-top:10px; padding-bottom:10px; font-weight: 600;">
                            {{$link->titulo}}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <small>
        <a href="https://ibcomunidadecristo.com.br" style="color: #34312f;" target="_blank">
            Desenvolvido por Igreja Batista Comunidade de Cristo
        </a>
    </small>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<!-- This pre-lander was created by Brandon Nilsson -->
<!-- You're welcome to edit, reproduce and change this template as long as original contributation stays present on the website at all times.  -->
</body>

</html>
