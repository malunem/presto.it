<x-layout>
    <main class="custom-body-height">
      @if ($announcement)
        <h1 class="text-center mt-5">Annunci da revisionare</h1>
    
          <div class="container-fluid mt-md-4 py-md-2">
            
            <div class="row m-5">
              <!-- Product images -->
              <div class="col-12 col-md-3">
                <x-carousel/>
              </div>
              
              <!-- Product details -->
              <div class="col-12 col-md-9">
                <div class="row ">
                  <h2 class="s-product-name">
                    {{$announcement->title}}
                  </h2>
                  
                  <p class="mx-3 p-0 lead strong display-7 ">
                    {{$announcement->user->name}}
                  </p>
                  <span class="lead strong display-6">{{$announcement->price}}€</span>
                  
                  <p class="mx-3 p-0 lead strong display-7">
                    {{$announcement->created_at->format('d/m/Y')}}
                  </p>
                  <p class="s-product-price lead fw-bold my-3">
                    <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
                  </p>
                  <div class="mt-2">
                    <h3>Immagini</h3> 
                  </div>
                </div>
                <div class="row mt-2 h-50 align-items-md-start align-items-end">
                  @foreach ($announcement->images as $image)
                  <div class=" col-12 col-md-2">
                    <div class="mini-imgs">
                      <img src="{{ Storage::url($image->file)}}" class="mini-imgs shadow" alt="">
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            
              <div class="col-12 my-5">
                <h2>Descrizione prodotto:</h2>
                <p class="s-product-description">
                  {{$announcement->description}}
                </p>
              </div>

              <div class="col-12 d-md-flex align-items-md-center ">
                <h5>Dettagli annuncio:</h5>
                <p class="small mt-2 ms-2">ID annuncio #{{$announcement->id}}</p>
                <p class="small mt-2 ms-2">ID utente #{{$announcement->user->id}}</p>
                <p class="small mt-2 ms-2">Nome utente: {{$announcement->user->name}}</p>
                <p class="small mt-2 ms-2">Email utente: {{$announcement->user->email}}</p>
            </div>
            </div>   
            
            <div class="row mt-5">
              <div class="col-12 d-flex">
                <div class="ms-5 ps-3">
                  <form action="{{route('revisor.reject', $announcement->id)}}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2">
                      Rifiuta
                    </button>
                  </form>
                  
                  <form action="{{route('revisor.accept', $announcement->id)}}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success mb-2">
                      Accetta
                    </button>
                  </form>
                </div>
              </div>
            </div>

          </div>
          @else
          
          <h3 class="text-center text-dark mt-5 pt-5">Non ci sono annunci da revisionare</h3>
          
          @endif
        </main>    
</x-layout>