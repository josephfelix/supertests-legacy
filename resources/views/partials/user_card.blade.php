@if (app('request')->session()->has('logged'))
    <ul class="media-list pull-right user-card">
        <li class="media">
            <div class="media-left">
                <img src="http://graph.facebook.com/{{app('request')->session()->get('userid')}}/picture"/>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{app('request')->session()->get('name')}}</h4>
                <a class="btn btn-primary btn-facebook btn-sm" href="{{url('/logout')}}">
                    <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;Clique para sair
                </a>
            </div>
        </li>
    </ul>
@endif
