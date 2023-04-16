<?php

namespace Modules\RestAPI\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \App\Models\User implements JWTSubject
{

    protected $default = [
        'id',
        'name',
        'email',
        'status'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $filterable = [
        'id',
        'users.name',
        'email',
        'status'
    ];

    //phpcs:ignore
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    //phpcs:ignore
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function getCacheKey($id)
    {
        return 'user_' . $id;
    }

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

}
