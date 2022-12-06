<?php

namespace App\Traits;

/**
 * has Fomrat Rupiah
 */
trait HasFormatRupiah
{
  function formatRupiah($field, $prefix = null)
  {
    $prefix = $prefix ?? 'Rp. ';
    $nominal = $this->attributes[$field];
    return $prefix . number_format($nominal, 2, ',', '.');
  }
}

?>