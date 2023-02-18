<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maket extends Model
{

    const CREATED_AT = 'bought_at';
    protected $fillable = [
        'id',
        'product',
        'author',
        'stock',
        'paid',
    ];
    protected $primaryKey = 'id';
    use HasFactory;
}
