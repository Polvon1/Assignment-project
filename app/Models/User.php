<?php

namespace App\Models;

use App\Support\Enums\RoleEnum;
use App\Support\Interfaces\MustVerifyPhone;
use App\Support\Traits\HasAuthor;
use App\Support\Traits\HasVerifyPhone;
use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Traits\CanPay;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property string $password
 * @property string|null $type
 * @property string|null $name
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $image
 * @property string|null $document_number
 * @property array|null $description
 * @property string|null $remember_token
 * @property bool $notification
 * @property int|null $organization_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property bool $is_banned
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $region_id
 * @property int|null $district_id
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read \App\Models\District|null $district
 * @property-read string $role_id
 * @property-read mixed $role_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Region|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 * @property-read \App\Models\VerificationCode|null $verification
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User initQuery()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static Builder|User organizationQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User search($value)
 * @method static Builder|User systemUserQuery()
 * @method static Builder|User userQuery()
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereDescription($value)
 * @method static Builder|User whereDistrictId($value)
 * @method static Builder|User whereDocumentNumber($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereImage($value)
 * @method static Builder|User whereIsBanned($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNotification($value)
 * @method static Builder|User whereOrganizationId($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePhoneVerifiedAt($value)
 * @method static Builder|User whereReason($value)
 * @method static Builder|User whereRegionId($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereType($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @property-read int $total_purchased
 * @property-read int $total_quizzes
 * @property-read int $total_reports
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Quiz> $quizzes
 * @property-read int|null $quizzes_count
 * @property-read mixed $translations
 * @method static Builder|User whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder|User whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder|User whereLocale(string $column, string $locale)
 * @method static Builder|User whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail,MustVerifyPhone
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasAuthor,
        HasRoles,
        SoftDeletes,
        HasTranslations,
        HasVerifyPhone;


    protected $fillable = [
        "username",
        "email",
        "email_verified_at",
        "phone",
        "phone_verified_at",
        "password",
        "type",
        "name",
        "address",
        "gender",
        "image",
        "document_number",
        "description",
        "notification",
        "organization_id",
        "created_by",
        "updated_by",
        "deleted_by",
        'is_banned',
        'reason',
        'region_id',
        'district_id',
    ];

    public array $translatable = ['description'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime'
    ];

    public function verification(): HasOne
    {
        return $this->hasOne(VerificationCode::class,'user_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class,'district_id');
    }

    public function getRoleNameAttribute()
    {
        return optional($this->roles[0])->name;
    }

    public function getRoleIdAttribute(): string
    {
        return optional($this->roles[0])->id;
    }

    public function scopeInitQuery(Builder $query) : Builder
    {

        if (!auth()->check()) return $query->where('created_at',now()->addYears(3));

        if (auth()->user()->hasRole(RoleEnum::ORGANIZATION)){
            $query = $query->where('organization_id',auth()->user()->organization_id);
        }
        return $query;
    }

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query
            ->where('username','ILIKE','%'.$value.'%')
            ->orWhere('email','ILIKE','%'.$value.'%')
            ->orWhere('name','ILIKE','%'.$value.'%')
            ->orWhere('address','ILIKE','%'.$value.'%')
            ->orWhere('document_number','ILIKE','%'.$value.'%')
            ->orWhere('phone','ILIKE','%'.$value.'%');
    }

    public function scopeSystemUserQuery(Builder $query): Builder
    {
        return $query->whereIn('type',[RoleEnum::ADMIN,RoleEnum::MODERATOR]);
    }

    public function scopeOrganizationQuery(Builder $query): Builder
    {
        return $query->where('type',RoleEnum::ORGANIZATION);
    }

    public function scopeUserQuery(Builder $query): Builder
    {
        return $query->where('type',RoleEnum::USER);
    }

    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class,'users_quizzes');
    }

    public function getTotalQuizzesAttribute(): int
    {
        return $this->quizzes()->count();
    }

    public function getTotalReportsAttribute(): int
    {
        return 0;
    }

    public function getTotalPurchasedAttribute(): int
    {
        return 0;
    }



//    public function getNameAttribute(): string
//    {
//        if ($this->type == RoleEnum::ORGANIZATION)
//            return $this->organization->name;
//        elseif ($this->type == RoleEnum::USER)
//            return $this->profile->full_name ?? __('action.no_info');
//        else{
//            return $this->username;
//        }
//    }

    //    public function quizzes(): BelongsToMany
//    {
//        return $this->belongsToMany(Quiz::class,'users_quizzes');
//    }



}
