<?php

namespace App\Models;

use App\Scopes\Tenant\TenantScope;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organismo extends Model
{
    use HasFactory;

    use TenantTrait;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'matriz_id',

        'razaosocial',
        'cnpj',
        'data_cnpj',
        'data_fundacao',
        'cep',
        'rua',
        'bairro',
        'complemento',
        'cidade',
        'uf',
        'status',
        'natureza',
        'image'

    ];


    public function matriz(){
        return $this->belongsTo(Matriz::class);
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }


}
