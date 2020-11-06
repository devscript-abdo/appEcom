<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
