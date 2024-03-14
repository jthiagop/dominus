<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamentopadrao extends Model
{
    use HasFactory;

    use TenantTrait;


    protected $fillable = [
        'id',
        'organismo_id',
        'tenant_id',
        'user_id',

        'nome',
        'tipo',
        'descricao',


    ];

    public function organismos()
    {
        return $this->hasMany(Organismo::class);
    }

        public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
