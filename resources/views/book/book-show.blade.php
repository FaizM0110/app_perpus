@extends('templates.default')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $book->title }}</h2>
                <p class="text-gray-600 mt-2">Author: {{ $book->author->name }}</p>
            </div>
            <div class="p-4">
                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" width="500">
            </div>
            <div class="px-4 pb-4">
                <p class="text-gray-700">Year: {{ $book->year }}</p>
            </div>
            <div class="px-4 pb-4">
                <p class="text-gray-700">Author Photo:</p>
                <img src="{{ asset('storage/' . $book->author->photo) }}" alt="{{ $book->author->name }}"
                    width="500">
            </div>
            <div class="flex justify-end p-4">
                <a href="{{ route('book.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <span class="mr-2">Back to Books</span>
                </a>
            </div>
        </div>
    </div>
@endsection
