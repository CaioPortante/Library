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

    public function editBookSave($id, Request $request)
    {

        $book = Book::find($id);

        if($book){
            $book->title = (string) $request->title;
            $book->author = (string) $request->author;
            $book->isbn = (string) $request->isbn;
            $book->description = (string) $request->description;
            $book->quantity = (int) $request->quantity;
        } else{
            return redirect()->back()->with("response", [400, "Produto não Encontrado!"]);
        }

        $updated = $book->save();

        if($updated){
            return redirect()->back()->with("response", [200, "Dados do produto alterado com Sucesso!"]);
        } else{
            return redirect()->back()->with("response", [400, "Erro ao salvar os Dados!"]);
        }
    
    }
}
