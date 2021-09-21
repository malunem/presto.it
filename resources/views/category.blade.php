<x-layout>
    <div class="container">
        <div class="row">
            <h1 class="text-center my-5">{{$category_name}}</h1> 
             @foreach ($announcements as $announcement)
                 <div class="col-12 col-md-4 mb-4 d-flex">
                     <div class="card shadow" style="width: 22rem;">
                        <x-carousel>
                            <x-slot name="imgCarousel">
      
                              @foreach ($announcement->images as $key=>$image)
                              @if ($key == 0){
                                <div class="carousel-item active">
                                   
                                       <img src="{{ $image->getUrl(400, 300)}}" class="w-100 d-block" alt="{{$announcement->title}}">
                                   </div>
      
                              }
                              @else
                              <div class="carousel-item">
                                   
                                <img src="{{ $image->getUrl(400, 300)}}" class="w-100 d-block" alt="{{$announcement->title}}">
                            </div>
                                  
                              @endif
       
            @endforeach
                            </x-slot>
                            
                          </x-carousel>
                         <div class="card-body">
                             <h5 class="card-title">{{$announcement->title}}</h5>
                             <p class="card-text">{{$announcement->description}}</p>
                             <p class="card-text">{{$announcement->user->name}}</p>
                             <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
                             <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a></p>
                             <a href="{{route('show.DetailAnnouncement', $announcement)}}" class="btn btn-custom">Vai al prodotto</a>
                         </div>
                     </div>
                 </div>
             @endforeach
        </div>
    </div>
</x-layout>