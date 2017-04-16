@include('teste.header')

<div class="container" ng-controller="ResultController">

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

                <div class="result-info">

                    <button class="btn btn-lg btn-primary btn-facebook btn-result-facebook-top" ng-click="shareFacebook()">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        COMPARTILHAR
                    </button>

                    <div class="result-image">
                        <img ng-click="shareFacebook()" src="{{asset("/r/{$hash}.jpg")}}" width="100%"/>
                    </div>

                    <div class="result-share">

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <button class="btn btn-lg btn-primary btn-facebook btn-flat-mobile" ng-click="shareFacebook()">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    COMPARTILHAR
                                </button>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <a href="{{url('/t/' . $guid)}}" class="btn btn-lg btn-default btn-flat-mobile">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                    FAZER NOVAMENTE
                                </a>
                            </div>

                        </div>
                    </div>
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