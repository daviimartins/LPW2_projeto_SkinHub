<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = "transacao";

    protected $fillable = ['user_id', 'valor_transacao', 'forma_pagamento', 'data_transacao'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
