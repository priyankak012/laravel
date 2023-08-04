@extends('layout.app')
@section('main')
    @if ($message = Session::get('success'))
    
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form action="{{ route('employee.update', ['id' => $employee->id]) }}"  method="POST">
                    @csrf
                    @method('PUT')
                    <h2 class="text-center mb-4">Update Data</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="name@example.com" value="{{ old('name', $employee->name ?? '') }}">
                        <label for="usernameInput">Username</label>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $employee->email ?? '') }}">
                        <label for="emailInput">Email</label>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone', $employee->phone ?? '') }}">
                        <label for="phoneInput">Phone</label>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address', $employee->address ?? '') }}">
                        <label for="addressInput">Address</label>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-dark text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        &copy; 2023 Learning Website | All rights reserved
    </footer>
    @endsection
