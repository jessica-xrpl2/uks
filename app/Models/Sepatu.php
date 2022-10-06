<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Sepatu extends Model
{
    // use HasFactory;
    protected $fillable = ['name','description','price','category_id','tanggal','image'];

    public function Category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
