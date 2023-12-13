<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'user_id',
        'nombre',
    ];
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contacts() {
        return $this->belongsTo(Contacto::class, 'categoria_id');
    }
}
