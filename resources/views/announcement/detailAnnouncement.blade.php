<x-layout>
    <div class="col-12 col-md-4">
        <div class="card" style="width: 18rem;">
           <x-carousel/>
            <div class="card-body">
              <h5 class="card-title">{{$announcement->title}}</h5>
              <p class="card-text">{{$announcement->description}}</p>
              <p class="card-text">{{$announcement->user->name}}</p>
              <p class="card-text">{{$announcement->created_at->format('d/m/Y')}}</p>
              <p class="card-text"> <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a></p>
            </div>
          </div>
    </div>
</x-layout>