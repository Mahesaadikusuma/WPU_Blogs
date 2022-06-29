@extends('layouts.main')

@section('container')

<div class="row login justify-content-center">
     <div class="col-md-6 col-lg-6 ">
          <main class="form-registration w-100 m-auto">

               <h1 class="h3 mb-3 fw-normal text-center">Registration Form </h1>

               <form class="/register" method="POST">
                    @csrf
               
               <div class="form-floating mb-2">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}" >
                    <label for="name">Name</label>

                    @error('name')
                    <div  class="invalid-feedback">                         
                         {{ $message }}
                    </div>        
                    @enderror
               </div>             
               
               <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="Username" placeholder="username" required value="{{ old('username') }}" >
                    <label for="username">Username</label>

                    @error('username')
                    <div  class="invalid-feedback">                         
                         {{ $message }}
                    </div>        
                    @enderror
               </div>         
               

               <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="
                    {{ old('email') }}">
                    <label for="email">Email address</label>

                    @error('email')
                    <div  class="invalid-feedback">                         
                         {{ $message }}
                    </div>        
                    @enderror
               </div>

               <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password" >Password</label>

                    @error('password')
                    <div  class="invalid-feedback">                         
                         {{ $message }}
                    </div>        
                    @enderror
               </div>

               <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
               
               </form>
               <small class="text-center d-block mt-3">Not Registered <a href="/login">Login</a></small>
          </main>
     </div>
</div>

@endsection