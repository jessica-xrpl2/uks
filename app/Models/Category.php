<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    protected $fillable =  ['name'];

    public function Food(){
        return $this->hasOne(Food::class, 'category_id', 'id');
    }
    public function Sepatu(){
        return $this->hasOne(Sepatu::class, 'category_id', 'id');
    }

    public function Sarung(){
        return $this->hasOne(Sepatu::class, 'category_id', 'id');
    }

    public function Mukena(){
        return $this->hasOne(Sepatu::class, 'category_id', 'id');
    }
}
