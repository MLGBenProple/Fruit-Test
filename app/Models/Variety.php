<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name'
    ];

    public function fruit() {
        return $this->belongsTo(Fruit::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
