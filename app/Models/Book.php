<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    public const MIN_TITLE_LENGTH = 1;
    public const MAX_TITLE_LENGTH = 64;

    public const MIN_DESCRIPTION_LENGTH = 1;
    public const MAX_DESCRIPTION_LENGTH = 200;

    public const MIN_AMOUNT = 0;
    public const MAX_AMOUNT = 1000;

    protected $fillable = [
        'author_id',
        'title',
        'short_description',
        'amount',
    ];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
