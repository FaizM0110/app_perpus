@extends('templates.default')

@php
    $title = 'Author';
    $pretitle = 'Data'; 
@endphp

@push('page-action')
    <a href="{{ route('author.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
                  </div>
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Action</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach ($author as $author)
                        <tr>
                          <td>{{$author->name}}</td>
                          <td><img src="{{ asset('storage/'. $author->photo) }}" alt="" width="100"></td>
                          <td></td>
                            <td>
                                <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm">Edit</a>
                                <form action="{{ route('author.destroy', $author->id) }}" method="POST"> 
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Delete" class="submit btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
@endsection