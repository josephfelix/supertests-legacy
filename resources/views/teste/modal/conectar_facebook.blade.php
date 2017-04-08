<script type="text/ng-template" id="conectar_facebook.html">
    <div class="modal-header">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true" ng-click="fecharModal()">&times;</button>
        <h4 class="modal-title pull-left" id="modal-title" align="center"><strong>CONECTE SEU FACEBOOK!!</strong></h4>
    </div>
    <div class="modal-body" id="conectar_facebook" align="center">
        <p>Para realizar o teste, é necessário entrar usando sua conta do facebook, clique no botão abaixo para continuar.</p>
        <button class="btn btn-primary btn-lg btn-facebook" ng-click="loginFacebook()">
            <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Entrar com facebook
        </button>
    </div>
</script>