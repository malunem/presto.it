<x-layout>
    <h1>Annunci pubblicati</h1>



    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/300" class="card-img-top" alt="{{$announcement->title}}">
                    <div class="card-body">
                      <h5 class="card-title">{{$announcement->title}}</h5>
                      <p class="card-text">{{$announcement->description}}</p>
                      <p class="card-text">{{$announcement->user->name}}</p>
                      <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
                      <p class="card-text"> <a href="#">{{$announcement->category->category}}</a></p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
                
            @endforeach
           
        </div>
    </div>
</x-layout>