@extends('layout.app')
@section('main')
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="{{ route('create.reg')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <h2 class="text-center mb-4">REGISTRATION FORM</h2>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" placeholder="name@example.com" value="{{ old('userid')}}">
                <label for="usernameInput">User_id</label>
                @if ($errors ->has('userid'))
                <span class="text-danger">{{ $errors ->first('userid')}}        
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email')}}">
                <label for="emailInput">Email</label>
                @if ($errors ->has('email'))
                <span class="text-danger">{{  $errors ->first('email')}}     
                @endif
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="password" value="">
              <label for="password">Password</label>
              @if ($errors ->has('password'))
              <span class="text-danger">{{  $errors ->first('password')}}
              @endif
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control   @error('password') is-invalid @enderror" name="password_confirmation" placeholder="password_confirmation" value="">
            <label for="password_confirmation">ConfirmPassword</label>
            @if ($errors ->has('password'))
            <span class="text-danger">{{  $errors ->first('password')}}
            @endif
        </div>
        <div class=" form-floating mb-3">
          <input class="form-control" type="file" id="formFile" name="file" value="">
          @if ($errors ->has('file'))
          <span class="text-danger">{{  $errors ->first('file')}}
          @endif
      </div>
        <div class="mb-5">
          <button class="btn btn-dark text-white" type="submit">Submit</button>
      </div>
        </div>
    </div>
</form>
@endsection