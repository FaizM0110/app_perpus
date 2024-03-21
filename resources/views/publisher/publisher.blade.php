@extends('templates.default')

@php
    $title = 'Publisher';
    $pretitle = 'Data'; 
@endphp

@push('page-action')
    <a href="{{ route('publisher.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Action</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach ($publisher as $publisher)
                        <tr>
                          <td>{{$publisher->name}}</td>
                          <td>{{$publisher->address}}</td>
                          <td></td>
                            <td>
                                <a href="{{ route('publisher.edit', $publisher->id) }}" class="btn btn-sm">Edit</a>
                                <form action="{{ route('publisher.destroy', $publisher->id) }}" method="POST"> 
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