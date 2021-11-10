<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    use HasFactory;

    protected $table = 'servers';

    protected $fillable = [
        'tipo',
        'preco',
        'descricao',
        'ownerEmail'
    ];
    public static function rulesForServers()
    {
        return [
            'tipo' => 'required|max:30',
            'preco' => 'required|max:50',
            'descricao' => 'required|max:100'
        ];
    }

    public static function mensageRulesforServers()
    {
        return [
            'tipo.required' => 'O tipo é um campo obrigatório.',
            'tipo.max' => 'O tipo máximo é de 30 caracteres!',
            'preco.required' => 'O preço é um campo obrigatório.',
            'preco.max' => 'O preço máximo é de 50 caracteres!',
            'descricao.required' => 'A descrição é um campo obrigatório.',
            'descricao.max' => 'A descrição máxima é de 100 caracteres!'
        ];
    }
}
