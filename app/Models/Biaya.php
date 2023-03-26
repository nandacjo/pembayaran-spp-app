<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory, HasFormatRupiah;
    
    protected $guarded = [];
    protected $append = ['nama_biaya_full']; // custom attribute

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */

    //  custom attribute
    protected function namaBiayaFull(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nama . ' - ' . $this->formatRupiah('jumlah'),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // even elquent, ini akan deksekusi ketika data di create atau di update, sebelum di create atau di update maka data user di masukan terlebih dahulu sebelum disimpan
    protected static function booted()
    {
        static::creating(function ($biaya) {
            $biaya->user_id = auth()->user()->id;
        });

        static::updating(function ($biaya) {
            $biaya->user_id = auth()->user()->id;
        });
    }
}