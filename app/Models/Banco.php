<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    use TenantTrait;

    protected $fillable = [
        'id',

        'organismo_id',
        'tenant_id',
        'user_id',

        'nome',
        'agencia',
        'numero',
        'digito',
        'tipo'

    ];

    public function organismos()
    {
        return $this->hasMany(Organismo::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
