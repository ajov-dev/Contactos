<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        // otros campos permitidos para asignación masiva
        'user_id',
        'categoria_id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'categoria_id');
    }
}
