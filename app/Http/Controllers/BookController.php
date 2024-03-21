<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return view('book.book', [
            'book' => Book::get(),
            'author' => Author::get()
        ]);
    }
    public function create()
    {
        return view('book.book-create', [
            'author' => Author::get()
        ]);
    }

    public function store(request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'year' => 'required',
                'author_id' => 'required'
                // 'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'isi kolom ini',
                'year.required' => 'isi kolom ini',
                // 'cover.required' => 'isi kolom ini',
            ]
        );

        // $cover = null;

        // if ($request->hasFile('cover')) {
        //     $cover = $request->file('cover')->store('covers');
        // }

        // $book = new book();


        // $book->tittle = $request->tittle;
        // $book->year = $request->year;
        // $book->author_id = $request->author_id;
        // $book->cover = $cover;

        // $book->save();
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'year' => $request->year,
            'cover' => $request->file('cover')->store('covers')
        ]);

        return redirect()->route('book.index');
    }

    public function destroy(string $id)
    {
        $book = book::find($id);
        $book->delete();
        return redirect()->route('book.index')->with('hapus', 'Data Berhasil Dihapus!');
    }

    public function show(string $id)
    {
        $book = book::findOrFail($id);
        return view('book\book-show', compact('book'));
    }

    public function edit($id)
    {
        // return view('book.bookedit', [
        //     'book' => book::find($id),
        //     'author' => Author::get()
        // ]);



        // $book = book::find($id);

        // return view('book.bookedit', [
        //     'book' => $book,
        //     'author' => Author::get()
        // ]);
        $book = book::find($id);
        $author = Author::get();

        return view('book.book-edit', compact('book', 'author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'year' => 'required',
                'author_id' => 'required'
                // 'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'isi kolom ini',
                'year.required' => 'isi kolom ini',
                // 'cover.required' => 'isi kolom ini',
            ]
        );

        $book = book::find($id);

        $cover = $book->cover;

        if ($request->hasFile('cover')) {
            if ($book->cover !== null && Storage::exists($book->cover)) {
                Storage::delete($book->cover);
            }

            $cover = $request->file('cover')->store('/cover');
        }

        $book->author_id = $request->author_id;
        $book->year = $request->year;
        $book->title = $request->title;
        $book->cover = $cover;
        $book->save();

        return redirect()->route('book.index')->with('success', 'Data penulis berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $book = Book::where('title', 'like', '%'.$request->search.'%')->get();
        }
        else{
            $book = Book::all();
        }
        return view('book.book', [
            'book' => $book,
        ]);
    }
}
