@include('teste.header')

<div class="container" ng-controller="LoadingController" ng-init="makeTest('{{$guid}}')">

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

                <!-- Loading container -->
                <div class="loading-container">
                    <div class="dots-loader"></div>
                    <p><strong>@{{message}}</strong></p>
                </div>

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

</div>

@include('teste.footer')