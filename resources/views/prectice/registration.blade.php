@extends('layout.app')
@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('store.bookdetail') }}" method="post">
                    @csrf
                    <h2 class="text-center mb-4">Book Detail</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="" value="{{ old('name') }}">
                        <label>name</label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="" value="{{ old('price') }}">
                        <label>price</label>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label>Qaulity</label>
                        <select class="form-control @error('quality') is-invalid @enderror" name="quality"
                            placeholder="quality" value ="">
                            <option value=""></option>
                            <?php
                            $qualityOptions = ['Good', 'Nice', 'Bad'];
                            
                            foreach ($qualityOptions as $option) {
                                $isSelected = old('quality') === $option ? 'selected' : '';
                                echo "<option value=\"$option\" $isSelected>$option</option>";
                            }
                            ?>
                        </select>
                        @error('quality')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-5">
                        <button class="btn btn-dark text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
