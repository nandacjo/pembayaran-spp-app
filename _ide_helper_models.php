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
 * App\Models\Siswa
 *
 * @property int $id
 * @property int|null $wali_id
 * @property string|null $wali_status
 * @property string $nama
 * @property string $nisn
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
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAngkatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
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

