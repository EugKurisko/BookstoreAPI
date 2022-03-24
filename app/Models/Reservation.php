<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * class Reservation
 *
 * @property int $id
 * @property int $book_id
 * @property string $email
 * @property int $quantity
 *
 * @property Book $book
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'email',
        'quantity',
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

}
