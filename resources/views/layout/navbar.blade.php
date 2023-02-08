<div class="d-flex justify-content-center align-items-center" style="height: 10vh; background-color: #b0ecd4">
    <div style="width: 550px;">
    </div>
    <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Amazing E-Grocery</h1>
    <div style="width: 35vw" class="d-flex justify-content-end ms-5">
        <div class="dropdown me-2">
            <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('Language')}}
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{str_replace(App::getLocale(), 'en', url(Request::path()))}}">English</a></li>
              <li><a class="dropdown-item" href="{{str_replace(App::getLocale(), 'id', url(Request::path()))}}">Indonesia</a></li>
            </ul>
          </div>
        @guest
            <a href="{{ route('register', ['locale' => App::getLocale()]) }}" class="btn btn-warning" style="margin-right: 8px;">
                {{__('Register')}}
            </a>
            <a href="{{ route('login', ['locale' => App::getLocale()]) }}" class="btn btn-warning" style="margin-right: 5px;">
                {{__('Login')}}
            </a>
        @endguest
        @auth
            <form action="{{ route('logout', ['locale' => App::getLocale()]) }}" method="post">
                @csrf
                <button class="btn btn-warning">
                    {{__('Logout')}}
                </button>
            </form>
        @endauth

    </div>


</div>
@auth
<div style="background-color:#ffdc54; height: 7vh;" class="d-flex justify-content-around align-items-center">
    <a href=" {{route('home', ['locale' => App::getLocale()])}} " style="color: black; font-weight: bold; text-decoration: {{ Route::is('home') ? '' :  'none'}}">{{__("Home")}}</a>
    <a href=" {{ route('cart', ['locale' => App::getLocale()]) }} " style="color: black; font-weight: bold; text-decoration: {{ Route::is('cart') ? '' :  'none'}}">{{__("Cart")}}</a>
    <a href=" {{ route('profile', ['locale' => App::getLocale()]) }} " style="color: black; font-weight: bold; text-decoration: {{ Route::is('profile') ? '' :  'none'}}">{{__("Profile")}}</a>
    @can('admin')
        <a href="{{ route('accmaintain', ['locale' => App::getLocale()]) }}" style="color: black; font-weight: bold; text-decoration: {{ Route::is('accmaintain') ? '' :  'none'}}">{{__("Account Maintenance")}}</a>
    @endcan
</div>
@endauth
