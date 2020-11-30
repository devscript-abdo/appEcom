<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tele',
        'ville',
        'address',
        'source',
        'addedby',
        'produit',
        'code',
        'description',
        'group_id',
        'moderator_id'
    ];
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'active',
        'moderator_id',
        'code',
        'source',
        'addedby',
        'description',
        'nomcomplet'
    ];
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function moderator()
    {
        return $this->belongsTo('App\Models\Moderator');
    }

    public function getFullNameAttribute()
    {

        return "{$this->nom} {$this->prenom}";
    }

    public function scopeFromTo(Builder $query, $dateFrom, $dateTo): Builder
    {
        return $query->whereBetween(
            'created_at',
            [
                Carbon::createFromFormat('m/d/Y', $dateFrom)->format('Y-m-d'),
                Carbon::createFromFormat('m/d/Y', $dateTo)->format('Y-m-d')
            ]
        );
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {

         //  $query->addedby = $authAdmin;
        });
    }
}
