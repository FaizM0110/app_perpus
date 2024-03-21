<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('author.author', [
            'author' => Author::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.author-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image',
        ]);
        [
           'name.required' => 'isi kolom ini',
           'photo.required' => 'Format tidak tersedia',
        ];

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('authors');
        }
     
       $author = new Author();

       $author->name = $request->name;
       $author->photo = $photo;
       $author->save();
       return redirect()->route('author.index')->with('success', 'Author berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::find($id);
        return view('author.author-edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required',
        ]);
        [
           'name.required' => 'isi kolom ini',
           'photo.required' => 'Isi kolom ini',
        ];

        $author = Author::find($id);
        $author->name = $request->name; 
        $author->address = $request->address; 
        $author->save(); 
        return redirect()->route('author.index')->with('success', 'Author berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->back()->with('success', 'Author berhasil dihapus');
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $author = Author::where('name', 'like', '%' . $request->search . '%')->get();
        }
        else{
            $author = Author::all();
        }
        return view('author.index', [
            'author' => $author,
        ]);
    }
}
