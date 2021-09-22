<x-layout>
  <div class="container ">
  <main class="custom-body-height">
    @if ($announcement)
    <h2 class="text-center mt-5">{{__('ui.review')}}</h2>
    
      
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
          <div class="row d-flex justify-content-center">

            {{-- <div class="col-12 ">
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
            </div> --}}
            <div class="col-12 col-lg-4 mt-5 bg-white p-5 header-revisor">
              <div>
                <h5>{{$announcement->title}}</h5>
                <p class="mb-2 text-muted text-uppercase small">{{$announcement->category->category}}</p>
                <p><span class="mr-1"><strong>€{{$announcement->price}}</strong></span></p>
                <p class="pt-1">{{$announcement->description}}</p>
              </div>
            </div>
            <div class="col-12 col-lg-4 mt-5 bg-white p-5 header-revisor">
              <div class="table-responsive">
                <table class="table table-sm table-borderless mb-0">
                  <tbody>
                    <tr>
                      <th class="pl-0 w-30" scope="row"><strong>ID annuncio:</strong></th>
                      <td>#{{$announcement->id}}</td>
                    </tr>
                    <tr>
                      <th class="pl-0 w-30" scope="row"><strong>ID utente:</strong></th>
                      <td>#{{$announcement->user->id}}</td>
                    </tr>
                    <tr>
                      <th class="pl-0 w-30" scope="row"><strong>Nome utente:</strong></th>
                      <td>{{$announcement->user->name}}</td>
                    </tr>
                    <tr>
                      <th class="pl-0 w-30" scope="row"><strong>Email utente:</strong></th>
                      <td>{{$announcement->user->email}}</td>
                    </tr>
                    <tr>
                      <th class="pl-0 w-30" scope="row"><strong>Creato il:</strong></th>
                      <td>{{$announcement->created_at}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row mt-4 h-50 align-items-md-start justify-content-center">
            <div class="text-center">
              <h3>{{__('ui.images')}}</h3> 
            </div>

            {{-- INIZIO TEST --}}
            @foreach ($announcement->images as $image)
            <div class="card mb-5 shadow" style="max-width: 1000px;">
              <div class="row g-0">
                <div class="col-md-5 d-flex justify-content-center">
                  <img src="{{$image->getUrl(300, 150)}}" class="img-card img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    {{-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
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
                      <li>Racy:</li>
                      <div class="progress">
                        <div class="progress-bar {{$image->racy}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </ul>
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
                </div>
              </div>
            </div>
            @endforeach
            {{-- FINE TEST --}}

            {{-- @foreach ($announcement->images as $image)
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
                  <li>Racy:</li>
                  <div class="progress">
                    <div class="progress-bar {{$image->racy}}" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </ul>
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
            @endforeach --}}
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
     {{--  <div class="row m-0 justify-content-around bg-danger">
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
      </div> --}}
      
      <div class="row m-0">
        <div class="col-12 d-flex ps-3 justify-content-center mt-3">
          {{-- <div class=""> --}}
            <form action="{{route('revisor.reject', $announcement->id)}}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-danger m-2 btn-revisor">
                {{__('ui.refuses')}}
              </button>
            </form>
            
            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-success m-2 btn-revisor">
                {{__('ui.acept')}}
              </button>
            </form>
            {{-- </div> --}}
          </div>
        </div>
        @else
        
        <div class="col-12 d-flex flex-column align-items-center mb-5">
          <h3 class=" text-dark mt-5 pt-5">{{__('ui.noRevisor')}}</h3>
          <img src="{{asset('img/done-icon.png')}}" alt="" width="200px" height="200px" class="mt-5 mb-5">
        </div>
        @endif
        <div class="row justify-content-center mt-5">
          <div class="col-12">
            <h2 class="text-center mb-2">Ultime modifiche</h2>
            <div class="table-responsive mx-auto mb-5 shadow" style="max-width: 1000px;">
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
                <tr class="bg-white">
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
    </div>
    </x-layout>