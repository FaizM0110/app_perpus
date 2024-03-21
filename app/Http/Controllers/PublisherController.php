<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherStoreRequest;
use App\Http\Requests\PublisherUpdateRequest;

class PublisherController extends Controller
{
    public function index() {
        return view('publisher.publisher', [
            'publisher' => Publisher::all(),
        ]);   
    }
    
    public  function create()
    {
        return view('publisher.publisher-create');
    }

    public function store(Request $request)
    {

         $request->validate([
             'name' => 'required',
             'address' => 'required',
         ]);
         [
            'name.required' => 'isi kolom ini',
            'address.required' => 'Isi kolom ini',
         ];
      
        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();
        return redirect()->route('publisher.index')->with('success', 'Publisher berhasil ditambah');

    }

    public function edit($id)
    {
        $publisher = Publisher::find($id);
        return view('publisher.publisher-edit', [
            'publisher' => $publisher,
        ]);
    }

    public function update(Request $request, $id)
    {
      
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        [
           'name.required' => 'isi kolom ini',
           'address.required' => 'Isi kolom ini',
        ];

        $publisher = Publisher::find($id);
        $publisher->name = $request->name; 
        $publisher->address = $request->address; 
        $publisher->save(); 
        return redirect()->route('publisher.index')->with('success', 'Publisher berhasil diperbarui');
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
        return redirect()->back()->with('success', 'Publisher berhasil dihapus');
    }
}
