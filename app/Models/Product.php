<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'author',
        'image',
        'stock',
        'price',
    ];
    protected $primaryKey = 'id';

    public function user()
    {

        return $this->belongsTo(User::class, 'author');

    }
}
