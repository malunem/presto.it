<x-layout>
    <x-slot name='title'>
      {{__('ui.register')}}
    </x-slot>
    <div class="container-fluid m-0 p-0 custom-body-height">
        <div class="row backgroudColor align-items-md-center custom-container-style ">
            <div class="col-12 col-md-4 offset-md-4 mt-5">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <form method="POST" action="{{route('register')}}" class="bg-white p-5 mb-3">
                  <h2 class="fs-1 text-capitalize">{{__('ui.register')}}</h2>
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">{{__('ui.username')}}</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{__('ui.email')}}</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('ui.confirmPassword')}}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                      </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" class="btn btn-custom mb-3"> {{__('ui.register')}}</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>