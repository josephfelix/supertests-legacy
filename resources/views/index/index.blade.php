@include('index.header')

<div class="container" ng-controller="IndexController" ng-init="init()">

    <div class="loading-container" ng-show="loading">
        <div class="dots-loader"></div>
        <p><strong>Carregando...</strong></p>
    </div>

    <div class="row" ng-hide="loading">
        @include('index.single')
    </div>
</div>

@include('index.footer')
