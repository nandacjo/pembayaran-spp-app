<?Php


function formatRupiah($nominal, $prefix = null)
{
  $prefix = $prefix ?? 'Rp. ';
  return $prefix . number_format($nominal, 2, ',', '.');
}