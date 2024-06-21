<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets') }}/css/linktree.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
<div>
    <div class="container">
        <div class="col-xs-12">
            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                <img src="{{asset('assets')}}/images/simbolo.png" class="linktree">
                <h2 style="color: #ffffff; padding-top: 20px;">Igreja Batista Comunidade de Cristo</h2>
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
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='{{route('linktree.agenda')}}'" type="button"
                            class="btn btn-outline-light"
                            style="width: 90%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Confira nossa
                        programação de @php echo getNomeMes(date('n')) @endphp </button>
                </div>
                <!--<div style="padding-bottom: 30px;">
                    <button onclick="location.href='http://bit.ly/2SVZXES'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Guide: Increasing Your Engagement</button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">View My YouTube Channel</button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Connect On LinkedIn</button>
                </div>-->
                <div style="padding-bottom: 30px;">
                    <button
                        onclick="location.href='https://docs.google.com/forms/d/e/1FAIpQLSfonJjheBfz1afFORjNWBCfnksxWQAZXi9nLDrEI5m-vVJWRg/viewform'"
                        type="button" class="btn btn-outline-light"
                        style="width: 90%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Forms Primeiro
                        Contato
                    </button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light"
                            style="width: 90%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Inscrição MMR
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <a href="https://kalweb.com.br/" style="color: #34312f;" target="_blank">Desenvolvido por Igreja Batista Comunidade
        de Cristo</a>
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
