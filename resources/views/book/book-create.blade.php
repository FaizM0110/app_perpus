@extends('templates.default')

@php
    $title = 'Buku';
    $pretitle = 'Tambah data';
@endphp

@section('content')
    <div class="card">
        <div class="card-header">Add Book</div>
        <div class="card-body">
            <form action="/book" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Author_Id</label>
                    <select class="form-control" name="author_id">
                        @foreach ($author as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        placeholder="ex: Api dan Air">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover"
                        placeholder="Input placeholder">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                        placeholder="ex: 2006">
                    @error('year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
