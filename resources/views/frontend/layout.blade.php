<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ config('formable.site_title') }}{{ isset($pagetitle) ? ' | '.$pagetitle : '' }}</title>

        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        
        <!--<link href="{{ elixir('css/custom.css') }}" rel='stylesheet' type='text/css'>-->
        <link href="/css/custom.css?v=2" rel='stylesheet' type='text/css'>
        <!--<script src="{{ elixir('js/top.js') }}"></script>-->
        <script src="/js/top.js?v=2"></script>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

        <script>
        Vue.config.debug = true;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        </script>
    </head>
    <body>
        <div class="overlay-menu"> 
            <div class="uk-flex uk-flex-middle uk-flex-center uk-height-viewport">
                <div class="overlay-menu-ul">
                    {!! kalMenuBasic(['max_lvl' => 0]) !!}
                </div>
            </div>
        </div>

        <div class="menu-container border-radius">
            <div class="menu btn2" title="Opna valmynd">
                <div class="icon"></div>
            </div>
        </div>

        <div class="haus first-half">

            <div class="toppur" data-uk-sticky="{top: -300, clsactive: 'downer', animation: 'uk-animation-fade'}">
                <div class="inner uk-animation-fade">
                    <a href="/" class="logo smaller"><img src="/img/logo2.png" /></a>
                </div>
            </div>

            <?php

            $forsidumyndir = \App\Page::where('slug', '_forsidumyndir')->first()->getSubs();

            ?>

            <div class="uk-slidenav-position uk-overlay-active" data-uk-slideshow="{ autoplay: true, autoplayInterval: 5000, pauseOnHover: false }">
                <ul class="uk-slideshow {{ (frontpage() ? 'frontpage' : 'subpage') }}">
                    @foreach($forsidumyndir as $forsidumynd)
                        <li style="background: url('/imagecache/banner/{{ $forsidumynd->img()->first() }}') center center no-repeat; background-size: cover;">
                            @if(frontpage())
                                <div class="slideshow-overlay-content uk-overlay-panel uk-overlay-background uk-overlay-fade uk-flex uk-flex-center uk-flex-middle uk-text-center">
                                    <div class="uk-animation-slide-bottom uk-animation-fade">
                                        <div>
                                            <h2>{{ trim(strip_tags($forsidumynd->content)) }}</h2>
                                        </div>

                                        <div class="uk-margin-large-top uk-display-block">
                                            <a class="takki" href="{{ $forsidumynd->subtitle }}">Lesa meira<i class="uk-icon-caret-right uk-margin-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>

                @if(frontpage())
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                @endif
                </div>
            </div>
        </div>

        @if(!frontpage()) 

            <div class="content">

                {{--<div class="bg-grey1">
                    <div class="container container-center container-padding">
                        <h1 class="color-white uk-margin-remove uk-text-center">@yield('title', 'Titil vantar')</h1>
                    </div>
                </div>--}}
                <div class="bg-white-transparent crumbs-container">
                    <div class="container container-center">
                        {!! kalCrumbs() !!}
                    </div>
                </div>

                @yield('content')
            
            </div>

        @endif

        <div class="bg-grey2 intro-links">
            <div class="container container-center container-padding padding-large-top padding-large-bottom">
                <div class="uk-grid" data-uk-grid-match="{target:'.inner'}">
                    <div class="uk-width-medium-1-3 medium-margin-bottom">
                        <div class="inner">
                            <header>
                                <h2 class="nomarpad"><i class="uk-icon-heartbeat uk-margin-right uk-display-block uk-icon-medium uk-margin-small-bottom"></i>Hjartasjúkdómar</h2>
                            </header>
                            <p>Fróðleikur um hjartað, helstu flokkar hjarta-og æðasjúkdóma og áhættuþættir þeirra.</p>
                        </div>
                        <div>
                            <a class="takki takki-small takki-white" href="/hjartasjukdomar/">Skoða<i class="uk-icon-caret-right uk-margin-left"></i></a>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3 medium-margin-bottom">
                        <div class="inner">
                            <header>
                                <h2 class="nomarpad"><i class="uk-icon-user-md uk-margin-right uk-display-block uk-icon-medium uk-margin-small-bottom"></i>Rannsóknir</h2>
                            </header>
                            <p>Upplýsingar um algengustu rannsóknir sem framkvæmdar eru í Hjartamiðstöðinni.</p>
                        </div>
                        <div>
                            <a class="takki takki-small takki-white" href="/rannsoknir/">Skoða<i class="uk-icon-caret-right uk-margin-left"></i></a>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3 medium-margin-bottom">
                        <div class="inner">
                            <header>
                                <h2 class="nomarpad"><i class="uk-icon-question-circle uk-margin-right uk-display-block uk-icon-medium uk-margin-small-bottom"></i>Um okkur</h2>
                            </header>
                            <p>Kynntu þér starfsemi og markmið okkar.</p>
                        </div>
                        <div>
                            <a class="takki takki-small takki-white" href="/um-okkur/">Skoða<i class="uk-icon-caret-right uk-margin-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(frontpage())

            <div class="bg-white">
                <div class="container container-center container-padding padding-large-top padding-large-bottom">
                    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.inner'}">
                        <div class="uk-width-medium-1-2 medium-margin-bottom">
                            <div class="inner">
                                <header>
                                    <h2 class="nomarpad"><i class="uk-icon-map-marker uk-icon-medium uk-margin-right color-green"></i><span class="color-grey2">Staðsetning</span></h2>
                                </header>
                                <p>Gott aðgengi er að <strong>Holtasmára 1</strong> og nóg er af bílastæðum. Aðalstöðvar Hjartaverndar eru i sama húsi og er húsið því vel merkt með <strong>stóru rauðu hjarta á þakinu</strong>. Rauða hjartað er vörumerki Hjartaverndar.</p>
                                <p>Inngangur í Hjartamiðstöðina er bæði að <strong>norðan og sunnanverðu í húsinu</strong>. Hjartamiðstöðin er <strong>staðsett á 6. hæð</strong>. Góðar lyftur má finna um leið og komið er inn í andyri hússins.</p>
                                <a class="takki takki-small" target="_blank" href="http://ja.is/kort/?q=Hjartami%C3%B0st%C3%B6%C3%B0in%20ehf%2C%20Holtasm%C3%A1ra%201&x=359241&y=402668&z=9&type=map">Sjá kort á já.is<i class="uk-icon-link uk-margin-left"></i></a>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-2 medium-margin-bottom">
                            <div class="inner">
                                <header>
                                    <h2 class="nomarpad"><i class="uk-icon-clock-o uk-icon-medium uk-margin-right color-green"></i><span class="color-grey2">Opnunartímar</span></h2>
                                </header>
                                <p>Hjartamiðstöðin er <strong>opin alla virka daga frá kl. 8:30 til 16:00</strong>.<br />Tímabókanir eru í síma <strong>550 3030</strong>.</p><p>Einnig er hægt að senda beiðni um tíma á netfangið <a href="mailto:afgreidsla@hjartamidstodin.is">afgreidsla@hjartamidstodin.is</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endif

        <footer>
            <div class="bg-black">
                <div class="container container-center container-padding padding-large-top padding-large-bottom uk-text-center">
                    <p class="">Hjartamiðstöðin ehf | Holtasmári 1, 6. hæð | 201 Kópavogur | Sími 550 3030 | Fax 550 3039</p>
                </div>
            </div>
        </footer>

        <!--<script src="{{ elixir('js/custom.js') }}"></script>-->
        <script src="/js/custom.js?v=2"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '{{ env('GA') }}', 'auto');
          ga('send', 'pageview');
        </script>
    </body>
</html>
