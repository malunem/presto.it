<nav class="navbar navbarcustom navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
   
      <a  class="navbar-brand" href=""><img class="img-fluid logo" src="/img/sfondopresto2.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('newAnnouncement')}}">Inserisci un annuncio</a>
          </li>

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          @endguest
          @auth
          {{--Revisor home --}}

          @if (Auth::user()->is_revisor)
              <li class="nav-item">
                <a class="nav-link" href="{{route('revisor.homepage')}}">Revisor home
                    <span class="badge badge-pill badge-warning">
                        {{App\Models\Announcement::ToBeRevisionedCount()}}
                    </span>
                </a>
              </li>
          @endif

          <li class="nav-item">
            <a class="nav-link " href="#">Benvenuto, {{Auth::user()->name}}</a>
          </li>
           <li class="nav-item"><a class="nav-link "  href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('form-logout').submit();">Logout</a></li>
            <form method="POST" action="{{route('logout')}}" id="form-logout">
              @csrf
            </form>
          @endauth
        </ul>
      </div>
    </div>
  </nav>