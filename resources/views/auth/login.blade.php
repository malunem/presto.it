<x-layout>
    <x-slot name='title'>
        Login
    </x-slot>
    <div class="container-fluid m-0 p-0">
        <div class="row custom-body-height">
            <div class="col-12 ">
                @if ($errors->any())
                   <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                   </div>
                @endif
            </div>
            <div class="col-12 col-md-3 side-header m-0 p-0">
                
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center flex-column align-items-center">
                <form method="POST" action="{{route('login')}}" class="p-0 m-0">
                    @csrf
                    <h2 class="fs-1 mb-3 ">Login</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="d-flex">
                            <i class="fas fa-envelope mt-2 px-1 color-icons-custom"></i><input type="email" class="" name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label> 
                        <div class="d-flex">
                            <i class="fas fa-lock mt-2 px-1 color-icons-custom"></i> <input type="password" class="" name="password" class="input-style">
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                    </div>
                    <button type="submit" class="btn login-btn">Login</button>
                </form>
            </div>
        </div>

       
    </div>
</x-layout>