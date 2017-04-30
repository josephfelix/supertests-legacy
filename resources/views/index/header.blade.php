<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! SEO::generate() !!}

    <meta property="fb:app_id" content="{{env('FB_APP_ID')}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/testesweb.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One" rel="stylesheet">

    <!-- Angular 1.6 -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.3/angular.min.js"></script>

    <!-- UI Bootstrap -->
    <script type="text/javascript" src="{{ asset('js/ui-bootstrap.min.js') }}"></script>

    <!-- Angular module -->
    <script type="text/javascript">
        angular.module('supertests', ['ui.bootstrap']);
    </script>

    <!-- Controllers -->
    <script type="text/javascript" src="{{ asset('js/controllers/IndexController.js') }}"></script>

    <script type="text/javascript">
        window.logado = <?php echo (int)app('request')->session()->has('logged'); ?>;
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '{{env('FB_APP_ID')}}',
                xfbml      : true,
                cookie     : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    @include('partials.analytics')
</head>

<body ng-app="supertests">
    <div class="fb-root"></div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-9 col-sm-9">
                    <h1 class="pull-left">
                        <a href="{{ url('/') }}">#TESTESWEB</a>
                    </h1>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-3 col-sm-3">
                    @include('partials.user_card')
                </div>
            </div>
        </div>
    </header>