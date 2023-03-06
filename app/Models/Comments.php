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
        'comment',
    ];
    protected $primaryKey = 'id';
    public function user()
    {

        return $this->belongsTo(User::class, 'author');

    }
    public function images()
    {

        return $this->hasMany(Commentimages::class, 'product');

    }
}
