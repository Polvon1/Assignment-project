<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SentTextMessage
 *
 * @property int $id
 * @property string $recipient
 * @property string $message_id
 * @property string $originator
 * @property string $text
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereOriginator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SentTextMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SentTextMessage extends Model
{
    protected $fillable = [
        "recipient",
        "message_id",
        "originator",
        "text",
        "status"
    ];
}
