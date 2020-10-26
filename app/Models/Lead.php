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
}
