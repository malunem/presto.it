<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
          <li class="nav-item">
            <a class="nav-link " href="#" >Benvenuto, {{Auth::user()->name}}</a>
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