@include('teste.header')

<div class="container" ng-controller="ResultController">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                <img src="http://placehold.it/728x90"/>

                <div class="result-info">

                    <div class="result-image">
                        <img src="{{asset("/r/{$hash}.jpg")}}"/>
                    </div>

                    <div class="result-share">

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <button class="btn btn-lg btn-primary btn-facebook" ng-click="shareFacebook()">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    COMPARTILHAR
                                </button>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <a href="{{url("/t/{$guid}")}}" class="btn btn-lg btn-default">
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
            <img src="http://placehold.it/300x600" width="100%"/>
        </div>
        <!-- /Container do adsense -->
    </div>

</div>

@include('teste.footer')