@extends('templates.default')

@php
    $title = 'Book';
    $pretitle = 'Edit data';
@endphp

@section('content')
    <div class="card">
        <div class="card-header">Tambahkan Buku</div>
        <div class="card-body">
            <form action="{{ route('book.update', $book->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Author_Id</label>
                    <select name="author_id" class="form-control">
                        @foreach ($author as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        placeholder="ex: Digital Talent" value="{{ $book->title }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover"
                        placeholder="Input placeholder" value="{{ $book->cover }}">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                        placeholder="ex: 2006" value="{{ $book->year }}">
                    @error('year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
