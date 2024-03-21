@extends('templates.default')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/publisher" class="" method="post">
                @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control 
                @error('name') is-invalid @enderror" 
                name="example-text-input" 
                placeholder="Tulis nama kamu">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control
                @error('address') is-invalid @enderror" 
                name="example-text-input" 
                placeholder="Tulis alamat kamu">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
@endsection