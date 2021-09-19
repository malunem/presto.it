<nav class="navbar navbarcustom navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
   
      <a  class="navbar-brand" href=""><img class="img-fluid logo" src="/img/sfondopresto4.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            @include('layouts._locale', ['lang'=> 'it', 'nation' => 'it'])
          </li>

             <li class="nav-item">
              @include('layouts._locale', ['lang'=> 'en', 'nation' => 'gb'])
          </li>

          <li class="nav-item">
            @include('layouts._locale', ['lang'=> 'es', 'nation' => 'es'])
          </li>

          <li class="nav-item">
            @include('layouts._locale', ['lang'=> 'de', 'nation' => 'de'])
          </li>

          <li class="nav-item">
            <a class="nav-link active text-capitalize" aria-current="page" href="{{route('homepage')}}">{{__('ui.home')}}</a>
          </li>

          
          @guest
          <li class="nav-item">
            <a class="nav-link text-capitalize" href="{{route('login')}}">{{__('ui.login')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-capitalize" href="{{route('register')}}">{{__('ui.register')}}</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link text-capitalize" aria-current="page" href="{{route('newAnnouncement')}}">{{__('ui.newListingnav')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('revisor.request')}}">{{__('ui.workWithUs')}}</a>
          </li>
          {{--Revisor home --}}
          
          @if (Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link" href="{{route('revisor.homepage')}}">{{__('ui.revisor')}}
              <span class="badge badge-pill badge-warning">
                        {{App\Models\Announcement::ToBeRevisionedCount()}}
                    </span>
                </a>
              </li>
          @endif

          <li class="nav-item">
            <a class="nav-link text-capitalize" href="#">{{__('ui.profile')}} {{Auth::user()->name}}</a>
          </li>
           <li class="nav-item"><a class="nav-link "  href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('form-logout').submit();">{{__('ui.logout')}}</a></li>
            <form method="POST" action="{{route('logout')}}" id="form-logout">
              @csrf
            </form>
          @endauth
        </ul>
      </div>
    </div>
  </nav>