<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maket extends Model
{
    protected $table = 'maket';
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
