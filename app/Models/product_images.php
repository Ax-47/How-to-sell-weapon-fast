<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product',
        'image',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
