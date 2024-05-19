<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function book()
    {
        return $this->belongsTo(User::class, 'book');
    }
}
