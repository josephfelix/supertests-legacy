@include('teste.header')

<div class="container" ng-controller="LoadingController" ng-init="makeTest('{{$guid}}')">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">

                @include('partials.adsense.responsive')

                <!-- Loading container -->
                <div class="loading-container">
                    <div class="dots-loader"></div>
                    <p><strong>@{{message}}</strong></p>
                </div>

                @include('partials.adsense.responsive')

            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            @include('partials.adsense.banner300x600')
        </div>
        <!-- /Container do adsense -->
    </div>

</div>

@include('teste.footer')