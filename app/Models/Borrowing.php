<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $table = 'borrowings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function book() {
        return $this->belongsTo('App\Models\Book', 'book_id', 'id');
    }
}
