<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $fillable = [
        'parceiro_id', 
        'cnpj', 
        'razao_social', 
        'cidade'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($loja) {
            $parceiro = Parceiro::find($loja->parceiro_id);
            $filiais = Loja::where('parceiro_id', $loja->parceiro_id)->count();

            if ($filiais >= 6) {
                abort(403, 'Limite de filiais atingido. Por favor, altere o cd_pro_negocio.');
            }

            $loja->cd_loja = str_pad($filiais + 1, 2, '0', STR_PAD_LEFT);
            $loja->cd_pro_negocio = $parceiro->cd_parceiro . $loja->cd_loja;
        });
    }

    public function parceiro()
    {
        return $this->belongsTo(Parceiro::class);
    }
}
