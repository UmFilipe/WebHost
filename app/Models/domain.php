<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domains';

    protected $fillable = [
        'dominio',
        'preco',
        'descricao',
        'domain_categoria_id'
    ];

    public static function rulesForDomain()
    {
        return [
            'dominio' => 'required|max:30',
            'preco' => 'required|max:50',
            'domain_categoria_id' => 'required', 
            'descricao' => 'required|max:100'
        ];
    }

    public static function mensageRulesforDomains()
    {
        return [
            'dominio.required' => 'O nome do domínio é um campo obrigatório',
            'dominio.max' => 'O nome do domínio máximo é de 30 caracteres!',
            'preco.required' => 'O preço é um campo obrigatório',
            'descricao.max' => 'O preço máximo é de 100 caracteres!',
            'descricao.required' => 'A descrição é um campo obrigatório',
            'descricao.max' => 'A descrição máxima é de 100 caracteres!',
            'domain_categoria_id.required' => 'A localidade é um campo obrigatório'
        ];
    }

    public function localidades()
    {
        return $this->belongsTo(DomainCategoria::class, 'domain_categoria_id', 'id');
    }
}
