@extends('templates.default')

@php
    $title = 'Author';
    $pretitle = 'Data'; 
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.update', $author->id)}}" class="" method="post">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control
                @error('photo') is-invalid @enderror" 
                name="example-text-input" 
                placeholder="Tulis nama kamu" value="{{ old('name') ?? $author->name }}">
                @error('author') <span class="invalid-feedback">{{ $message }}</span> @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="address" class="form-control 
                @error('address') is-invalid @enderror" 
                name="example-text-input" 
                placeholder="Tulis alamat kamu" value="{{ $author->address }}">
                @error('address') <span class="invalid-feedback">{{ $message }}</span> @enderror

            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
@endsection 