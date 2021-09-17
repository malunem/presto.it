<x-layout>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-5">{{$category_name}}</h1> 
             @foreach ($announcements as $announcement)
                 <div class="col-12 col-md-4 mb-4 d-flex">
                     <div class="card" style="width: 22rem;">
                         <img src="https://picsum.photos/300" class="card-img-top" alt="{{$announcement->title}}">
                         <div class="card-body">
                             <h5 class="card-title">{{$announcement->title}}</h5>
                             <p class="card-text">{{$announcement->description}}</p>
                             <p class="card-text">{{$announcement->user->name}}</p>
                             <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
                             <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a></p>
                             <a href="#" class="btn btn-custom">Go somewhere</a>
                         </div>
                     </div>
                 </div>
             @endforeach
        </div>
    </div>
</x-layout>