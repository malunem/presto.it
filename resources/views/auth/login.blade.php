<x-layout>
    <x-slot name='title'>
        Login
    </x-slot>
    <div class="container-fluid d-flex flex-column align-items-center m-0 p-0">
        <div class="row p-0 m-0  custom-body-height">
            <div class="col-12  mt-5 ">
                @if ($errors->any())
                   <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                   </div>
                @endif
                <h2 class="fs-1 mb-3">Login</h2>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="d-flex">
                            <i class="fas fa-envelope mt-2 px-1 bg-green"></i><input type="email" class="" name="email">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label> 
                        <div class="d-flex">
                            <i class="fas fa-lock mt-2 px-1 "></i> <input type="password" class="" name="password">
                        </div>
                      </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" class="btn btn-custom">Login</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>