<?php

namespace App\Models;

use App\Http\Middleware\Wali;
use App\Traits\HasFormatRupiah;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tagihan extends Model
{
  use HasFactory, HasFormatRupiah;

  protected $guarded = [];
  protected $dates = ['tanggal_tagihan', 'tanggal_jatuh_tempo']; // harud si buat biar bisa menggunakan carbon
  protected $with = ['user', 'siswa', 'tagihanDetails'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function siswa()
  {
    return $this->belongsTo(Siswa::class);
  }

  /**
   * Get all of the tagihanDetails for the Tagihan
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function tagihanDetails(): HasMany
  {
    return $this->hasMany(TagihanDetail::class);
  }

  /**
   * Get all of the pembayaran for the Tagihan
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function pembayaran(): HasMany
  {
    return $this->hasMany(Pembayaran::class);
  }

  public function getStatusTagihanWali()
  {
    if ($this->status == 'baru') {
      return "Belum dibayar";
    }
    if ($this->status == 'lunas') {
      return "Sudah Di Bayar";
    }
    return $this->status;
  }

  public function scopeWaliSiswa($q)
  {
    return $q->whereIn('siswa_id', Auth::user()->getAllSiswaId());
  }



  /**
   * The "booting" method of the model.
   *
   * @return void
   */
  protected static function boot()
  {
    parent::boot();
  }

  protected static function booted()
  {
    static::creating(function ($tagihan) {
      $tagihan->user_id = auth()->user()->id;
    });

    static::updating(function ($tagihan) {
      $tagihan->user_id = auth()->user()->id;
    });
  }
}
