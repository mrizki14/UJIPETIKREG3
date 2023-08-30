<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\PelangganFotoFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelangganFoto extends Model
{
    use HasFactory;
    // protected $table = 'pelanggan_fotos';
    protected $fillable = ['pelanggans_id', 'file', 'catatan', 'odp','status','status_revisi','catatan_keseluruhan'];
    
    protected $factories = [

        PelangganFoto::class => PelangganFotoFactory::class,
    ];
    /**
     * Get the pelanggan that owns the PelangganFoto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id','id');
    }
}
