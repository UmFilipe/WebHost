<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
    use HasFactory;

    protected $table = 'hosts';

    protected $fillable = [
        'tamanho',
        'localizacao',
        'preco'
    ];

    public static function ruleForHost()
    {
        return [
            'tamanho' => 'required|max:30',
            'localizacao' => 'required|max:30',
            'preco' => 'required|max:50',
        ];
    }

    public static function mensageRulesforHosts()
    {
        return [
            'tamanho.required' => 'O tamanho é um campo obrigatório.',
            'tamanho.max' => 'O tamanho máximo para este campo é de 30 caracteres',
            'localizacao.required' => 'A localização é um campo obrigatório',
            'localizacao.max' => 'O tamanho máximo para este campo é de 30 caracteres',
            'preco.required' => 'O preço é um campo obrigatório.',
            'preco.max' => 'O tamanho máximo para este campo é de 50 caracteres',
        ];
    }
}
