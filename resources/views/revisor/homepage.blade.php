<x-layout>
    <main class="custom-body-height">
      @if ($announcement)
      <h1 class="text-center mt-5">Annunci da revisionare</h1>

        <div class="wrapper">
    
          <div class="container-fluid mt-5 py-3">

            <div class="row m-5">
                <div class="col-12">
                    <h3>Dettagli annuncio:</h3>
                    <p>ID annuncio #{{$announcement->id}}</p>
                    <p>ID utente #{{$announcement->user->id}}</p>
                    <p>Nome utente: {{$announcement->user->name}}</p>
                    <p>Email utente: {{$announcement->user->email}}</p>
                </div>
            </div>

            <div class="row m-5">
              <!-- Product images -->
              <div class="col-3">
                <x-carousel/>
              </div>
              
              <!-- Product details -->
              <div class="col-6">
                <h1 class="s-product-name">
                  {{$announcement->title}}
                </h1>
                
              </p>
              <p class="m-0 p-0 lead strong display-7">
                {{$announcement->user->name}}
              </p>
              <p class="m-0 p-0 lead strong display-7">
                {{$announcement->created_at->format('d/m/Y')}}
              </p>
              <span class="lead strong display-6">{{$announcement->price}}</span>
              
              <p class="s-product-price lead fw-bold my-3">
                <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
              </p>
              

              <div class="row">
                <div class="col-md-2">
                  <h3>immagini</h3>
                </div>
                <div class="col-md-4 mini-imgs my-5 img-fluid ">
                  @foreach ($announcement->images as $image)
                  <div class="row mb-2">
                    <div class="col-12 col-md-4 mini-imgs my-5 img-fluid">
                      <img src="{{ Storage::url($image->file)}}" class="rounded mini-imgs" alt="">
                    </div>
                    {{-- <div class="col-md-8">
                      {{$image->id}} <br>
                      {{$image->file}} <br>
                      {{Storage::url($image->file)}} <br>
                    </div> --}}
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
              <div class="my-5">
                <h2>Descrizione prodotto:</h2>
                <p class="s-product-description">
                  {{$announcement->description}}
                </p>
              </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex">
                <div class="ms-auto">
                    <form action="{{route('revisor.reject', $announcement->id)}}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Rifiuta
                        </button>
                    </form>

                    <form action="{{route('revisor.accept', $announcement->id)}}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Accetta
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @else


        <h3 class="text-center text-dark mt-5 pt-5">Non ci sono annunci da revisionare</h3>

        @endif

      </main>    
</x-layout>