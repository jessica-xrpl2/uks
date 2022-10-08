<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function Pasien(){
        return $this->hasOne(Pasien::class,'kelas_id','id');
    }
}
