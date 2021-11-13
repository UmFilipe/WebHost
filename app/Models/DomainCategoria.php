<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainCategoria extends Model
{
    use HasFactory;
    protected $table = 'domain_categorias';

    protected $fillable = ["nome", "sigla"];

    public function domain()
    {
        return $this->hasOne(Domain::class, 'domain_categorias', 'id');
    }
}

