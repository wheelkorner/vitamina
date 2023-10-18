<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($parceiro) {
            $ultimoId = self::max('id');

            if ($ultimoId >= 999) {
                abort(403, 'Limite de parceiros atingido. Por favor, altere o cd_pro_negocio.');
            }

            $novoCdParceiro = str_pad($ultimoId + 1, 3, '0', STR_PAD_LEFT);
            $parceiro->cd_parceiro = $novoCdParceiro;
        });
    }

    public function lojas()
    {
        return $this->hasMany(Loja::class);
    }
}
