<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Bank Model.
 *
 * @property int $id
 * @property string $sandi_bank
 * @property string $nama_bank
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNamaBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereSandiBank($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BankSekolah
 *
 * @property int $id
 * @property string $kode
 * @property string $nama_bank
 * @property string $nama_rekening
 * @property string $nomor_rekening
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BankSekolahFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereNamaBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereNamaRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereNomorRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSekolah whereUpdatedAt($value)
 */
	class BankSekolah extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Biaya
 *
 * @property int $id
 * @property string $nama
 * @property int $jumlah
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BiayaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya query()
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Biaya whereUserId($value)
 */
	class Biaya extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pembayaran
 *
 * @property int $id
 * @property int $tagihan_id
 * @property int $wali_id
 * @property \Illuminate\Support\Carbon $tanggal_bayar
 * @property string|null $status_konfirmasi
 * @property float $jumlah_dibayar
 * @property string|null $bukti_bayar
 * @property string $metode_pembayaran
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tagihan|null $tagihan
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PembayaranFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereBuktiBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereJumlahDibayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereStatusKonfirmasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTagihanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTanggalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereWaliId($value)
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Siswa
 *
 * @property int $id
 * @property int|null $wali_id
 * @property string|null $wali_status
 * @property string $nama
 * @property string $nisn
 * @property string|null $foto
 * @property string $jurusan
 * @property string $kelas
 * @property string $angkatan
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\User|null $wali
 * @method static \Database\Factories\SiswaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAngkatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereWaliId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereWaliStatus($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tagihan
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $user_id
 * @property int|null $angkatan
 * @property int|null $kelas
 * @property \Illuminate\Support\Carbon $tanggal_tagihan
 * @property \Illuminate\Support\Carbon $tanggal_jatuh_tempo
 * @property string|null $keterangan
 * @property float|null $denda
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pembayaran[] $pembayaran
 * @property-read int|null $pembayaran_count
 * @property-read \App\Models\Siswa|null $siswa
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TagihanDetail[] $tagihanDetails
 * @property-read int|null $tagihan_details_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TagihanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan waliSiswa()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereAngkatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereDenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereTanggalJatuhTempo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereTanggalTagihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagihan whereUserId($value)
 */
	class Tagihan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TagihanDetail
 *
 * @property int $id
 * @property int $tagihan_id
 * @property string $nama_biaya
 * @property int $jumlah_biaya
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TagihanDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereJumlahBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereNamaBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereTagihanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagihanDetail whereUpdatedAt($value)
 */
	class TagihanDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $nohp
 * @property string|null $nohp_verified_at
 * @property string $akses
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User wali()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAkses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohpVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

