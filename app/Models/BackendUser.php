<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class BackendUser extends Authenticatable
{
    use HasFactory, HasRoles;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'super_admin' => 'boolean',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'email',
        'password',
        'super_admin'
    ];

    protected $hidden = ['password'];

    /**
     * Add custom attribute full name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
