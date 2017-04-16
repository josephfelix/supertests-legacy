@include('index.header')

<div class="container" ng-controller="IndexController" ng-init="init()">

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- responsivositetesteweb.com -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-9156209932510160"
         data-ad-slot="8689609135"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <br />

    <div class="loading-container" ng-show="loading">
        <div class="dots-loader"></div>
        <p><strong>Carregando...</strong></p>
    </div>

    <div class="row" ng-hide="loading">
        @include('index.single')
    </div>
</div>

@include('index.footer')
