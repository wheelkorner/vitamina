<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;
use App\Models\Parceiro;

class LojaController extends Controller
{
    public function create()
    {
        $parceiros = Parceiro::all();
        $lojas = Loja::all();
        return view('lojas.create', compact('parceiros','lojas'));
    }

    public function index()
    {
        $lojas = Loja::all();
        return view('lojas.index', compact('lojas'));
    }


    public function store(Request $request)
    {
        $tipo = $request->input('tipo');

        if ($tipo === 'matriz') {
            $novoParceiro = Parceiro::create([
                'nome' => $request->input('parceiro_nome'),
            ]);
            $parceiroId = $novoParceiro->id;
            $novoParceiro->update([
                'cd_parceiro' => str_pad($parceiroId, 3, '0', STR_PAD_LEFT),
            ]);
        } else {
            $parceiroId = $request->input('parceiro_id');
        }

        Loja::create([
            'parceiro_id' => $parceiroId,
            'cnpj' => $request->input('cnpj'),
            'razao_social' => $request->input('razao_social'),
            'cidade' => $request->input('cidade'),
        ]);

        return redirect('lojas')->with('msgSuccess', 'Loja cadastrada com sucesso!');
    }
}
