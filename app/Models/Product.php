<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'author',
        'stock',
        'price',
    ];
    protected $primaryKey = 'id';

    public function user()
    {

        return $this->belongsTo(User::class, 'author');

    }
    public function images()
    {

        return $this->hasMany(product_images::class, 'product');

    }
}
