<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product',
        'author',
        'review',
        'content',
    ];
    protected $primaryKey = 'id';
}
