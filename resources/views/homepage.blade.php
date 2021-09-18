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

                <div class="carousel-item active carousel-item-start img-carousel-1">
                    <div class="carousel-caption text-start text-custom">
                      <h2>I tuoi acquisti a portata di click</h2> 
                      <h3>Veloce, reattivo e affidabile.</h3>
                    </div>
                </div>

                <div class="carousel-item carousel-item-next carousel-item-start img-carousel-2">
                    <div class="carousel-caption text-start text-custom">
                      <h2>I tuoi acquisti a portata di click</h2> 
                      <h3>Veloce, reattivo e affidabile.</h3>
                    </div>
                </div>

                <div class="carousel-item carousel-item-next carousel-item-start img-carousel-3">
                    <div class="carousel-caption text-start text-custom">
                      <h2>I tuoi acquisti a portata di click</h2> 
                      <h3>Veloce, reattivo e affidabile.</h3>
                    </div>
                </div>

              </div>

            </div>
          </header>
        </div>
      </div>
    </div>
    
    {{-- <div class="wrapper"> --}}
        <div class="container">
          <div class="row">
            <div class="col-12">
              <form class="d-flex mx-auto w-50 my-5" action="{{route('search')}}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Cerca annunci pubblicati" aria-label="Search">
                <button class="btn btn-custom searchButton" type="submit">Cerca</button>
            </form>
            </div>
          </div>
          <div class="row">
            <h1 class=" my-4 py-5 text-center">Annunci pubblicati</h1>
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 ">
                    <div class="card shadow my-3" style="width: 22rem;">
                        <img class="img-fluid" src="https://picsum.photos/300" class="card-img-top" alt="{{$announcement->title}}">
                        <div class="card-body">
                          <h5 class="h5">{{$announcement->title}} </h5>
                          <p class="small">{{Str::limit($announcement->description, 50)}}</p>
                          <p class="lead">{{$announcement->user->name}}</p>
                          <span class=" lead strong">{{$announcement->price}} € </span> 
                          <p class="small mt-1">{{$announcement->created_at->format('d/m/Y')}}</p>
                          <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}" class="text-decoration-none ">{{$announcement->category->category}}</a></p>
                          <a href="{{route('show.DetailAnnouncement', $announcement)}}" class="btn btn-custom">Vai al prodotto</a>
                        </div>
                      </div>
                </div>  
                @endforeach
            </div>
        </div>
    {{-- </div> --}}
</x-layout>