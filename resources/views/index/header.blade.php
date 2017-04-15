<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('TITLE')}}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/testesweb.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

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
</head>

<body ng-app="supertests">
    <div class="fb-root"></div>
    <header>
        <div class="container">
            <h1 class="pull-left">
                <a href="{{ url('/') }}">TestesWeb.com</a>
            </h1>

            @include('partials.user_card')
        </div>
    </header>