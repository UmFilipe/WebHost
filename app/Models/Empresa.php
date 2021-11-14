<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = ["nome", "cnpj"];

    public function companies()
    {
        return $this->hasMany(Domain::class, 'empresa_id', 'id');
    }


}
