<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookController extends Controller
{
    final public function createBook(Request $request)
    {
        $credentials = $request->only('title','description','author');
        $book = new Book();
        $book->fill($credentials);
        $book->user_id=Auth::id();
        $book->save();
        $user = Auth::user();
        $books=Book::where('user_id',Auth::id())->get();
        return view('BookManagement',['books'=>$books]);

    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('editBook', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->save();
        $user = Auth::user();
        $books=Book::where('user_id',Auth::id())->get();
        return view('BookManagement',['books'=>$books]);
    }


    public function delete_book($id){
        $book=Book::findOrFail($id);
        $book->delete();
        $user = Auth::user();
        $books=Book::where('user_id',Auth::id())->get();
        return view('BookManagement',['books'=>$books]);
    }





}
