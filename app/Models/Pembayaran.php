<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected $dates = ['tanggal_bayar'];
  protected $with = ['user', 'tagihan'];


  public function tagihan(): BelongsTo
  {
    return $this->belongsTo(Tagihan::class);
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }



  /**
   * The "booted" method of the model.
   *
   * @return void
   */
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