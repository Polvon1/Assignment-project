<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\VerificationCode
 *
 * @property int $id
 * @property int $user_id
 * @property int $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerificationCode whereUserId($value)
 * @mixin \Eloquent
 */
class VerificationCode extends Model
{
    protected $fillable = ['user_id','code'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
