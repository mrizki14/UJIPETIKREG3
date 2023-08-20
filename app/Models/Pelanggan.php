<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
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
    
    protected static function boot() {
        parent::boot();
        self::creating(function($model) {
            $model->number = IdGenerator::generate(['table' => 'pelanggans', 'field'=>'number', 'length' => 6, 'prefix' => '82023']);
        });
        self::creating(function($model) {
            $model->inet = IdGenerator::generate(['table' => 'pelanggans', 'field'=>'inet', 'length' => 4, 'prefix' => '823']);
        });
       
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-M-Y');
    }

    
    public function fotos(): HasMany
    {
        return $this->hasMany(PelangganFoto::class, 'pelanggans_id', 'id');
    }

    
}
