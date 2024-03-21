@extends('templates.default')

@php
    $title = 'Author';
    $pretitle = 'Tambah Data'; 
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/author" class="" method="post" enctype="multipart/form-data">
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
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control
                @error('photo') is-invalid @enderror" 
                name="example-text-input" 
                placeholder="Tulis alamat kamu">
                @error('photo') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
@endsection