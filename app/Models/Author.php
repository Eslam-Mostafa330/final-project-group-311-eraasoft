<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // Many to many relationship between authors and books,
    // because It is possible for more than one author to contribute to the book's writing,
    // and the author may write more than one book
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author');
    }
}
