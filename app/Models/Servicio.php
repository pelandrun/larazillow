<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'provintf';

    public function thprobes(): HasMany
    {
        return $this->hasMany(
            \App\Models\Thprobe::class,
            'provintf_id'
        );
    }
}
