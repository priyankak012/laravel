@extends('layout.app') 
@section('main')   
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('data.store')}}" method="post">
                    {{-- <input name="_token" type="hidden" value="{{ csrf_token() }}"/> --}}
                    @csrf
                    <h2 class="text-center mb-4">Contact Information</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="name@example.com" value="{{ old('name')}}">
                        <label for="usernameInput">Username</label>
                        @if ($errors ->has('name'))
                    <span class="text-danger">{{ $errors ->first('name')}}        
                    @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email')}}">
                        <label for="emailInput">Email</label>
                        @if ($errors ->has('email'))
                        <span class="text-danger">{{ $errors ->first('email')}}        
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone')}}">
                        <label for="phoneInput">Phone</label>
                        @if ($errors ->has('phone'))
                        <span class="text-danger">{{ $errors ->first('phone')}}        
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address')}}">
                        <label for="addressInput">Address</label>
                        @if ($errors ->has('address'))
                        <span class="text-danger">{{ $errors ->first('address')}}        
                        @endif
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-dark text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
