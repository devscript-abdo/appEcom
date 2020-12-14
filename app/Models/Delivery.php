<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Delivery extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom' ,
        'email' ,
        'password' ,
        'city_id' ,
        'address',
        'tele'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
        'approved',
        'moderator_id',
        'addedBy',
        'email_verified_at',
        'locale',
        'avatar'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $guard = 'delivery';

    protected $guard_name = 'delivery';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ville()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function commands(){

        return $this->hasMany('App\Models\Command');
    }


    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
