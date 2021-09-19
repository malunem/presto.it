<x-layout>

  <main class="custom-body-height">

        <div class="container-fluid mt-md-4 py-md-2">
            <div class="row m-5">
            <!-- Product images -->
                <div class="col-12 col-md-3">
                    <x-carousel/>
                </div>
            
            <!-- Product details -->
                <div class="col-12 col-md-9">
                    <div class="row">
                        <h2 class="s-product-name">
                          {{$announcement->title}}
                        </h2>
                      
                        <p class="mx-3 p-0 lead strong ">
                          {{$announcement->user->name}}
                        </p>

                        <p class="mx-3 p-0 lead display-7">
                          {{$announcement->created_at->format('d/m/Y')}}
                        </p>
                        <span class="lead strong display-6">{{$announcement->price}}€</span>
                    
                        <p class="s-product-price lead fw-bold my-3">
                          <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
                        </p>
                        <div class="mt-2">
                            <h3>{{__('ui.images')}}</h3> 
                        </div>
                    </div>
                    <div class="row mt-2 h-50 justify-content-sm-center">
                       @foreach ($announcement->images as $image)
                         <div class="col-12 col-md-4 mb-2">
                            <div class="mini-imgs">
                                <img src="{{ $image->getUrl(300, 150)}}" alt="">
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
                <div class="col-12 my-5">
                  <h2>{{__('ui.description')}}:</h2>
                  <p class="s-product-description">
                  {{$announcement->description}}
                  </p>
                </div>
            </div>   

           
  </main>    
</x-layout>