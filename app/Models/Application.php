<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $organization
 * @property int $region_id
 * @property int|null $users
 * @property \Illuminate\Support\Carbon|null $test_date
 * @property string|null $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Region $region
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 * @method static Builder|Application search($value)
 * @method static Builder|Application searchByRegion($value)
 * @method static Builder|Application whereCreatedAt($value)
 * @method static Builder|Application whereEmail($value)
 * @method static Builder|Application whereFirstName($value)
 * @method static Builder|Application whereId($value)
 * @method static Builder|Application whereLastName($value)
 * @method static Builder|Application whereOrganization($value)
 * @method static Builder|Application wherePhone($value)
 * @method static Builder|Application whereRegionId($value)
 * @method static Builder|Application whereTestDate($value)
 * @method static Builder|Application whereUpdatedAt($value)
 * @method static Builder|Application whereUsers($value)
 * @property string $name
 * @method static Builder|Application whereName($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "organization",
        "region_id",
        "users",
        "test_date",
        "email",
        "phone"
    ];

    protected $casts = [
        'test_date' => 'datetime'
    ];

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query
            ->where('first_name','ILIKE','%'.$value.'%')
            ->orWhere('last_name','ILIKE','%'.$value.'%')
            ->orWhere('organization','ILIKE','%'.$value.'%')
            ->orWhere('users','ILIKE','%'.$value.'%')
            ->orWhere('test_date','ILIKE','%'.$value.'%')
            ->orWhere('test_date','ILIKE','%'.$value.'%')
            ->orWhere('phone','ILIKE','%'.$value.'%');
    }

    public function scopeSearchByRegion(Builder $query,$value): Builder
    {
        if ($value == 0){
            return $query;
        }else{
            return $query->where('region_id',$value);
        }
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

}
