<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBooksDashboard()
    {

        $books = Book::all();

        return view("books.index", compact("books"));
    
    }

    public function editBookDashboard($id)
    {

        $book = Book::find($id);

        return view("books.edit", compact("book"));
    
    }
}
