@include('teste.header')

<div class="container" ng-controller="TesteController">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                <img src="http://placehold.it/728x90"/>

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
                    <button class="btn btn-success btn-lg btn-iniciar-teste" ng-click="iniciar()">Clique aqui para fazer
                        o teste!
                    </button>
                </div>
            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            <img src="http://placehold.it/300x600"/>
        </div>
        <!-- /Container do adsense -->
    </div>

    <script type="text/ng-template" id="conectar_facebook.html">
        <div class="modal-header">
            <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true" ng-click="fecharModal()">&times;</button>
            <h4 class="modal-title pull-left" id="modal-title" align="center"><strong>CONECTE SEU FACEBOOK!!</strong></h4>
        </div>
        <div class="modal-body" id="conectar_facebook" align="center">
            <p>Para realizar o teste, é necessário entrar usando sua conta do facebook, clique no botão abaixo para continuar.</p>
            <button class="btn btn-primary btn-lg" ng-click="loginFacebook()">
                <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Entrar com facebook
            </button>
        </div>
    </script>

</div>

@include('teste.footer')
