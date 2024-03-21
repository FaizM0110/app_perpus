@extends('templates.default')


@php
    $title = 'Book';
    $pretitle = 'Data';
@endphp

@push('page-action')
    <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Data</a>
    <form action="{{ route('book.index') }}" class="form-inline mt-3" method="GET">
      <input type="search" name="search" class="form-control" placeholder="Search">
    </form>
@endpush

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Author_id</th>
                        <th>Title</th>
                        <th>Cover</th>
                        <th>Year</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $book)
                        <tr>
                            <td>{{ $book->author->name }}</td>
                            <td><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></td>
                            <td><img src="{{ asset('storage/' . $book->cover) }}" height="150px" alt="">
                            </td>
                            <td>{{ $book->year }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('book.edit', $book->id) }}">Edit</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
