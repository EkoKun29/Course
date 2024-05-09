<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = ['course', 'nama', 'harga', 'kelas', 'id_user'];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
