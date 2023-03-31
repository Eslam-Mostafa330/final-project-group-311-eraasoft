<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Many to many relationship between authors and books,
    // because It is possible for more than one author to contribute to the book's writing,
    // and the author may write more than one book
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    // User can rate more than one book, and the book can be rated from many users
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // A function to calculate the rate given by user
    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0;
    }

    public function shopping()
    {
        return $this->hasMany(Shopping::class);
    }

}
