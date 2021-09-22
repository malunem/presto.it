<x-layout>
  <main class="custom-body-height">
    @if ($announcement)
    <h1 class="text-center mt-5">{{__('ui.review')}}</h1>
    
    <div class="container-fluid ">
      
      
      {{-- <div class="row m-5 bg-primary"> --}}
        <!-- Product images -->
       {{--  <div class="col-12 col-md-3 ">
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
        </div> --}}
        
        
        <!-- Product details -->
        
        
        {{-- <div class="col-12 col-md-9 mt-5 "> --}}
          <div class="row align-items-center d-flex flex-column">

            <div class="col-12 ">
              <h3 class="s-product-name text-capitalize text-center">
                Titolo annuncio:
                {{$announcement->title}}
              </h3>
              
              <div class="d-flex justify-content-center">
                <p class="mx-3 p-0 lead strong display-7 ">
                  Nome utente:
                  {{$announcement->user->name}}
                </p>
                <p class="mx-3 p-0 lead strong display-7">
                  {{$announcement->created_at->format('d/m/Y')}}
                </p>
                <span class="lead strong fs-5">{{$announcement->price}} €</span>
                
                <p class="s-product-price lead fw-bold">
                  <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
                </p>
              </div>
            </div>
          </div>

          <div class="row mt-4 h-50 align-items-md-start justify-content-center">
            <div class="text-center">
              <h3>{{__('ui.images')}}</h3> 
            </div>
            @foreach ($announcement->images as $image)
            <div class="col-12 col-md-4 justify-content-center d-flex">
              <div>
                <img src="{{ $image->getUrl(300, 150)}}"  alt="">
              </div>
              </div>
              <div class="col-12 col-md-5 ">
                <ul class="list-unstyled">
                  <li>Adult:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->adult}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <li>Spoof:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->spoof}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <li>Medical:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->medical}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <li>Violence:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->violence}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  {{-- <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$image->violence}}%; background-color: green" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                  <li>Racy:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->racy}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </ul>
                {{-- <ul>
                  <b>Labels</b><br>
                  @if ($image->labels)
                  @foreach ($image->labels as $label)
                  <li>{{$label}}</li>
                  @endforeach
                  @endif
                </ul> --}}
                <b>Labels</b><br>
                    @if ($image->labels)
                    <p>
                    @foreach ($image->labels as $key=>$label)
                      @if ($key == 0)
                          <span>{{$label}}</span>
                      @else
                          <span>; {{$label}}</span>
                      @endif
                    @endforeach
                    </p>
                    @endif
              </div>
            @endforeach
          </div>
          
          
          
          
        {{-- </div> --}}
        
        {{-- <div class="mini-imgs my-5 img-fluid">
          <img src="https://picsum.photos/100/125" alt="">
          <img src="https://picsum.photos/101/125" alt="">
          <img src="https://picsum.photos/102/125" alt="">
          <img src="https://picsum.photos/103/125" alt="">
          <img src="https://picsum.photos/104/125" alt="">
        </div>
        --}}
      {{-- </div> --}}   
      <div class="row m-0 justify-content-around bg-danger">
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
        
        <div class="col-12 d-flex flex-column align-items-center mb-5">
          <h3 class=" text-dark mt-5 pt-5">{{__('ui.noRevisor')}}</h3>
          <img src="{{asset('img/done-icon.png')}}" alt="" width="200px" height="200px" class="mt-5 mb-5">
        </div>
        @endif
        <div class="row justify-content-center mt-5">
          <div class="col-12 col-md-8">
            <h2 class="text-center mb-2">Ultime modifiche</h2>
            <table class="table">
              <thead class="thead-light text-white table-custom">
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
                  <td scope="row">{{$announcement->id}}</th>
                  <td>{{$announcement->title}}</td>
                  <td>{{$announcement->user->name}}</td>
                  <td>
                    @if ($announcement->is_accepted==1)
                    accettato                              
                    @else
                    rifiutato
                    @endif
                  </td>
                    <td class="d-flex justify-content-end">            
                      <form action="{{route('revisor.undo', $announcement->id)}}" method="POST" class="d-inline ms-auto">
                        @csrf
                        <button type="submit" class="btn btn-warning">
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