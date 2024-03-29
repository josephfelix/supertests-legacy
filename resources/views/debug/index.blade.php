<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TestesWeb.com - Debugger</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/testesweb.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile.css') }}"/>
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
    <script type="text/javascript" src="{{ asset('js/controllers/DebugController.js') }}"></script>

    @include('partials.onesignal')
    @include('partials.analytics')
</head>

<body ng-app="supertests">
<header>
    <div class="container">
        <h1 class="pull-left">
            <a href="{{ url('/') }}">#TESTESWEB - Debugger</a>
        </h1>
    </div>
</header>

<div class="container" ng-controller="DebugController">
    <div class="row">

        <div class="col-lg-10 col-md-10 col-xs-8 col-sm-8">
            <img ng-mousemove="countPixels($event)" ng-init="init()" id="imagem" src="{{url('debug/image/' . $guid)}}"
                 ismap/>
        </div>

        <div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">
            <div class="thumbnail">
                <div class="caption text-center">
                    <h3>Coordenadas</h3>
                    <p>
                        Largura: @{{coordinates.left}}<br/>
                        Altura: @{{coordinates.top}}
                    </p>
                </div>
            </div>
            <div class="thumbnail">
                <div class="caption text-center">
                    <h3>Enviar</h3>
                    <p>
                        <button type="button" class="btn btn-primary" ng-click="enviarTeste('{{$guid}}')">
                            <i class="fa fa-upload"></i>&nbsp;Enviar teste
                        </button>
                    </p>
                    <p ng-show="message.length">
                        @{{message}}<br />
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
