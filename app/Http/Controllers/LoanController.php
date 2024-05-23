<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function showLoanBook($id)
    {
        $book = Book::find($id);

        return view('loans.book', compact('book'));
    }

    public function loanBook($id, Request $request)
    {
        
        $validatedRequest = $request->validate(
            [
                "time"=>"required|integer|gt:0"
            ],
            [
                "time.required"=>"É preciso inserir a quantidade de dias",
                "time.integer"=>"A quantidade de dias precisa ser um número",
                "time.gt:0"=>"A quantidade de dias precisa ser maior que 0",
            ],
        );

        $book = Book::find($id);

        $activeLoans = Loan::with('book')->where('book_id', $id)->where('status', 1)->count();
        $areAllBooksLoaned = $book->quantity === $activeLoans;

        if($areAllBooksLoaned){
            return redirect('/books/list')->with('response', [400, 'Todos os livros estão alugados']);
        }

        $bookLoanedByUser = Loan::with(['book', 'user'])->where('book_id', $id)->where('user_id', session('user_id'))->where('status', 1)->count();
        $isBookLoanedByUser = $bookLoanedByUser > 0;

        if($isBookLoanedByUser){
            return redirect('/books/list')->with('response', [400, 'Você já alugou este livro, devolva antes de Alugá-lo novamente']);
        }

        $loan = new Loan();

        $loan->days = $validatedRequest['time'];
        $loan->status = 1;
        $loan->user_id = session('user_id');
        $loan->book_id = $id;

        $isLoanSaved = $loan->save();

        if(!$isLoanSaved){
            return redirect('/books/list')->with('response', [400, 'Ocorreu um erro ao realizar o Aluguel']);
        }
        
        return redirect('/dashboard')->with('response', [200, 'Aluguel realizado com Sucesso']);
        
    }

    public function returnBook($id)
    {
        $loan = Loan::find($id);

        $loan->status = 0;

        $isLoanSaved = $loan->save();

        if(!$isLoanSaved){
            return redirect('/dashboard')->with('response', [400, 'Ocorreu um erro ao devolver o livro']);
        }

        return redirect('/dashboard')->with('response', [200, 'Livro devolvido!']);
    }
}
