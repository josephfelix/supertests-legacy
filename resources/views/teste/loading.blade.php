@include('teste.header')

<div class="container" ng-controller="LoadingController" ng-init="makeTest()">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                <img src="http://placehold.it/728x90"/>

                <!-- Loading container -->
                <div class="loading-container">
                    <div class="dots-loader"></div>
                    <p><strong>Por favor, aguarde...</strong></p>
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