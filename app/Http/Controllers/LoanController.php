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
}
