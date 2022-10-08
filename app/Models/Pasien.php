<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Pasien extends Model
{
    // use HasFactory;
    protected $fillable = ['nama','kelas_id','jurusan_id','kondisi','tanggal'];

    public function Kelas(){
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    public function Jurusan(){
        return $this->hasOne(Jurusan::class, 'id', 'jurusan_id');
    }
}
