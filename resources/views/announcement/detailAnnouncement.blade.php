<x-layout>



  <main>
    <div class="container-fluid">
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
                <p class="small m-0 p-0">
                  {{$announcement->user->name}}
                </p>
                <p class="small m-0 p-0">
                  {{$announcement->created_at->format('d/m/Y')}}
                </p>

                <p class="s-product-price lead fw-bold my-3">
                  <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
                </p>
                
                <div class="mini-imgs my-5 img-fluid">
                    <img src="https://picsum.photos/100/125" alt="">
                    <img src="https://picsum.photos/101/125" alt="">
                    <img src="https://picsum.photos/102/125" alt="">
                    <img src="https://picsum.photos/103/125" alt="">
                    <img src="https://picsum.photos/104/125" alt="">
                </div>

                {{-- <p>Quantità nel carrello: <span id="cartQuantity">
                    0 sd
                </span></p> --}}
                

                <div class="my-5">
                    <h2>Dettagli prodotto:</h2>
                    <p class="s-product-description">
                      {{$announcement->description}}
                    </p>
                </div>
            </div>
        </div>
        {{-- <div class="row d-flex justify-content-center">
            <div class="col-10">
                <h3 class="text-center">Prodotti correlati</h3>
                <div class="cards-wrapper"> --}}
                    <!-- Javascript dynamic content -->
                </div>
            </div>
        </div>
    </div>
</main>    













    {{-- <div class="col-12">
        <div class="" style="width: 18rem;">
           <x-carousel/>
            <div class="card-body">
              <h5 class="card-title">{{$announcement->title}}</h5>
              <p class="card-text">{{$announcement->description}}</p>
              <p class="card-text">{{$announcement->user->name}}</p>
              <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
              <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a></p>
            </div>
          </div>
    </div> --}}
</x-layout>