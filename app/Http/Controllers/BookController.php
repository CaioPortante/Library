<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBooksDashboard()
    {

        $books = Book::all();

        return view("books.index", compact("books"));
    
    }

    public function addBookDashboard()
    {
        return view("books.add");
    }

    public function addBookSave(Request $request)
    {
        $validatedRequest = $request->validate(
            [
                'title'=>'required',
                'author'=>'required',
                'isbn'=>'required',
                'description'=>'required',
                'quantity'=>'required|integer|gt:0',
            ], 
            [
                'title.required'=>'É preciso passar um Título.',
                'author.required'=>'É preciso passar o Autor.',
                'isbn.required'=>'É preciso passar o ISBN.',
                'description.required'=>'É preciso dar uma descrição.',
                'quantity.required'=>'É preciso passar a quantidade.',
                'quantity.integer'=>'Quantidade precisa ser numérica',
                'quantity.gt:0'=>'Quantidade precisa ser maior que 0',
            ], 
        );

        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->quantity = $request->quantity;

        $book->save();

        return $this->showBooksDashboard();
    }

    public function editBookDashboard($id)
    {

        $book = Book::find($id);

        return view("books.edit", compact("book"));
    
    }

    public function editBookSave($id, Request $request)
    {

        $validatedRequest = $request->validate(
            [
                'title'=>'required',
                'author'=>'required',
                'isbn'=>'required',
                'description'=>'required',
                'quantity'=>'required|integer|gt:0',
            ], 
            [
                'title.required'=>'É preciso passar um Título.',
                'author.required'=>'É preciso passar o Autor.',
                'isbn.required'=>'É preciso passar o ISBN.',
                'description.required'=>'É preciso dar uma descrição.',
                'quantity.required'=>'É preciso passar a quantidade.',
                'quantity.integer'=>'Quantidade precisa ser numérica',
                'quantity.gt:0'=>'Quantidade precisa ser maior que 0',
            ], 
        );

        $book = Book::find($id);

        if(!$book){
            return redirect()->back()->with("response", [400, "Produto não Encontrado!"]);
        } else{
            $book->title = (string) $request->title;
            $book->author = (string) $request->author;
            $book->isbn = (string) $request->isbn;
            $book->description = (string) $request->description;
            $book->quantity = (int) $request->quantity;
        }

        $updated = $book->save();

        if($updated){
            return $this->showBooksDashboard();
        } else{
            return redirect()->back()->with("response", [400, "Erro ao salvar os Dados!"]);
        }
    
    }

    public function showBooksToLoan()
    {

        $books = Book::all();

        foreach ($books as $book) {
            $activeLoans = Loan::with('book')->where('book', $book->id)->where('status', 1);

            foreach ($activeLoans as $key => $value) {
                $book->quantity--;
            }
            
        }

        return view("books.list", compact('books'));

    }

    public function deleteBook($id)
    {
        $activeLoans = Loan::with('book')->where('book_id', $id)->where('status', 1)->count();

        if($activeLoans > 0){
            return redirect()->back()->with('response', [400, 'Esse livro tem aluguéis ativos!']);
        }

        $book = Book::find($id);
        $book->delete();

        return redirect()->back()->with('response', [200, 'Livro deletado com sucesso!']);
    }
}
