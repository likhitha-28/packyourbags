<x-layout>
<div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/admin/register" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="name-register" class="text-muted mb-1"><small>name</small></label>
              <input value="{{old('name')}}" name="name" id="name-register" class="form-control" type="text" placeholder="Pick a name" autocomplete="off" />
            </div>
            @error('name')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror
            <div class="form-group">
              <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
              <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
            </div>
            @error('email')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror
            <div class="form-group">
              <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
              <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
            </div>
            @error('password')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror
            <div class="form-group">
              <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
              <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
            </div>
            @error('password_confirmation')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block" style="background-color: rgba(38, 179, 179, 0.8)">Sign up as Admin</button>
          </form>
        </div>
      </div>
</div>

</x-layout>