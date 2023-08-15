<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    /**
     * Get all of the pelangganFoto for the Pelanggan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(PelangganFoto::class, 'pelanggans_id', 'id');
    }
}
