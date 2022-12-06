<?Php


function formatRupiah($nominal, $prefix = null)
{
  // $prefix = $prefix ?? 'Rp. ';
  return $prefix ?? 'Rp' . number_format($nominal, 2, ',', '.');
}