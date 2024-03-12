<?php

namespace App\Models;

use App\Scopes\Tenant\TenantScope;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriz extends Model
{
    use HasFactory;

    use TenantTrait;


    protected $fillable = [
        'id',
        'tenant_id',
        'user_id',
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
        'natureza'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function organismos(){
        return $this->hasMany(Organismo::class);
    }
}
