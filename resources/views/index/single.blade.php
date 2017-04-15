<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12" ng-repeat="teste in testes">
    <div class="thumbnail teste-single">
        <a href="@{{teste.slug}}">
            <img class="card-img-top"
                 ng-src="@{{teste.cover}}"
                 alt="@{{teste.title}}"
                 title="@{{teste.title}}"
                 width="100%"
                 height="180px" />
        </a>
        <div class="caption text-center">
            <h3>@{{teste.title}}</h3>
            <p class="teste-description-single">@{{teste.description}}</p>
            <p>
                <a href="@{{teste.slug}}" class="btn btn-success btn-fazer-teste-single">
                    <i class="fa fa-arrow-right"></i>&nbsp;FAZER TESTE
                </a>
            </p>
        </div>
    </div>
    <br />
</div>