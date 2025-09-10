<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Note;

class Message extends Model
{
    // protected $table = 'nombre_de_table';
    protected $fillable = ['name','email','mensaje'];//asignacion masiva de datos

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class,'notable');
    }
}
