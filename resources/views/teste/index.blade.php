@include('teste.header')

<div class="container" ng-controller="TesteController" ng-init="checkConnection()">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                <img src="http://placehold.it/728x90"/>

                <div class="teste-info" ng-show="!loading">
                    <div class="teste-shadow">
                        <img src="{{$cover}}"/>
                        <h2 class="teste-title">
                            <span>{{$title}}</span>
                        </h2>
                    </div>
                    <button class="btn btn-success btn-lg btn-iniciar-teste" ng-click="iniciar()">Clique aqui para fazer
                        o teste!
                    </button>
                </div>
            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            <img src="http://placehold.it/300x600" width="100%"/>
        </div>
        <!-- /Container do adsense -->
    </div>

    @include('teste.modal.conectar_facebook')

</div>

@include('teste.footer')
