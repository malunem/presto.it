<x-layout>
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <header>
      <img class="w-100 d-block header" src="https://www.apexweb.co.uk/docs/headers/e-commerce-websites.jpg" alt="">
    </header>
    {{-- <div class="carousel ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item  active">
                <div class="carousel-caption text-red img-carousel">
                  <h2>I tuoi acquisti a portata di click</h2>
                  <h3>Veloce, reattivo e affidabile .</h3>
                  
                </div>
              </div>
              <div class="carousel-item sfondo2">
                <div class="carousel-caption text-red">
                  <h2>I tuoi acquisti a portata di click</h2>
                  <h3>Veloce, reattivo e affidabile .</h3>
                </div>
              </div>
              <div class="carousel-item sfondo3">
                <div class="carousel-caption text-red">
                  <h2>I tuoi acquisti a portata di click</h2>
                  <h3>Veloce, reattivo e affidabile .</h3>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div> --}}
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <h1 class=" my-4 py-5 text-center">Annunci pubblicati</h1>
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4">
                    <div class="card my-3" style="width: 18rem;">
                        <img src="https://picsum.photos/300" class="card-img-top" alt="{{$announcement->title}}">
                        <div class="card-body">
                          <h5 class="card-title">{{$announcement->title}}</h5>
                          <p class="card-text">{{Str::limit($announcement->description, 50)}}</p>
                          <p class="card-text">{{$announcement->user->name}}</p>
                          <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
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