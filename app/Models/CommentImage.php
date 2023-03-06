<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product',
        'image',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function image()
    {

        return $this->belongsTo(product_images::class, 'product');

    }
}
