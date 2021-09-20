<x-layout>
  <main class="custom-body-height">
    @if ($announcement)
    <h1 class="text-center mt-5">{{__('ui.review')}}</h1>
    
    <div class="container-fluid ">
      
      
      <div class="row m-5">
        <!-- Product images -->
        <div class="col-12 col-md-3">
          <x-carousel>
            <x-slot name="imgCarousel">
              
              @foreach ($announcement->images as $key=>$image)
              @if ($key == 0){
                <div class="carousel-item active">
                  
                  <img src="{{ $image->getUrl(300, 150)}}" class="w-100 d-block" alt="">
                </div>
                
              }
              @else
              <div class="carousel-item">
                
                <img src="{{ $image->getUrl(300, 150)}}" class="w-100 d-block" alt="">
              </div>
              
              @endif
              @endforeach
            </x-slot>
            
          </x-carousel>
        </div>
        
        
        <!-- Product details -->
        
        
        <div class="col-12 col-md-9 mt-5">
          <div class="row ">
            <h2 class="s-product-name text-capitalize">
              {{$announcement->title}}
            </h2>
            
            <p class="mx-3 p-0 lead strong display-7 ">
              {{$announcement->user->name}}
            </p>
            <p class="mx-3 p-0 lead strong display-7">
              {{$announcement->created_at->format('d/m/Y')}}
            </p>
            <span class="lead strong display-6">{{$announcement->price}} €</span>
            
            <p class="s-product-price lead fw-bold my-3">
              <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
            </p>
            
            
            <div class="mt-2">
              <h3>{{__('ui.images')}}</h3> 
            </div>
          </div>
          <div class="row mt-4 h-50 align-items-md-start align-items-end">
            @foreach ($announcement->images as $image)
            <div class=" col-12 col-md-3">
              <div class="mini-imgs">
                <img src="{{ $image->getUrl(300, 150)}}" class="mini-imgs mt-3" alt="">
              </div>
            </div>
            @endforeach
          </div>
          
          
          
          
        </div>
        
        {{-- <div class="mini-imgs my-5 img-fluid">
          <img src="https://picsum.photos/100/125" alt="">
          <img src="https://picsum.photos/101/125" alt="">
          <img src="https://picsum.photos/102/125" alt="">
          <img src="https://picsum.photos/103/125" alt="">
          <img src="https://picsum.photos/104/125" alt="">
        </div>
        --}}
      </div>   
      <div class="row m-0 justify-content-around ">
        <div class="col-12 col-md-4 mt-5">
          <h2 class="text-capitalize">{{__('ui.description')}}:</h2>
          <p class="s-product-description">
            {{$announcement->description}}
          </p>
        </div>
        <div class="col-12 col-md-6 ">
          <h3>{{__('ui.AnnouncementDescription')}}:</h3>
          <p class="px-2">ID annuncio #{{$announcement->id}}</p>
          <p class="px-2">ID utente #{{$announcement->user->id}}</p>
          <p class="px-2">Nome utente: {{$announcement->user->name}}</p>
          <p class="px-2">Email utente: {{$announcement->user->email}}</p>
        </div>
      </div>
      
      <div class="row m-0">
        <div class="col-12 d-flex ps-3">
          <div class="">
            <form action="{{route('revisor.reject', $announcement->id)}}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-danger mb-5 ms-5">
                {{__('ui.refuses')}}
              </button>
            </form>
            
            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-success mb-5">
                {{__('ui.acept')}}
              </button>
            </form>
            </div>
          </div>
        </div>
        @else
        
        <div class="col-12 d-flex flex-column align-items-center">
          <h3 class=" text-dark mt-5 pt-5">{{__('ui.noRevisor')}}</h3>
          <img src="{{asset('img/done-icon.png')}}" alt="" width="200px" height="200px" class="mt-5">
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">ID annuncio #</th>
                  <th scope="col">Titolo annuncio</th>
                  <th scope="col">Nome utente:</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($announcements as $announcement)
                <tr>
                  <th scope="row">{{$announcement->id}}</th>
                  <td>{{$announcement->title}}</td>
                  <td>{{$announcement->user->name}}</td>
                  <td>
                    @if ($announcement->is_accepted==1)
                    accettato                              
                    @else
                    rifiutato
                    @endif
                  </td>
                    <td>            
                      <form action="{{route('revisor.undo', $announcement->id)}}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning mb-5 ms-5">
                          {{__('ui.undo')}}
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          
          {{-- <div class="row m-5">
            <div class="col-12 col-md-6">
              <h3>{{__('ui.AnnouncementDescription')}}:</h3>
              <p class="px-2">ID annuncio #{{$announcement->id}}</p>
              <p class="px-2">ID utente #{{$announcement->user->id}}</p>
              <p class="px-2">Nome utente: {{$announcement->user->name}}</p>
              <p class="px-2">Email utente: {{$announcement->user->email}}</p>
            </div> --}}
          </div>
        </div>
      </main>    
    </x-layout>