<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function Pasien(){
        return $this->hasOne(Pasien::class, 'kelas_id', 'id');
    }
}
