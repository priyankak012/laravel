@extends('layout.app')
@section('main')
<body>
  @if($messages = Session::has('message'))
  <div class="alert alert-dark alert-dismissible fade show" role="alert">
    <strong class="font-monospace text-center">{{ $messages }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif             


  @if ($message = Session::get('success'))
  <div class="alert alert-dark alert-dismissible fade show" role="alert">
   <strong class="font-monospace text-center">{{ $message }}</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div> @endif
             
 @if ($message = Session::get('error'))
 <div class="alert alert-dark alert-dismissible fade show" role="alert">
  <strong class="font-monospace text-center">{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> @endif
 
  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="{{ route('authentication')}}" method="get">
            @csrf
            <h2 class="text-center mb-4">LOGIN FORM</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('userid') is-invalid @enderror" name="email" placeholder="name@example.com" value="{{ old('userid')}}">
                <label for="usernameInput">Email</label>
                @if ($errors ->has('email'))
                <span class="text-danger">{{ $errors ->first('email')}}        
                @endif
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control  @error('password') is-i nvalid @enderror" name="password" placeholder="password" value="">
              <label for="password">Password</label>
              @if ($errors ->has('password'))
              <span class="text-danger">{{  $errors ->first('password')}}
              @endif
          </div>
          <div class="d-grid">
            <button class="btn btn-dark text-white" type="submit">Submit</button>
        </div>
          </form>
          @endsection