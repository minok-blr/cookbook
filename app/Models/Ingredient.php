<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name'
    ];

    public function hasPosts(){
        return $this->belongsToMany(Post::class)->withPivot('quantity', 'unit');
    }
}
