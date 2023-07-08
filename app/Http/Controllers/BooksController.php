<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('books.books',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     ** @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $books = new Books;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/books/', $filename);
            $books->image = $filename;
        }
        $books->name = $request->input('name');
        $books->description = $request->input('description');
        $books->author = $request->input('author');
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('files/books/', $filename);
            $books->file = $filename;
        }
        $books->save();
        return redirect()->back()->with('status','Данные успешно сохранены');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books, $id) {
        $books = Books::find($id);
        $destination = 'images/books/'.$books->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $books->delete();
        return redirect()->back()->with('status','Post Image Deleted Successfully');
    }
}
