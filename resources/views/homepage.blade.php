<x-layout>
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if (session('access.denied.revisor.only'))
        <div class="alert alert-danger">
            Accesso consentito solo ai revisori
        </div>
    @endif

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-0">
          <header>
            <div id="myCarousel" class="carousel slide carousel-fade custom-carousel" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active carousel-item-start">
                  <div class="img-test">
                    <h2></h2>
                    <img class="display-block img-carousel img-fluid" src="/img/foto3.png">
                  </div>
          
                  <div class="container">
                    <div class="carousel-caption text-start">
                      <h2>I tuoi acquisti a portata di click</h2> 
                      <h3>Veloce, reattivo e affidabile .</h3>
                      <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item carousel-item-next carousel-item-start">
                  <div class="img-test">
                    <img class="display-block img-carousel img-fluid" src="/img/foto1.png">
                  </div>
          
                  <div class="container">
                    <div class="carousel-caption">
                      <h1>Another example headline.</h1>
                      <p>Some representative placeholder content for the second slide of the carousel.</p>
                      <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="img-test">
                    <img class="display-block img-carousel img-fluid" src="/img/foto2.png">
                  </div>
          
                  <div class="container">
                    <div class="carousel-caption text-end">
                      <h1>One more for good measure.</h1>
                      <p>Some representative placeholder content for the third slide of this carousel.</p>
                      <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </header>
        </div>
      </div>
    </div>
    
    <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <form class="d-flex mx-auto w-50 my-5" action="{{route('search')}}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-custom searchButton" type="submit">Search</button>
            </form>
            </div>
          </div>
          <div class="row">
            <h1 class=" my-4 py-5 text-center">Annunci pubblicati</h1>
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4">
                    <div class="card my-3" style="width: 18rem;">
                        <img class="img-fluid" src="https://picsum.photos/300" class="card-img-top" alt="{{$announcement->title}}">
                        <div class="card-body">
                          <h5 class="card-title">{{$announcement->title}} </h5>
                          <p class="card-text">{{Str::limit($announcement->description, 50)}}</p>
                          <p class="card-text">{{$announcement->user->name}}</p>
                          <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
                          <span class=" lead strong">{{$announcement->price}}</span> 
                          <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}" class="text-decoration-none ">{{$announcement->category->category}}</a></p>
                          <a href="{{route('show.DetailAnnouncement', $announcement)}}" class="btn btn-custom">Scopri di più</a>
                        </div>
                      </div>
                </div>  
                @endforeach
            </div>
        </div>
    </div>
</x-layout>