<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    public $timestamps = false;

    protected $fillable=[
        'title',
        'description',
        'author',
        'user_id'
    ];
    final public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
