<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailPeriksa whereUpdatedAt($value)
 */
	class DetailPeriksa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_obat
 * @property string $kemasan
 * @property int $harga
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereKemasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereNamaObat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Obat whereUpdatedAt($value)
 */
	class Obat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_pasien
 * @property int $id_dokter
 * @property string $tgl_periksa
 * @property string|null $catatan
 * @property int $biaya_periksa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereBiayaPeriksa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereIdDokter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereIdPasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereTglPeriksa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Periksa whereUpdatedAt($value)
 */
	class Periksa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

