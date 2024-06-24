<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/images/favicon_io/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon_io/favicon-16x16.png">
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
            <div class="text-center" style="margin-top: -4rem; padding-bottom: 30px;">
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
