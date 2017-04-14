<script type="text/ng-template" id="conectar_facebook.html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>CONECTE SEU FACEBOOK!!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="fecharModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="conectar_facebook">
                <p>Para realizar o teste, é necessário entrar usando sua conta do facebook, clique no botão abaixo para continuar</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-lg btn-facebook" ng-click="loginFacebook()">
                    <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Entrar com facebook
                </button>
            </div>
        </div>
    </div>
</script>