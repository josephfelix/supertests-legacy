@include('teste.header')

<div class="container">

    <div class="row">

        <!-- Container do teste -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="teste-container">
                <h1>{{$title}}</h1>
                <img src="{{$cover}}" />
                <button class="btn btn-success btn-lg btn-iniciar-teste">Fazer teste</button>
            </div>

        </div>
        <!-- /Container do teste -->

        <!-- Container do adsense -->
        <div class="col-lg-3 col-md-3 visible-lg visible-md">
            Adsense
        </div>
        <!-- /Container do adsense -->
    </div>

</div>

@include('teste.footer')
