@include('teste.header')

<div class="container" ng-controller="TesteController" ng-init="checkConnection()">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

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

                <!-- Loading container -->
                <div class="loading-container" ng-show="loading">
                    <div class="dots-loader"></div>
                    <p><strong>Por favor, aguarde...</strong></p>
                </div>

                <div class="teste-info" ng-show="!loading">
                    <div class="teste-shadow">
                        <img src="{{$cover}}"/>
                        <h2 class="teste-title">
                            <span>{{$title}}</span>
                        </h2>
                    </div>
                    <p class="teste-description">{{$description}}</p>
                    <button class="btn btn-lg btn-iniciar-teste" ng-click="iniciar('{{$guid}}')">
                        Iniciar teste
                    </button>

                    <hr class="hr-teste-single" />

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
                </div>
            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 300x600sitetesteweb.com -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:600px"
                 data-ad-client="ca-pub-9156209932510160"
                 data-ad-slot="1166342336"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <!-- /Container do adsense -->
    </div>

    @include('teste.modal.conectar_facebook')

    <div class="loading-container" ng-show="loadingtestes">
        <div class="dots-loader"></div>
        <p><strong>Carregando...</strong></p>
    </div>

    <div class="mais-testes" ng-hide="loadingtestes" ng-init="carregarTestes('{{$id}}')">
        <h2><strong>Recomendados</strong></h2>
        <hr />
        <div class="row">
            @include('index.single')
        </div>
    </div>
</div>

@include('teste.footer')
