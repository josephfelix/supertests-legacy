<div class="col-lg-4 col-md-4 col-xs-6 col-sm-6" ng-repeat="teste in testes">
    <div class="card teste-single">
        <a href="@{{teste.slug}}">
            <img class="card-img-top"
                 ng-src="@{{teste.cover}}"
                 alt="@{{teste.title}}"
                 title="@{{teste.title}}"
                 width="100%"
                 height="180px" />
        </a>
        <div class="card-block text-center">
            <h4 class="card-title">@{{teste.title}}</h4>
            <p class="card-text">@{{teste.description}}</p>
            <a href="@{{teste.slug}}" class="btn btn-success">
                <i class="fa fa-arrow-right"></i>&nbsp;FAZER TESTE
            </a>
        </div>
    </div>
    <br />
</div>