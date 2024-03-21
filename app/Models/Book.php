<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'author_id',
        'cover'
    ];

    public function author()
    {
        return $this->belongsTo(author::class);
    }
}