<?php

namespace App\Models;
use Illuminate\Contracts\Auth\CanResetPassword;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tele',
        'address',
        'city_id',
        'approved',
        'password',
        //'biography'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $guard = 'admin';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public function getRoleAttribute()
    {

        return str_replace('-', ' ', $this->getRoleNames()[0] ?? 'no role');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function products()
    {

        return $this->hasMany('App\Models\Product');
    }

    public function leads()
    {
        return $this->hasMany('App\Models\Lead');
    }

    public function commands()
    {
        return $this->hasMany('App\Models\Command')
            ->where('admin_id', $this->id)
            ->orWhere('admin_id', null);
    }

    public function treasuries(){

        return $this->hasMany('App\Models\Treasury');
    }
}
