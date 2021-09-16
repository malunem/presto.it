<x-layout>
    <div class="wrapper">
        <div class="container">
          
          <div class="row">
            <h1 class=" my-4 py-5 text-center">Risultati ricerca per: {{$query}}</h1>
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