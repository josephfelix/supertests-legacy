@include('teste.header')

<div class="container" ng-controller="TesteController" ng-init="checkConnection()">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                @include('partials.adsense.responsive')

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

                    @include('partials.adsense.responsive')
                </div>
            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            @include('partials.adsense.banner300x600')
        </div>
        <!-- /Container do adsense -->
    </div>

    @include('teste.modal.conectar_facebook')

    <div class="loading-container" ng-show="loadingtestes">
        <div class="dots-loader"></div>
        <p><strong>Carregando...</strong></p>
    </div>

    <div class="mais-testes" ng-hide="loadingtestes" ng-init="carregarTestes('{{$id}}')">
        <h3><strong>Recomendados</strong></h3>
        <hr />
        <div class="row">
            @include('index.single')
        </div>
    </div>
</div>

@include('teste.footer')
