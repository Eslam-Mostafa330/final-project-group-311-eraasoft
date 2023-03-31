<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'phone',
        'address_1',
        'address_2',
        'notes'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Check if the authenticated user is admin or not using the administration_level row in users table
    public function isAdmin()
    {
        return $this->administration_level > 0 ? true : false;
    }

    // User can rate more than one book, and the book can be rated from many users
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function rated(Book $book)
    {
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }

    // Check if a specific user has already rated a book, then display the rate
    public function bookRating(Book $book)
    {
        return $this->rated($book) ? $this->ratings->where('book_id', $book->id)->first() : null;
    }

    // - Get all books in the cart added by the user
    // - Also we used a condition here "wherePivot('bought', false)" to ensure..
    // that this function will apply only when the user hasn't bought the books yet, and when
    // the user buy that book, we will change "false" to "true" later to make the book disappear from cart.
    public function booksInCart()
    {
        return $this->belongsToMany(Book::class)->withPivot(['number_of_copies', 'bought', 'price'])->wherePivot('bought', False);
    }

    // Method to make the books can only be rated by users who have purchased them
    // by set the field "bought" to "true"
    public function allowRating()
    {
        return $this->belongsToMany(Book::class)->withPivot(['bought'])->wherePivot('bought', true);
    }

    // Method that return all the purchased products with it's details to the user
    // and order it descending depending on the "created_at" field.
    public function purchasedProducts()
    {
        return $this->belongsToMany(Book::class)->withPivot(['number_of_copies', 'bought', 'price', 'created_at'])->orderByPivot('created_at', 'desc')->wherePivot('bought', true);
    }

}
