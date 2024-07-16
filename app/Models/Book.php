<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'public_company',
        'image',
        'author_id',
        'is_active'
    ];

    protected $casts = [
      'is_active' => 'boolean'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
