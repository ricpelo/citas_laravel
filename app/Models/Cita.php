<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialista()
    {
        return $this->belongsTo(Especialista::class);
    }

    public function compania()
    {
        return $this->belongsTo(Compania::class);
    }
}
