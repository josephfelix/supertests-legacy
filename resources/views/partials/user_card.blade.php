@if (app('request')->session()->has('logged'))
    <div class="user-card pull-right">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <img src="http://graph.facebook.com/{{app('request')->session()->get('userid')}}/picture"/>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                <div class="nome">{{app('request')->session()->get('name')}}</div>
                <a class="btn btn-primary btn-facebook btn-sm" href="{{url('/logout')}}">
                    <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Clique para sair
                </a>
            </div>
        </div>
    </div>
@endif
