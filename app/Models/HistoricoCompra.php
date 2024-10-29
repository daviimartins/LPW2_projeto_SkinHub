<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCompra extends Model
{
    use HasFactory;

    protected $table = "historico";

    protected $fillable = ['user_id', 'skins_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skin()
    {
        return $this->belongsTo(Skin::class, 'skins_id');
    }
}
