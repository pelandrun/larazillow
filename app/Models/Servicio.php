<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;




class Servicio extends Model
{
    use HasFactory;
    protected $table = 'provintf';
    protected $with = ['iucliente'];

    public function thprobes(): HasMany
    {
        return $this->hasMany(
            \App\Models\Thprobe::class,
            'provintf_id'
        );
    }

    public function iucliente(): HasOne
    {
        return $this->hasOne(\App\Models\Iucliente::class,'nroreferencia','nroreferencia');
    }
}
