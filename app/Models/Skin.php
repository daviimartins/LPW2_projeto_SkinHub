<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    use HasFactory;

    protected $table = "skins";

    public function carrinho()
    {
        return $this->hasMany(Carrinho::class, 'skins_id');
    }

    public function historicoCompra()
    {
        return $this->hasMany(HistoricoCompra::class, 'skins_id');
    }

    public function findById()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
